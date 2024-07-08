<?php
require_once '../../app/database/connect.php';

session_start();

$succMsg = [];

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    

    $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    if(mysqli_num_rows($result) > 0) {
        mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$id'");
        $succMsg[] = "Пользователь с ID " . $id . " успешно удален!";
        
        $_SESSION['success'] = $succMsg;
        header('location: index.php');
    } else {
        echo "Запись с указанным ID не найдена";
        exit();
    }
} else {
    echo "Неверный ID";
    exit();
}
?> 