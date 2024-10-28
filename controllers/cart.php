<?php

$title = "Game store - Carrinho ";

require("models/users.php");
$userModel = new User();
$userAddress = $userModel->getUserAddressById($_SESSION["user_id"]);


if (isset($_POST["send"])) {
    require("models/products.php");  

    $model = new Products();

    if (isset($_POST["product_id"]) && is_numeric($_POST["product_id"])) {
        $productId = intval($_POST["product_id"]);

        echo "Product ID enviado: " . $productId;

        $singleproduct = $model->getProductByID($productId);
        $singleproduct = $singleproduct[0];

        if ($singleproduct) {
            echo "Produto encontrado: ";
            print_r($singleproduct);

            if (
                !empty($singleproduct) && 
                isset($_POST["quantity"]) && 
                intval($_POST["quantity"]) > 0 && 
                $singleproduct["stock"] >= intval($_POST["quantity"])
            ) {
                
                if (isset($_SESSION["cart"][$singleproduct["product_id"]])) {
                   
                    $_SESSION["cart"][$singleproduct["product_id"]]["quantity"] += intval($_POST["quantity"]);
                } else {
                    
                    $_SESSION["cart"][$singleproduct["product_id"]] = [ 
                        "product_id" => $singleproduct["product_id"],
                        "quantity" => intval($_POST["quantity"]),
                        "name" => $singleproduct["name"],
                        "price" => $singleproduct["price"],
                        "stock" => $singleproduct["stock"]
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
