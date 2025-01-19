<?php
session_start();

if (isset($_SESSION['role']) && ($_SESSION['role'] = 'Admin' ) ) {
    header('Location: Admin/admindashboard.php');
    exit();
  }elseif (isset($_SESSION['role']) && ($_SESSION['role'] = 'Teacher' ) ) {
    header('Location:  dashboard.php');
    exit();
  } elseif (isset($_SESSION['role']) && ($_SESSION['role'] = 'Student' ) ) {
    header('Location: dashboard.php');
    exit();
  }

require_once "../db/connection.php";
require_once "../classes/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameOrEmail = $_POST['username'];
            $password = $_POST['password'];
            
            $db = (new Database())->connect();
            $user = new User($db);
            if ($user->login($usernameOrEmail, $password)) {
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login.php");
            }
        }
        ?>