<?php 
session_start();
require_once "../classes/user.php";

    if (isset($_SESSION['user_id'])) {
        User::logout();
        header("Location: ../index.php");
        exit();
    }