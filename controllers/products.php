<?php

require("models/products.php");

$model = new Products();

$products = $model -> getProducts();

require("views/products.php")

?>