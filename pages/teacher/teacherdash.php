<?php
session_start();
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'Teacher')) {
    header('Location: ../login.php');
    exit();
}
 echo "Welcome {$_SESSION['role']}";

    
?>