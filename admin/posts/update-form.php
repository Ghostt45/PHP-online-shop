<?php
include '../../app/controllers/posts.php';
$posts_id = $_GET['id'];
$post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id`='$posts_id'");
$post = mysqli_fetch_assoc($post);
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
                    <input type="hidden" name="id" value="<?php echo $posts_id ?>">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Название</label>
                        <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $post['title'] ?>" placeholder="Введите название...">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Описание</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание..."><?php echo $post['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Количество продуктов</label>
                        <input name="quantity" class="form-control" id="exampleInputPassword1" value="<?php echo $post['quantity'] ?>" placeholder="Введите количество...">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Цена</label>
                        <input name="price" class="form-control" id="exampleInputPassword1" value="<?php echo $post['price'] ?>" placeholder="Введите цену...">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="option1" <?php echo $post['status'] == 0 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio1">Не публиковать</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="option2" <?php echo $post['status'] == 1 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio2">Публиковать</label>
                    </div>
                    <button style="margin-top: 15px;" name="button-create-edit" type="submit" class="btn btn-primary">Изменить товар</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>