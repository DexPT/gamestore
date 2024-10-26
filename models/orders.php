<?php

require_once("base.php");

class Orders extends Base
{
    public function getAllOrders()
    {
        return $this->getAll("orders", "order_id, user_id, order_date, payment_date, shipping_date");
    }

    public function createOrder($item)
    {
    $total = $item["price"] * $item["quantity"];

    $orderNumber = 'ORD' . strtoupper(substr(uniqid(), -8));

    $query = $this->db->prepare("INSERT INTO orders (user_id, order_date, payment_date, shipping_date, total, order_number) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([
        $item["user_id"],
        $item["order_date"],
        $item["payment_date"] ?? '0000-00-00 00:00:00',
        $item["shipping_date"] ?? '0000-00-00 00:00:00',
        $total,
        $orderNumber
    ]);

    return $orderNumber; 
    }


    public function getDetails($order_id)
    {
        $query = $this->db->prepare("SELECT * FROM orders WHERE order_id = ?");
        $query->execute([$order_id]);
        return $query->fetch();
    }
    public function getOrdersByUserId($user_id) 
    {
        $query = $this->db->prepare("SELECT * FROM orders WHERE user_id = ?");
        $query->execute([$user_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOrdersByUserId($user_id) {
    $query = $this->db->prepare("
        SELECT order_id, order_date, total, order_number
        FROM orders
        WHERE user_id = ?
    ");
    $query->execute([$user_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
    

}