<?php
    session_start();
    require_once "DB.php";

    $id_coffee = $_POST["id"];
    $id_client = $_SESSION["id_user"];

    $time = date("Y-m-d");

    foreach ($_POST['main_service_check_box']){
        
    }

    $db = new DB();
    $db = $db->connectDB();
    $db->exec("set names utf8");

    $array = array(
        "id_coffee" => $id_coffee,
        "id_client" => $id_clientw,
        "time" => $time
    );

    $sql = "INSERT INTO `buying`(`id_client`,`id_coffee`,`time`) VALUES(:id_client, :id_coffee, :time)";
    $stmt = $db->prepare($sql);
    $stmt->execute($array);