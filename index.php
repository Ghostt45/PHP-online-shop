<?php
  include 'app/controllers/posts.php';

  $posts = mysqli_query($connect, "SELECT * FROM `posts` WHERE `status` = 1");
  $posts = mysqli_fetch_all($posts, MYSQLI_ASSOC);

  // echo "<pre>";
  // echo print_r($posts);
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
      include ("app/include/header.php");
    ?>

    <div class="container">

    <?php foreach ($posts as $post) {
      ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $post['title']; ?></h5>
          <p class="card-text"><?php echo $post['description']; ?></p>
          <p class="card-text"><?php echo $post['price']; ?></p>
          <a href="<?= 'single.php?id=' . $post['id'];?>" class="btn btn-primary">Подробнее</a>
        </div>
      </div>
      <?php
    }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>