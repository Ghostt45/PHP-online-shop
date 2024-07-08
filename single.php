<?php
include 'app/controllers/posts.php';

$id = $_GET['id'];

$single_posts = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = '$id'");
$single_posts = mysqli_fetch_all($single_posts, MYSQLI_ASSOC);

// echo "<pre>";
// echo print_r($single_posts);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php
    include("app/include/header.php");
    ?>

    <div class="container">

    <?php foreach ($single_posts as $single_post) { ?>
    <form method="post" action="app/controllers/posts.php">
        <h2 style="margin-top: 20px; margin-bottom: 30px;">Покупка товара</h2>
        <div class="row" style="margin-top: 50px;">
            <h2 class="card-title">Название товара <?php echo $single_post['title']; ?></h2>
            <p class="card-text">Описание товара <?php echo $single_post['description']; ?></p>
            <p class="card-text">Цена <?php echo $single_post['price']; ?></p>
            <p class="card-text">Доступное количество <?php echo $single_post['quantity']; ?></p>
            <div class="mb-3">
                <input name="quantity-input" type="number" class="form-control" id="exampleInputPassword1" placeholder="Введите количество для покупки..." min="1" max="<?php echo $single_post['quantity']; ?>">
            </div>
            <input type="hidden" name="product_id" value="<?php echo $single_post['id']; ?>">
            <input type="hidden" name="product_title" value="<?php echo $single_post['title']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $single_post['price']; ?>">
            <button name="button-add-to-cart" type="submit" class="btn btn-success">Добавить в корзину</button>
        </div>
    </form>
<?php } ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>