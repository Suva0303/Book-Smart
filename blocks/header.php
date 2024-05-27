<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSmart</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>


<header class="container">
            <span class="logo">BookSmart</span>
            <nav>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="catalog.php">Каталог</a></li>

                    <?php
                    if(isset($_COOKIE['login']))
                    {
                        echo '<li><a href="user.php">ЛК</a></li>
                        <li class="btn"><a href="cart.php">Корзина</a></li>
                        <li class="btn"><a href="order-item.php">Заказы</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="reg.php">Регистрация</a></li>
                        <li><a href="login.php">Вход</a></li>';
                    }
                    ?>

                    
                </ul>
            </nav>
        </header>