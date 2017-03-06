<?php

require_once "../backend/CWash.php";

$cw = new CWash();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarWasher</title>

    <link href="../css/carwasher.css" rel="stylesheet">
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
                <div class="mitem"><a href="order.html"><p>Заказы</p></a></div>
            </div>
        </div>

        <div class="content">
            <div class="info">
                <p class="infotext">Мы рады приветствовать Вас в нашем автомоечном комплексе. Высокое качество мойки и комфорт клиента - наши основные приоритеты . К Вашим услугам 6 автомоечных боксов и комфортная комната отдыха с бесплатным Wi-fi, где вы можете расслабиться, попробовать вкуснейший кофе и домашнюю еды. Так же работает онлайн бронирование и бронирование по телефону, чтобы Вам не пришлось ожидать очереди.</p>
            </div>

            <form id="mform" method="post" action="../backend/Order.php">

            <div class="table">
                <div class="row">
                    <div class="namesell">Наименование услуг</div>
                    <div class="sell">Группа 1 <input class="typeA" name="A" type="checkbox" /></div>
                    <div class="sell">Группа 2 <input class="typeB" name="B" type="checkbox" /></div>
                    <div class="sell">Группа 3 <input class="typeC" name="C" type="checkbox" /></div>
                    <div class="sell">Группа 4 <input class="typeD" name="D" type="checkbox" /></div>
                    <div class="cbox"></div>
                </div>

                    <!--Sample -->
                <?php
                    echo $cw->getMainServiceTableContent();
                ?>

                <div class="row">
                    <div class="headline">Дополнительные услуги</div>
                </div>

                    <!--Sample -->
                <?php
                    echo $cw->getExtraServiceTableContent();
                ?>

                <div class="row">
                    <div class="headline">Химчистка</div>
                </div>

                    <!--Sample -->
                <?php
                    echo $cw->getCleanerServiceTableContent();
                ?>
            </div>

                <div class="formdata">
                    <p class="fstring">Ваше имя:
                        <input name="name" type="text" required />
                    </p>

                    <p class="fstring">Ваше телефон:
                        <input name="phone" type="text" required />
                    </p>

                    <p class="fstring">Дата:
                        <input name="data" type="text" required />
                    </p>
                    <input type="submit" value="Записаться" />
                </div>
            </form>

            <div class="infob">
                <p class="atten">Внимание: стоимость мойки автомобиля 31 декабря каждого года на 100р больше стандартной цены.</p>
                <p class="class">Классификация автомобилей по группам:</p>
                <p class="group">Группа 1. Автомобили малого класса:</p>
                <p class="cars">Ока; Таврия; Daewoo Tico, Matiz; Peugeuot 106; Smart ;Citroen C2; Kia Picanto  и т.д.</p>
                <p class="group">Группа 2. Автомобили среднего и бизнес класса :</p>
                <p class="cars">ВАЗ 2101-2121; Mercedes А,С,E; BMW 1,3,5; Audi АЗ-5, А6, Allroad; VW Golf, Jetta, Passat; Opel Vectra, Astra, Corsa, Omega; Nissan Primera, Almera; Peugeuot 206,306,307,406; Renault 19, Logan, Clio; Subaru Impreza; Scoda Octavia, Fabia; Toyota Corolla; Volvo S40, XC70; Mitsubishi barisma; Lancer; Daewoo Nexia; Suzuki Swift; Honda Civic, Jazz; Hyundai Getz, Elantra, Accent; Kia Shuma, Ceed, Rio; Ford Focus; Mazda 2,3; Mini Cooper; Saab 900, 9000; Rover 75; и т.п.</p>
                <p class="group">Группа 3. Автомобили представительского класса, внедорожники, кроссоверы:</p>
                <p class="cars">Chevrolet Niva, Нива, Renault Duster, Mercedes AMG, S, ML, G, Vito; BMW 7, Х1, Х3, X5, X6; Audi A8,Q5,Q7; VW Sharan; Mitsubishi Outlander; Dodge Intrepid, Caravan; УАЗ; Hummer H3; Suzuki Grand Vitara, Nissan Qashqai, Juke и т.п.</p>
                <p class="group">Группа 4. Внедорожники, минивэны, микроавтобусы, автомобили от 1,8 метров в высоту:</p>
                <p class="cars">Эвакуаторы, Спецтехника, Hummer H2, УАЗ Патриот, Соболь, ГАЗель, Hyundai Starex; Nissan Navara, Armada, Patrol; Audi Q7; Mercedes Viana, Sprinter; Mitsubishi L200; Mitsubishi Pajero; Toyota Sequoia; Ford Exursion, Transit; Infinity Qx; Cadillac Escalade; GMC Yukon; Chevrolet Suburban, Tahoe; Dodge Ram и т.п.</p>
            </div>
        </div>

        <div class="footer">
            <p>Все права защищены &copy</p>
        </div>
    </div>

     <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/gears.js" type="text/javascript"></script>
</body>
</html>