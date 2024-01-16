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
                    echo 'SMEs';
                } else {
                    echo 'Tourist';
                }
            }
        }
    }
}
