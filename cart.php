<?php
  include 'app/controllers/orders.php';
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

  <?php include("app/include/header.php"); ?>

  <div class="container">
    <h2 style="margin-top: 20px; margin-bottom: 30px;">Корзина</h2>
    <div class="row" style="margin-top: 50px;">
      <Form method="post" action="app/controllers/orders.php">
      <?php
      if (!empty($_SESSION['cart'])) { 
      ?>
        
      <?php
      }
      ?>
      </Form>
      <?php
      if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
      ?>
          <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $cart_item['title']; ?></h5>
              <p class="card-text">Цена: <?php echo $cart_item['price'] * $cart_item['quantity']; ?></p>
              <p class="card-text">Количество: <?php echo $cart_item['quantity']; ?></p>
              <form method="post" action="app/controllers/orders.php">
                <input type="hidden" name="product_id" value="<?php echo $cart_item['id']; ?>">
                <button name="button-remove-from-cart" type="submit" class="btn btn-danger">Удалить</button>
                <button style="float: right;" name="button-create-cart-order" type="submit" class="btn btn-success">Купить</button>
              </form>
            </div>
          </div>

      <?php
        }
      } else {
        echo "<p>Ваша корзина пуста.</p>";
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>