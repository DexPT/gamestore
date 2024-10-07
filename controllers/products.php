<?php

require("models/products.php");

$model = new Products();

$products = $model -> getProducts();

print_r($products);

require("views/products.php")

?>