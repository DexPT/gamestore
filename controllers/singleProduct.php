<?php

require("models/singleProduct.php");

$model = new SingleProduct();


$singleProduct = $model->getSingleProduct();

$title =  $singleProduct[0]["name"];

if ($_GET["id"]) {
    $singleProduct = $model->getSingleProduct($_GET["id"]);
} else {
    $singleProduct = $model->getSingleProduct();
}
/* 
var_dump($singleProduct); */

require("views/singleProduct.php");


?>