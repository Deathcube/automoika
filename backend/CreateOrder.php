<?php
    require_once "DB.php";

    $main_service = null;

    $extra_services = null;
    $cleaner_services = null;
    $car = 'A';
    foreach ($_POST as $item => $value){
        if(strstr($item, 'extra_service')){
            $id = substr($item, 13, strlen($item));
            $extra_services .= $id.";";
        }

        if(strstr($item, 'main_service')){
            $id = substr($item, 12, strlen($item));
            $main_service = $id;
        }

        if(strstr($item, 'cleaner_service')){
            $id = substr($item, 15, strlen($item));
            $cleaner_services .= $id.";";
        }
        if($item == 'A'||$item == 'B'||$item == 'C'||$item == 'D'){
            $car = $item;
        }

    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];


    $db = new DB();
    $db = $db->dbConnect();

    $array = array(
        "main_service" => $main_service,
        "cleaner" => $cleaner_services,
        "extra_services" => $extra_services,
        "username" => $name,
        "phone" => $phone,
        "date" => $date,
        "car" => $car

    );

    $sql = "INSERT INTO `automoika`.`order`(`main_service`,`cleaner`,`extra_services`,`username`,`phone`,`date`,`car`) 
                  VALUES(:main_services, :cleaner, :extra_services, :username, :phone, :date, :car)";

    $stmt = $db->prepare($sql);
    $stmt->execute($array);
