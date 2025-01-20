<?php



// Database connection (db_connection.php)

class User {
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $role;
   
    public function __construct( $id = null, $username = null, $email = null, $password = null, $role = null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public static function register($db, $username, $email, $password, $role) {
        // Check if username already exists
        if(isset($username)) {
            $stmt = $db->query("SELECT * FROM users WHERE username = '$username'");
            $result = $stmt->fetch();
    
            if ($result) {
                $_SESSION['emailError'] = "Email already in use.";
                $_SESSION['usernameError'] = "Username already in use.";
            }
        }

        // Check if email already exists
        if(isset($email)) {
            $stmt = $db->query("SELECT * FROM users WHERE email = '$email'");
            $result = $stmt->fetch();
            if ($result) {
                $_SESSION['emailError'] = "Email already in use.";
                $_SESSION['usernameError'] = "Username already in use.";
            }
        }

        if($username !== $result['username'] && $email !== $result['email']) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashedPassword, $role])) {
                return true;
            } else {
                $_SESSION['error'] = "Registration failed.";
                return false;
            }
        } else {
            return false;
        }
    }

    public static function login($db, $usernameOrEmail, $password) {
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                switch ($user['role']) {
                    case 'Admin':
                        $_SESSION['user'] = new Admin($db, $user['id'], $user['username'], $user['email'], $user['password'], $user['role']);
                        break;
                    case 'Teacher':
                        $_SESSION['user'] = new Teacher($db, $user['id'], $user['username'], $user['email'], $user['password'], $user['role']);
                        break;
                    case 'Student':
                        $_SESSION['user'] = new Student($db, $user['id'], $user['username'], $user['email'], $user['password'], $user['role']);
                        break;
                    default:
                        $_SESSION['loginError'] = "Invalid user role.";
                        return false;
                }
                return true;
            } else {
                $_SESSION['loginError'] = "Invalid username, email, or password.";
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['loginError'] = "Database error: " . $e->getMessage();
            return false;
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();  
    }

    public function getRole() {
        return $_SESSION['role'] ?? null;
    }

    public function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    public function isAdmin() {
        return $this->getRole() === 'admin';
    }

    public function isTeacher() {
        return $this->getRole() === 'teacher';
    }

    public function isStudent() {
        return $this->getRole() === 'student';
    }
}

class Student extends User {
    private $courses = [];

    public function __construct($db, $id = null, $username = null, $email = null, $password = null, $role = 'student') {
        parent::__construct($db, $id, $username, $email, $password, $role);
    }

    public function enrollCourse($courseId) {
        $stmt = $this->db->prepare("INSERT INTO course_enrollments (course_id, student_id) VALUES (?, ?)");
        return $stmt->execute([$courseId, $_SESSION['user_id']]);
    }

    public function getCourses() {
        $stmt = $this->db->prepare("SELECT c.* FROM courses c JOIN course_enrollments ce ON c.id = ce.course_id WHERE ce.student_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetchAll();
    }

    public function viewCourses() {
        $stmt = $this->db->query("SELECT * FROM courses");
        return $stmt->fetchAll();
    }

    public function searchCourse($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE title LIKE ? OR description LIKE ?");
        $stmt->execute(['%' . $keyword . '%', '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }

    public function joinCourse($courseId) {
        $stmt = $this->db->prepare("INSERT INTO course_enrollments (course_id, student_id) VALUES (?, ?)");
        $stmt->execute([$courseId, $_SESSION['user_id']]);
    }

    public function viewMyCourses() {
        $stmt = $this->db->prepare("SELECT c.* FROM courses c JOIN course_enrollments ce ON c.id = ce.course_id WHERE ce.student_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetchAll();
    }
}

class Teacher extends User {
    public function __construct($db, $id = null, $username = null, $email = null, $password = null, $role = 'teacher') {
        parent::__construct($db, $id, $username, $email, $password, $role);
    }

    public function addCourse($title, $description, $content, $categoryId) {
        $stmt = $this->db->prepare("INSERT INTO courses (title, description, content, category_id, teacher_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $content, $categoryId, $_SESSION['user_id']]);
    }

    public function getCourses() {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE teacher_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetchAll();
    }

    public function getCourseStatistics() {
        $stmt = $this->db->prepare("SELECT c.id, c.title, COUNT(ce.id) as student_count FROM courses c LEFT JOIN course_enrollments ce ON c.id = ce.course_id WHERE c.teacher_id = ? GROUP BY c.id");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetchAll();
    }
}

class Admin extends User {
    public function __construct($db, $id = null, $username = null, $email = null, $password = null, $role = 'admin') {
        parent::__construct($db, $id, $username, $email, $password, $role);
    }

    public function validateTeacher($teacherId) {
        $stmt = $this->db->prepare("UPDATE users SET status = 'active' WHERE id = ? AND role = 'teacher'");
        return $stmt->execute([$teacherId]);
    }

    public function manageUser($userId, $action) {
        $status = $action === 'activate' ? 'active' : ($action === 'suspend' ? 'suspended' : 'deleted');
        if ($action === 'delete') {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
            return $stmt->execute([$userId]);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $userId]);
        }
    }

    public function getStatistics() {
        $stmt = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM courses) as total_courses,
            (SELECT COUNT(*) FROM users WHERE role = 'teacher') as total_teachers,
            (SELECT COUNT(*) FROM users WHERE role = 'student') as total_students,
            (SELECT title FROM courses ORDER BY (SELECT COUNT(*) FROM course_enrollments WHERE course_id = courses.id) DESC LIMIT 1) as most_popular_course,
            (SELECT username FROM users WHERE role = 'teacher' ORDER BY (SELECT COUNT(*) FROM courses WHERE teacher_id = users.id) DESC LIMIT 3) as top_teachers
        ");
        return $stmt->fetch();
    }
}

class Tag {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addTag($name) {
        $stmt = $this->db->prepare("INSERT INTO tags (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function getTags() {
        $stmt = $this->db->query("SELECT * FROM tags");
        return $stmt->fetchAll(); 
    }
}

class Category {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addCategory($name) {
        $stmt = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function getCategories() {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll();
    }
}
class Course {
    protected int $idCours;
    protected string $titre;
    protected string $description;
    protected string $contenu;
    protected string $image;
    protected string $type; 
    protected int $idCategory;
    protected int $idTeacher;
    protected string $date_creation;
    protected array $Students = [];
    

    public function __construct( string $titre, string $description, string $contenu, string $image, string $type, int $idCategory, int $idTeacher, string $date_creation) {
        
        $this->titre = $titre;
        $this->description = $description;
        $this->contenu = $contenu;
        $this->image = $image;
        $this->type = $type;
        $this->idCategory = $idCategory;
        $this->idTeacher = $idTeacher;
        $this->date_creation = $date_creation;
    }

    public function getIdCours(): int {
        return $this->idCours;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getContenu(): string {
        return $this->contenu;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getIdCategory(): int {
        return $this->idCategory;
    }

    public function getIdTeacher(): int {
        return $this->idTeacher;
    }

    public function getDateCreation(): string {
        return $this->date_creation;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setContenu(string $contenu): void {
        $this->contenu = $contenu;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setIdCategory(int $idCategory): void {
        $this->idCategory = $idCategory;
    }

    public function setIdTeacher(int $idTeacher): void {
        $this->idTeacher = $idTeacher;
    }

    public function setDateCreation(string $date_creation): void {
        $this->date_creation = $date_creation;
    }

    public static function getAllCourses(PDO $conn): array {
        $sql = "SELECT c.*, t.*, COUNT(ci.idStudent) as student_count 
                FROM cours c 
                JOIN courseinscription ci ON c.idCours = ci.idCours 
                JOIN user s ON ci.idStudent = s.idUser 
                JOIN user t ON t.idUser = c.idTeacher 
                GROUP BY c.idCours";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(PDO $conn): void {
        $sql = "INSERT INTO cours (titre, description, contenu, image, type, idCategory, idTeacher, date_creation) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $this->titre, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->description, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->contenu, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->image, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->type, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->idCategory, PDO::PARAM_INT);
        $stmt->bindValue(7, $this->idTeacher, PDO::PARAM_INT);
        $stmt->bindValue(8, $this->date_creation, PDO::PARAM_STR);
        $stmt->execute();
    }
}

