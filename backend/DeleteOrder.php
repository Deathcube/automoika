<?php
    require_once "DB.php";

    $order_id = $_POST["order_id"];

    $db = new DB();
    $db = $db->dbConnect();

    $array = array(
        "order_id" => $order_id,
    );

    $sql = "DELETE FROM `order` WHERE `id` = :order_id";

    $stmt = $db->prepare($sql);
    $stmt->execute($array);

    header('Location: ../carwash/order.php');