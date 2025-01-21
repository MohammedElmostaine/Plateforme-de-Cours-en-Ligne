<?php
session_start();
require_once "../../db/connection.php";
require_once '../../classes/user.php';

if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    if ($user->getRole() !== 'Teacher') {
        header('Location: ../../index.php');
        exit();
    }
} else {
    header('Location: ../../index.php');
    exit();
}

?>