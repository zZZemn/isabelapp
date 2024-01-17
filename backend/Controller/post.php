<?php
include('../class.php');
$db = new global_class();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['SubmitType'])) {
        if ($_POST['SubmitType'] == 'Login') {
            if (isset($_POST['UserType'])) {
                if ($_POST['UserType'] == 'Admin') {
                    $password = $_POST['password'];
                    $loginResult = $db->login('admin', $_POST['username']);
                    if ($loginResult->num_rows > 0) {
                        $user = $loginResult->fetch_assoc();
                        if (password_verify($password, $user['PASSWORD'])) {
                            session_start();
                            $_SESSION['admin_id'] = $user['ID'];
                            echo 200;
                        } else {
                            echo 'Login Failed';
                        }
                    } else {
                        echo 'Login Failed';
                    }
                } elseif ($_POST['UserType'] == 'SMEs') {
                    $password = $_POST['password'];
                    $loginResult = $db->login($_POST['smesType'], $_POST['username']);
                    if ($loginResult->num_rows > 0) {
                        $user = $loginResult->fetch_assoc();
                        if (password_verify($password, $user['PASSWORD'])) {
                            session_start();
                            $_SESSION['smes_id'] = $user['ID'];
                            $_SESSION['smes_type'] = $_POST['smesType'];
                            echo 200;
                        } else {
                            echo 'Login Failed';
                        }
                    } else {
                        echo 'Login Failed';
                    }
                } else {
                    echo 'Tourist';
                }
            }
        } elseif ($_POST['SubmitType'] == 'SMEsSignUp') {
            echo $db->SMEsSignup($_POST['smesType'], $_POST['name'], $_POST['address'], $_POST['username'], $_POST['password']);
        }
    }
}
