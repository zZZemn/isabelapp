<?php
session_start();
include('../backend/class.php');
$db = new global_class();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISABELAPP | Admin</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../global/css/login.css">
    <link rel="stylesheet" href="../global/css/styles.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="shortcut icon" href="../assets/system-img/logo.png" type="image/x-icon">
</head>

<alert class="alert"></alert>

<body class="">