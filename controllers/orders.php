<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: " . ROOT . "/login/");
    exit;
}

require("models/orders.php");
$modelOrders = new Orders();

$user_id = $_SESSION["user_id"];
$orders = $modelOrders->getOrdersByUserId($user_id);

require("views/orders.php");
