<?php 
session_start();

require_once "../classes/user.php";

if (isset($_SESSION['user'])) {
    User::logout();
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}