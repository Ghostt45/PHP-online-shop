<?php
  include '../app/controllers/users.php';
//   $users = mysqli_query($connect, "SELECT * FROM `users`");
//   $users = mysqli_fetch_all($users, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

    <?php 
      include ("../app/include/header-admin.php");
    ?>

    <div class="container">
    <h2 style="margin-top: 10px; margin-bottom: 10px; text-align: center;" class="h2">Админ панель</h2>
        <div class="row">
            <div class="sidebar col-12">
                <ul>
                    <li>
                        <a href="posts/index.php">Товары</a>
                    </li>
                    <li>
                        <a href="users/index.php">Пользователи</a>
                    </li>
                    <li>
                        <a href="orders/index.php">Заказы</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>