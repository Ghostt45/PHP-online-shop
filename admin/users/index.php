<?php
  include '../../app/controllers/users.php';
  $users = mysqli_query($connect, "SELECT * FROM `users`");
  $users = mysqli_fetch_all($users, MYSQLI_ASSOC);

session_start();
$success = isset($_SESSION['success']) ? $_SESSION['success'] : [];
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>

    <?php 
      include ("../../app/include/header-admin.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="sidebar col-2">
                <ul>
                    <li>
                        <a href="../posts/index.php">Товары</a>
                    </li>
                    <li>
                        <a href="../users/index.php">Пользователи</a>
                    </li>
                    <li>
                        <a href="../orders/index.php">Заказы</a>
                    </li>
                </ul>
            </div>
            <div class="posts col-9">
                <div class="button row btn-row col-6">
                    <span class="col-6"></span>
                    <a href="create.php" class="col-6 btn btn-success">Создать пользователя</a>
                </div>
                <h2 style="margin-top: 70px; margin-bottom: 40px; text-align: center;" class="h2">Пользователи</h2>

                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success">
                        <ul>
                            <?php foreach ($success as $succes) : ?>
                                <li><?php echo htmlspecialchars($succes); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>id</th>
                <th>admin</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
                <th>created</th>
                <th>&#9998;</th>
                <th>&#10006;</th>
            </tr>

            <?php

            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['admin'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['password'] ?></td>
                    <td><?php echo $user['created'] ?></td>
                    <td><a href="update-form.php?id=<?php echo $user['id'] ?>">Изменить</a></td>
                    <td><a class="delete-btn" href="delete.php?id=<?php echo $user['id'] ?>">Удалить</a></td>
                </tr>
            <?php
            }
            ?>


        </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>