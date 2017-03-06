<?php
    require_once "DB.php";

    $id_order = $_POST["id_order"];

    $db = new DB();
    $db = $db->dbConnect();

    $array = array(
        "id_order" => $id_order,
    );

    $sql = "DELETE FROM `order` WHERE `id` = :id_order)";

    $stmt = $db->prepare($sql);
    $stmt->execute($array);