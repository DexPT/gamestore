<?php

require("models/products.php");

$model = new Products();

$title = "Produtos";

$products = $model->getAllProducts();

var_dump($products);

require("views/products.php");

?>
