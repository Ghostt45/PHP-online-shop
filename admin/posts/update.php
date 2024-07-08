<?php
require_once '../../app/database/connect.php';

$title = $_POST['title'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$id_user = $_POST['id_user'];
$id = $_POST['id'];
$radio = $_POST['radio'];
$status = 0;
$price = $_POST['price'];

if ($radio == "option2") {
    $status = 1;
} else {
    $status = 0;
}

mysqli_query($connect, "UPDATE `posts` SET `title` = '$title', `description` = '$description', `quantity` = '$quantity', `price` = '$price', `status` = '$status' WHERE `posts`.`id` = '$id'");
header('location: index.php');
// echo "<pre>";
// echo print_r($_POST);
// echo "</pre>";
?>