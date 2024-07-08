<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="index.php">MyShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../cart.php">Корзина</a>
                </li>
                


                <li class="nav-item dropdown">
                    <?php if (isset($_SESSION['id'])): ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION['admin']): ?>
                        <li><a class="dropdown-item" href="../../admin/admin.php">Админ панель</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="<?php echo "logout.php";?>">Выход</a></li>
                    </ul>
                    <?php else: ?>

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Личный кабинет
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="reg.php">Регистрация</a></li>
                        <li><a class="dropdown-item" href="log.php">Войти</a></li>
                    </ul>

                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>