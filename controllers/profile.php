<?php

$title = "Game store - Perfil";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["user_id"])) {
    header("Location: " . ROOT . "/login/");
    exit;
}

require("models/users.php");
require("models/orders.php");

$model = new User();
$modelOrders = new Orders();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION["user_id"];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'] ?? null;

  
    $updateSuccess = $model->updateUserProfile($userId, $name, $address, $birth_date, $email, $oldPassword, $newPassword);

    header('Content-Type: application/json');
    if ($updateSuccess) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Falha na autenticação da senha ou erro de atualização."]);
    }
    exit;
}


$userInfo = $model->getUserInfo($_SESSION["user_id"]);
$userOrders = $modelOrders->getAllOrdersByUserId($_SESSION["user_id"]);

require("views/profile.php");
