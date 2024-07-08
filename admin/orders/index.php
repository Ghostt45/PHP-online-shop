<?php
include '../../app/controllers/orders.php';
$orders = mysqli_query($connect, "SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);

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
    include("../../app/include/header-admin.php");
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
                </div>
                <h2 style="margin-top: 70px; margin-bottom: 40px; text-align: center;" class="h2">Заказы</h2>

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
                        <th>id_post</th>
                        <th>username</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>created</th>
                        <th>status</th>
                        <th>&#9998;</th>
                        <th>&#9998;</th>
                        <th>&#10006;</th>
                    </tr>

                    <?php

                    foreach ($orders as $order) {
                    ?>
                        <tr>
                            <td><?php echo $order['id'] ?></td>
                            <td><?php echo $order['id_post'] ?></td>
                            <td><?php echo $order['username'] ?></td>
                            <td><?php echo $order['quantity'] ?></td>
                            <td><?php echo $order['price'] ?></td>
                            <td><?php echo $order['create_date'] ?></td>
                            <?php if ($order['status'] == 0) { ?>
                                <td>
                                    <p style="color: orange;">В ожидании</p>
                                </td>
                            <?php } else if ($order['status'] == 1) { ?>
                                <td>
                                    <p style="color: green;">Одобрено</p>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <p style="color: red;">Отказано</p>
                                </td>
                            <?php } ?>
                            <form action="../../app/controllers/orders.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                <td><button name="btn" class="btn btn-primary" value="1">Принять</button></td>
                                <td><button name="btn" class="btn btn-primary" value="2">Отклонить</button></td>
                            </form>
                            <td><a class="delete-btn" href="delete.php?id=<?php echo $order['id'] ?>">Удалить</a></td>
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