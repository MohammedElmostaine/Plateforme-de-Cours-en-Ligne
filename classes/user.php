<?php

class User
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $status;
    protected $role;

    public function __construct($id = null, $username = null, $email = null, $status = null    , $password = null, $role = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->status = $status;  
        $this->password = $password;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
    public function getRole()   {
        return $this->role;
    }
    

    public static function register($username, $email, $password, $role)
    {
        $db = (new Database())->connect();

        // Vérification du nom d'utilisateur et de l'email
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $result = $stmt->fetch();

        if ($result) {
            $_SESSION['error'] = "Username or email already in use.";
            return false;
        }

        // Insertion de l'utilisateur
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$username, $email, $hashedPassword, $role])) {
            return true;
        }

        $_SESSION['error'] = "Registration failed.";
        return false;
    }

    public static function login($usernameOrEmail, $password)
    {
        $db = (new Database())->connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            switch ($user['role']) {
                case 'Admin':

                    $_SESSION['user'] = serialize(new Admin($user['id'], $user['username'], $user['email'], $user['password'], $user['role']));
                    break;
                case 'Teacher':
                    $_SESSION['user'] = serialize(new Teacher($user['id'], $user['username'], $user['email'], $user['password'], $user['role']));
                    break;
                case 'Student':
                    $_SESSION['user'] = serialize(new Student($user['id'], $user['username'], $user['email'], $user['password'], $user['role']));
                    break;
                default:
                $_SESSION['loginError'] = "Invalid role.";
                    return false;
            }
            return true;
        }

        $_SESSION['loginError'] = "Invalid credentials.";
        return false;
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    
}
class Student extends User
{
    public function __construct($id = null, $username = null, $email = null, $password = null, $role = 'Student')
    {
        parent::__construct($id, $username, $email, $password, $role);
    }

    public function enrollCourse($courseId)
    {
        $db = (new Database())->connect();
        $stmt = $db->prepare("INSERT INTO course_enrollments (course_id, student_id) VALUES (?, ?)");
        return $stmt->execute([$courseId, $this->id]);
    }

    public function getCourses()
    {
        $db = (new Database())->connect();
        $stmt = $db->prepare("SELECT c.* FROM courses c JOIN course_enrollments ce ON c.id = ce.course_id WHERE ce.student_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll();
    }
}

class Teacher extends User
{
    public function __construct($id = null, $username = null, $email = null, $password = null, $role = 'Teacher')
    {
        parent::__construct($id, $username, $email, $password, $role);
    }

    public function addCourse($title, $description, $content, $categoryId)
    {
        $db = (new Database())->connect();
        $stmt = $db->prepare("INSERT INTO courses (title, description, content, category_id, teacher_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $content, $categoryId, $this->id]);
    }

    public function getCourses()
    {
        $db = (new Database())->connect();
        $stmt = $db->prepare("SELECT * FROM courses WHERE teacher_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll();
    }
}

class Admin extends User
{
    public function __construct($id = null, $username = null, $email = null, $password = null, $role = 'Admin')
    {
        parent::__construct($id, $username, $email, $password, $role);
    }

    public function validateTeacher($teacherId)
    {
        $db = (new Database())->connect();
        $stmt = $db->prepare("UPDATE users SET status = 'active' WHERE id = ? AND role = 'teacher'");
        return $stmt->execute([$teacherId]);
    }

    public function manageUser($userId, $action)
    {
        $db = (new Database())->connect();
        if ($action === 'delete') {
            $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
            return $stmt->execute([$userId]);
        } else {
            $status = $action === 'activate' ? 'active' : 'suspended';
            $stmt = $db->prepare("UPDATE users SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $userId]);
        }
    }
}

?>