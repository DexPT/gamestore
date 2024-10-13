<?php

require("models/products.php");

$model = new Products();

$title = "Os nossos produtos";

$products = $model->getAllProducts();

if($_GET["id"]) {
    $products = $model->getProductId($_GET["id"]);  
} else {
    $products = $model->getAllProducts();
}

/* var_dump($products); */

require("views/products.php");

?>
