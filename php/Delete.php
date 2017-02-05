<?php
    require_once "connect.php";

    $id_order = $_POST["id_order"];

    $db = new DB();
    $db = $db->connectDB();
    $db->exec("set names utf8");

    $sql = "DELETE FROM `buying` WHERE `id_order` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id_order));
