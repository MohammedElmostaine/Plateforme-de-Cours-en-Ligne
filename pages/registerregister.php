<?php


require_once "../db/connection.php";
require_once "../classes/user.php";

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                      if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
                      $username = $_POST['username'];
                      $email = $_POST['email'];
                      $password = $_POST['password'];
                      $role = $_POST['role'];

                      $db = (new Database())->connect();
                      $user = new User($db);

                      $result = $user->register($username, $email, $password, $role);
                      if ($result === true) {
                        echo  "<script>alert('Registration successful!');</script>";
                        $_POST['username'] = '';
                        $_POST['email'] = '';
                        $_POST['password'] = '';
                        $_POST['role'] = '';
                      } else {
                        if (isset($_SESSION['error'])) {
                        echo "<script>alert('{$_SESSION['error']}');</script>";
                        unset($_SESSION['error']);
                        }
                        $_POST['username'] = '';
                        $_POST['email'] = '';
                        $_POST['password'] = '';
                        $_POST['role'] = '';
                      }
                      } 
                      
                      header('Location: login.php');
                    }
                    ?>