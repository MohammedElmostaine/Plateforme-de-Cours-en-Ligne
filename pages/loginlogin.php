<?php
session_start();

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