<?php
session_start();


if (null !== $_SESSION['user']->getRole() &&  ($_SESSION['user']->getRole() == 'Admin')  ) {
  header('Location: Admin/admindashboard.php');
  exit();
}elseif ( null !== $_SESSION['user']->getRole() && ( $_SESSION['user']->getRole() == 'Teacher'  )) {
  header('Location:  teacher/teacherdash.php');
  exit();
} elseif ( null !== $_SESSION['user']->getRole() && ( $_SESSION['user']->getRole() == 'Student' ) ) {
  header('Location: dashboard.php');
  exit();
}

require_once "../db/connection.php";
require_once "../classes/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameOrEmail = $_POST['username'];
            $password = $_POST['password'];
            
            $db = (new Database())->connect();
            if (User::login($db, $usernameOrEmail, $password)) {
              header("Location: ../index.php");
              exit();
            } else {
              header("Location: login.php");
            }
        }
        ?>