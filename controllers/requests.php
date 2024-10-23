<?php
header("Content-Type: application/json");

if (isset($_POST["request"])) {

    
    if (
        $_POST["request"] === "removeProduct" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"])
    ) {
        unset($_SESSION["cart"][intval($_POST["product_id"])]);

       
        echo json_encode(["message" => "OK"]);
    }

    
    elseif (
        $_POST["request"] === "changeQuantity" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"]) &&
        !empty($_POST["quantity"]) &&
        is_numeric($_POST["quantity"]) &&
        intval($_POST["quantity"]) > 0 &&
        !empty($_SESSION["cart"])
    ) {
       
        require("models/products.php");
        $model = new Products();
        
        
        $product = $model->checkStock($_POST);

        
        if (!empty($product)) {
           
            $_SESSION["cart"][$product["product_id"]]["quantity"] = intval($_POST["quantity"]);

            
            $_SESSION["cart"][$product["product_id"]]["name"] = $product["name"];
            $_SESSION["cart"][$product["product_id"]]["price"] = $product["price"];

            
            echo json_encode(["message" => "OK"]);
        } else {
           
            echo json_encode(["message" => "Stock insuficiente ou produto não encontrado."]);
        }
    }

   
    else {
        echo json_encode(["message" => "Dados inválidos."]);
    }
} else {
    echo json_encode(["message" => "Requisição inválida."]);
}
