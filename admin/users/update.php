<?php
require_once '../../app/database/connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];
$radio = $_POST['radio'];
$admin = 0;

if ($radio == "option2") {
    $admin = 1;
} else {
    $admin = 0;
}

mysqli_query($connect, "UPDATE `users` SET `username` = '$username', `email` = '$email', `password` = '$password', `admin` = $admin WHERE `users`.`id` = '$id'");
header('location: index.php');
?>