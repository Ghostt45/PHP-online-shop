<?php
  include 'app/controllers/users.php';

  session_start();
  $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
  unset($_SESSION['errors']);
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
      <form method="post" action="app/controllers/users.php">
        <h2 style="margin-top: 20px; margin-bottom: 30px;">Авторизация</h2>


        <?php if (!empty($errors)): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php foreach ($errors as $error): ?>
                          <li><?php echo htmlspecialchars($error); ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          <?php endif; ?>


        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш Email...">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Пароль</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль...">
        </div>
        <button name="button-log" type="submit" class="btn btn-primary">Войти</button>
        <a href="reg.php" class="btn">Зарегистрироваться</a>
      </form>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>