<?php

$title = "Game store - Checkout";

if (!isset($_SESSION["user_id"])) {
    header("Location: " . ROOT . "/login/");
    exit;
}

if (empty($_SESSION["cart"])) {
    header("Location: " . ROOT . "/");
    exit;
}


function generateOrderId($length = 12) {
    $prefix = 'ORD-';
    $bytes = random_bytes(ceil($length / 2));
    return $prefix . strtoupper(substr(bin2hex($bytes), 0, $length));
}

require("models/products.php");
require("models/orders.php");

$modelProducts = new Products();
$modelOrders = new Orders();


$order_id = generateOrderId();

$total = 0;


$user_id = $_SESSION["user_id"];
$order_date = date("Y-m-d H:i:s"); 
$payment_date = null;
$shipping_date = null; 

foreach ($_SESSION["cart"] as $item) {
    $modelProducts->updateStock($item);
    
    
    $orderData = [
        'user_id' => $user_id,
        'order_id' => $order_id,
        'order_date' => $order_date,
        'payment_date' => $payment_date,
        'shipping_date' => $shipping_date,
        'price' => $item["price"], 
        'quantity' => $item["quantity"] 
    ];
    
   
    $modelOrders->createOrder($orderData);

    $total += $item["price"] * $item["quantity"];
}

unset($_SESSION["cart"]);

require("views/checkout.php");
