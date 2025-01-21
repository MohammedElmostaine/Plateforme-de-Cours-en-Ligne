<?php
session_start();
require_once 'classes/admin.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = unserialize($_SESSION['user']);

var_dump($user);