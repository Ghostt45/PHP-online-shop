<?php
include '../../app/controllers/users.php';
$users_id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$users_id'");
$user = mysqli_fetch_assoc($user);
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
                <h2 style="margin-top: 70px; margin-bottom: 40px; text-align: center;" class="h2">Редактирование пользователя</h2>
                <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $users_id?>">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Логин</label>
                    <input name="username" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $user['username']?>" placeholder="Введите логин...">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['email']?>" placeholder="Введите Email...">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $user['password']?>" placeholder="Введите пароль...">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="option1" <?php echo $user['admin'] == 0 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="inlineRadio1">Не Админ</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="option2" <?php echo $user['admin'] == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="inlineRadio2">Админ</label>
                </div>
                <button style="margin-top: 15px;" name="button-reg" type="submit" class="btn btn-primary">Редактировать пользователя</button>
                </form> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>