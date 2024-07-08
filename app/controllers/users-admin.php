<?php
include __DIR__ . '/../database/connect.php';

session_start();

$errMsg = [];
$succMsg = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $id = $_POST['id'];
    $admin = 0;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $radio = $_POST['radio'];
    $created = $_POST['CURRENT_TIMESTAMP'];

    
    if ($radio == "option2") {
        $admin = 1;
    } else {
        $admin = 0;
    }

    
    if ($password !== $confirm_password) {
        $errMsg[] = 'Пароли не совпадают.';
    }
    
    if (strlen($password) < 8) {
        $errMsg[] = 'Пароль должен быть длиной не менее 8 символов.';
    }

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errMsg[] = "Вы не заполнили обязательные поля.";
    }

    
    $check_query = "SELECT COUNT(*) AS count FROM users WHERE username='$username'";
    $check_result = mysqli_query($connect, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    if ($row['count'] > 0) {
        $errMsg[] = "Имя пользователя уже занято";
    }

    
    $check_query3 = "SELECT COUNT(*) AS count FROM users WHERE email='$email'";
    $check_result3 = mysqli_query($connect, $check_query3);
    $row3 = mysqli_fetch_assoc($check_result3);
    if ($row3['count'] > 0) {
        $errMsg[] = "Адрес электронной почты уже используется";
    }


    if (empty($errMsg)) {
        mysqli_query($connect, "INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES (NULL, '$admin', '$username', '$email', '$password', CURRENT_TIMESTAMP)");
        
        
        $succMsg[] = "Пользователь " . $username . " успешно создан!";
        
        $_SESSION['success'] = $succMsg;



        // if ($_SESSION['admin']) {
        //     header('Location: ../../admin/admin.php');
        // }

        // echo "<pre>";
        // echo print_r($_SESSION);
        // echo "</pre>";

        header('Location: ../../admin/users/index.php');
        exit();
    } else {
        $_SESSION['errors'] = $errMsg;
        header('Location: ../../admin/users/create.php');
        exit();
    }
}



// LOGIN


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    if (empty($email) || empty($password)) {
        $errMsg[] = "Вы не заполнили обязательные поля.";
    }

    $check_query3 = "SELECT COUNT(*) AS count FROM users WHERE email='$email' AND `password`='$password'";
    $check_result3 = mysqli_query($connect, $check_query3);
    $row3 = mysqli_fetch_assoc($check_result3);
    if ($row3['count'] > 0) {

        $user_query = "SELECT username, `admin`, id FROM users WHERE email='$email' AND `password`='$password'";
        $user_result = mysqli_query($connect, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);
        $_SESSION['username'] = $user_row['username'];
        $_SESSION['admin'] = $user_row['admin'];        
        $_SESSION['id'] = $user_row['id'];
        

        if ($_SESSION['admin']) {
            header('Location: ../../admin/admin.php');
        }
        
        header('Location: ../../index.php');
        
    } else {
        $errMsg[] = "Почта либо пароль введены неверно";
        header('Location: ../../log.php');
    }
    

    $_SESSION['errors'] = $errMsg;
    

        // echo "<pre>";
        // echo print_r($count);
        // echo "</pre>";

}
?>
