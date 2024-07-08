<?php
  include '../../app/controllers/posts.php';

  session_start();
  $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
  unset($_SESSION['errors']);
// ?>

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
        <div class="row col-12">
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

            <span class="col-1"></span>
       <div class="col-9">     
      <form method="post" action="../../app/controllers/posts.php">
        <h2 style="margin-top: 20px; margin-bottom: 30px; text-align:center;">Новый товар</h2>


        
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
          <label for="formGroupExampleInput" class="form-label">Название</label>
          <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите название...">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Описание</label>
          <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание..."></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Количество продуктов</label>
          <input name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Введите количество...">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Цена</label>
          <input name="price" class="form-control" id="exampleInputPassword1" placeholder="Введите цену...">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="option1" checked>
          <label class="form-check-label" for="inlineRadio1">Не публиковать</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Публиковать</label>
        </div>
        <button style="margin-top: 15px;" name="button-create" type="submit" class="btn btn-primary">Добавить товар</button>
      </form>  
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>