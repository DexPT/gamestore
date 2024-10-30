<?php

$title = "Game store - Carrinho ";

require("models/users.php");
require("models/products.php");


if (!isset($_SESSION["user_id"])) {
    
    header("Location: " . ROOT . "/login/");
    exit();
}


$userModel = new User();
$userAddress = $userModel->getUserAddressById($_SESSION["user_id"]);

if (isset($_POST["send"])) {
    $model = new Products();

    if (isset($_POST["product_id"]) && is_numeric($_POST["product_id"])) {
        $productId = intval($_POST["product_id"]);

        echo "Product ID enviado: " . $productId;

        $singleProduct = $model->getProductByID($productId);
        $singleProduct = $singleProduct[0] ?? null;

        if ($singleProduct) {
            echo "Produto encontrado: ";
            print_r($singleProduct);

            if (
                !empty($singleProduct) && 
                isset($_POST["quantity"]) && 
                intval($_POST["quantity"]) > 0 && 
                $singleProduct["stock"] >= intval($_POST["quantity"])
            ) {
                
                if (isset($_SESSION["cart"][$singleProduct["product_id"]])) {
                    $_SESSION["cart"][$singleProduct["product_id"]]["quantity"] += intval($_POST["quantity"]);
                } else {
                    $_SESSION["cart"][$singleProduct["product_id"]] = [
                        "product_id" => $singleProduct["product_id"],
                        "quantity" => intval($_POST["quantity"]),
                        "name" => $singleProduct["name"],
                        "price" => $singleProduct["price"],
                        "stock" => $singleProduct["stock"]
                    ];
                }

                
                header("Location: " . ROOT . "/cart/");
                exit();
            } else {
                echo "Produto inválido ou quantidade insuficiente em stock.";
            }
        } else {
            echo "Produto não encontrado com o ID: " . $productId;
        }
    } else {
        echo "Produto inválido.";
    }
}

require("views/cart.php");
