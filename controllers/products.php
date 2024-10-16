<?php

require("models/products.php");
require("models/platforms.php");    

$model = new Products();

$title = "Game store - Produtos";

$products = $model->getAllProducts();

if($_GET["id"]) {
    $products = $model->getProductId($_GET["id"]);  
} else {
    $products = $model->getAllProducts();
}

/* var_dump($products); */

require("views/products.php");

?>
