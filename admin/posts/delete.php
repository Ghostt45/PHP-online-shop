<?php
require_once '../../app/database/connect.php';

session_start();

$succMsg = [];

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    

    $result = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = '$id'");
    if(mysqli_num_rows($result) > 0) {
        mysqli_query($connect, "DELETE FROM `posts` WHERE `id` = '$id'");
        $succMsg[] = "Товар с ID " . $id . " успешно удален!";
        
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