<?php
include __DIR__ . '/../database/connect.php';

session_start();

$errMsg = [];
$succMsg = [];

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
//     $id = $_POST['id'];
//     $admin = 0;
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];
//     $radio = $_POST['radio'];
//     $created = $_POST['CURRENT_TIMESTAMP'];


//     if ($radio == "option2") {
//         $admin = 1;
//     } else {
//         $admin = 0;
//     }


//     if ($password !== $confirm_password) {
//         $errMsg[] = 'Пароли не совпадают.';
//     }

//     if (strlen($password) < 8) {
//         $errMsg[] = 'Пароль должен быть длиной не менее 8 символов.';
//     }

//     if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
//         $errMsg[] = "Вы не заполнили обязательные поля.";
//     }


//     $check_query = "SELECT COUNT(*) AS count FROM users WHERE username='$username'";
//     $check_result = mysqli_query($connect, $check_query);
//     $row = mysqli_fetch_assoc($check_result);
//     if ($row['count'] > 0) {
//         $errMsg[] = "Имя пользователя уже занято";
//     }


//     $check_query3 = "SELECT COUNT(*) AS count FROM users WHERE email='$email'";
//     $check_result3 = mysqli_query($connect, $check_query3);
//     $row3 = mysqli_fetch_assoc($check_result3);
//     if ($row3['count'] > 0) {
//         $errMsg[] = "Адрес электронной почты уже используется";
//     }


// if (empty($errMsg)) {
//     mysqli_query($connect, "INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES (NULL, '$admin', '$username', '$email', '$password', CURRENT_TIMESTAMP)");
// $succMsg[] = "Пользователь " . $username . " успешно зарегистрирован";

// $_SESSION['success'] = $succMsg;

// $last_id = mysqli_insert_id($connect);

// $_SESSION['id'] = $last_id;
// $_SESSION['username'] = $username;
// $_SESSION['admin'] = $admin;

// if ($_SESSION['admin']) {
//     header('Location: ../../admin/admin.php');
// }

// echo "<pre>";
// echo print_r($_SESSION);
// echo "</pre>";

//         header('Location: ../../admin/users/index.php');
//         exit();
//     } else {
//         $_SESSION['errors'] = $errMsg;
//         header('Location: ../../admin/users/create.php');
//         exit();
//     }
// }



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
}


// PRODUCTS


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-create'])) {
    $id = $_POST['id'];

    $id_user = $_SESSION['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $radio = $_POST['radio'];
    $created = $_POST['CURRENT_TIMESTAMP'];
    $price = $_POST['price'];
    $status = 0;


    if ($radio == "option2") {
        $status = 1;
    } else {
        $status = 0;
    }


    if (empty($title) || empty($description) || empty($quantity) || empty($price)) {
        $errMsg[] = "Вы не заполнили обязательные поля.";
    }




    if (empty($errMsg)) {
        mysqli_query($connect, "INSERT INTO `posts` (`id`, `id_user`, `title`, `description`, `quantity`, `price`, `status`, `create_date`) VALUES (NULL, '$id_user', '$title', '$description', '$quantity', '$price', '$status', CURRENT_TIMESTAMP)");
        $succMsg[] = "Товар " . $title . " успешно создан!";

        $_SESSION['success'] = $succMsg;


        // echo "<pre>";
        // echo print_r($_SESSION);
        // echo "</pre>";

        header('Location: ../../admin/posts/index.php');
        exit();
    } else {
        $_SESSION['errors'] = $errMsg;
        header('Location: ../../admin/posts/create.php');
        exit();
    }
}

// STATUS EDIT

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];


    mysqli_query($connect, "UPDATE `posts` SET `status` = '$status' WHERE `id` = '$id'");
    header('Location: ../../admin/posts/index.php');
    exit();
}


// ADD TO CART

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-add-to-cart'])) {
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity-input'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $product_exists = 0;

    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $product_id) {
            $cart_item['quantity'] += $quantity;
            $product_exists = 1;
            break;
        }
    }

    if (!$product_exists) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'title' => $product_title,
            'price' => $product_price,
            'quantity' => $quantity
        ];
    }

    header('Location: ../../cart.php');
    exit();
}


// DELETE FROM CART
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-remove-from-cart'])) {
    $product_id = $_POST['product_id'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }

    header('Location: ../../cart.php');
    exit();
}



?>