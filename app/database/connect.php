 <?php
    // $driver = 'mysql';
    // $host = 'localhost';
    // $db_name = 'myshop';
    // $db_user = 'root';
    // $db_pass = 'mysql';
    // $charset = 'utf8mb3';
    // $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    // try {
    //     $pdo = new PDO(
    //         "$driver:localhost=$host;myshop=$db_name;utf8mb3=$charset",
    //         $db_user, $db_pass, $options
    //     );
    // } catch (PDOException $i) {
    //     die("Ошибка подключения к базе данных");
    // }
?>


<?php

$connect = mysqli_connect('localhost', 'root', '', 'myshop');
if(!$connect) {
    die('Error, connection to DB');
}

?>