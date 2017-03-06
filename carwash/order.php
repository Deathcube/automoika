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
                    <div class="mitem"><a href="#"><p>Запись на мойку</p></a></div>
                    <div class="mitem"><a href="#"><p>Контакты</p></a></div>
                    <div class="mitem"><a href="order.php"><p>Заказы</p></a></div>
                </div>
            </div>

            <div class="content">

                <p class="class info">Здесь вы можете проверить и отредактировать свой заказ.</p>

                <div class="ordersWrapper">
                    <!-- Sample -->
                    <div class="singleOrder">
                        <form>
                            <div class="userData">
                                <div class="userName"><input class="uName uf" name="userName" type="text" value="тратата" disabled required /></div>
                                <div class="userPhone"><input class="uPhone uf" name="userPhone" type="text" value="тратата" disabled required /></div>
                                <div class="userDate"><input class="uDate uf" name="userDate" type="text" value="тратата" disabled required /></div>
                                <div class="btns">
                                    <input class="editbtn" type="button" value="Редактировать" />
                                    <input type="submit" value="OK" />
                                </div>
                            </div>
                        </form>


                        <div class="userServises">
                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="singleOrder">
                        <div class="userData">
                            <div class="userName"><input class="uName uf" name="userName" type="text" value="тратата" disabled required /></div>
                            <div class="userPhone"><input class="uPhone uf" name="userPhone" type="text" value="тратата" disabled required /></div>
                            <div class="userDate"><input class="uDate uf" name="userDate" type="text" value="тратата" disabled required /></div>
                            <div class="btns">
                                <input class="editbtn" type="button" value="Редактировать" />
                                <input type="submit" value="OK" />
                            </div>
                        </div>

                        <div class="userServises">
                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>

                            <div class="item">
                                <p class="otext">sfjnsejfnsj</p>
                                <input class="delbtn" type="button" value="Удалить" disabled />
                            </div>
                        </div>
                    </div>

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