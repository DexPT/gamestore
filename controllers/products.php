<?php

require("models/products.php");

$model = new Products();

$products = $model -> getProducts($id);

require("views/products.php")

?>