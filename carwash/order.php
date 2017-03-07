<?php
    require_once "../backend/OrderPage.php";
    $orderPage = new OrderPage();
    $orderPage->manageOrderDBData();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Заказы</title>

        <link href="../css/carwasher.css" rel="stylesheet">
        <link href="../css/order.css" rel="stylesheet">

    </head>
    <body>

        <div class="wrapper">
            <div class="header">
                <div class="wall">
                    <img id="logo" src="../images/logo.png" />
                </div>

                <div class="menu">
                    <div class="mitem"><a href="main.php"><p>Главная</p></a></div>
                    <div class="mitem"><a href="#"><p>Контакты</p></a></div>
                    <div class="mitem"><a href="order.php"><p>Заказы</p></a></div>
                </div>
            </div>

            <div class="content">

                <p class="class info">Здесь вы можете проверить и отредактировать свой заказ.</p>

                <div class="ordersWrapper">
                    <!-- Sample -->

                        <?php
                            echo $orderPage->manageOrderDBData();
                        ?>

                </div>

            </div>

            <div class="footer">
                <p>Все права защищены &copy</p>
            </div>
        </div>

        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/orders.js" type="text/javascript"></script>
    </body>
</html>