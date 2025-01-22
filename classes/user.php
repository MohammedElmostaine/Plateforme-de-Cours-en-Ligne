<?php

class User
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $status;
    protected $role;

    public function __construct($id = null, $username = null, $email = null, $status = null, $password = null, $role = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->status = $status;
        $this->password = $password;
        $this->role = $role;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }
    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public static function register($username, $email, $password, $role)
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);
            if ($stmt->fetch()) {
                $_SESSION['error'] = "Username or email already in use.";
                return false;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $status = ($role === 'Teacher') ? 'pending' : 'active';
            $stmt = $db->prepare("INSERT INTO users (username, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$username, $email, $hashedPassword, $role, $status]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Registration failed.";
            return false;
        }
    }

    public static function login($usernameOrEmail, $password)
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                switch ($user['role']) {
                    case 'Admin':
                        $_SESSION['user'] = serialize(new Admin($user['id'], $user['username'], $user['email'], $user['status'], $user['password'], $user['role']));
                        break;
                    case 'Teacher':
                        $_SESSION['user'] = serialize(new Teacher($user['id'], $user['username'], $user['email'], $user['status'], $user['password'], $user['role']));
                        break;
                    case 'Student':
                        $_SESSION['user'] = serialize(new Student($user['id'], $user['username'], $user['email'], $user['status'], $user['password'], $user['role']));
                        break;
                    default:
                        $_SESSION['loginError'] = "Invalid role.";
                        return false;
                }
                return true;
            }
            $_SESSION['loginError'] = "Invalid credentials.";
            return false;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $_SESSION['loginError'] = "An error occurred during login.";
            return false;
        }
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
    public function __construct($id = null, $username = null, $email = null, $status = null, $password = null)
    {
        parent::__construct($id, $username, $email, $status, $password, 'Student');
    }

    public function enrollCourse($courseId)
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("INSERT INTO course_enrollments (course_id, student_id) VALUES (?, ?)");
            return $stmt->execute([$courseId, $this->id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function getCourses()
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("SELECT c.* FROM courses c JOIN course_enrollments ce ON c.id = ce.course_id WHERE ce.student_id = ?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
}

class Teacher extends User
{
    public function __construct($id = null, $username = null, $email = null, $status = null, $password = null)
    {
        parent::__construct($id, $username, $email, $status, $password, 'Teacher');
    }

    public function addCourse($title, $description, $content, $categoryId)
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("INSERT INTO courses (title, description, content, category_id, teacher_id) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$title, $description, $content, $categoryId, $this->id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function getCourses()
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("SELECT * FROM courses WHERE teacher_id = ?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
}

class Admin extends User
{
    public function __construct($id = null, $username = null, $email = null, $status = null, $password = null)
    {
        parent::__construct($id, $username, $email, $status, $password, 'Admin');
    }

    public function validateTeacher($teacherId)
    {
        try {
            $db = (new Database())->connect();
            $stmt = $db->prepare("UPDATE users SET status = 'active' WHERE id = ? AND role = 'Teacher'");
            return $stmt->execute([$teacherId]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function manageUser($userId, $action)
    {
        try {
            $db = (new Database())->connect();
            if ($action === 'delete') {
                $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
                return $stmt->execute([$userId]);
            } else {
                $status = $action === 'activate' ? 'active' : 'suspended';
                $stmt = $db->prepare("UPDATE users SET status = ? WHERE id = ?");
                return $stmt->execute([$status, $userId]);
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}

?>
