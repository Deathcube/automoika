<?php
    require_once "DB.php";

    $order_id = $_POST["order_id"];

    $username = $_POST["userName"];
    $date = $_POST["userDate"];
    $phone = $_POST["userPhone"];

    $db = new DB();
    $db = $db->dbConnect();

    $array = array(
        "order_id" => $order_id,
        "username" => $username,
        "date" => $date,
        "phone" => $phone,
    );

    $sql = "UPDATE `order` SET `username` = :username, `date` = :date, `phone` = :phone WHERE `id` = :order_id";

    $stmt = $db->prepare($sql);
    $stmt->execute($array);

    header('Location: ../carwash/order.php');