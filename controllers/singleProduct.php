<?php

require("models/singleProduct.php");

$model = new SingleProduct();

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $singleProduct = $model->getSingleProduct($_GET["id"]);
} else {
   
    $singleProduct = $model->getSingleProduct(); 
}


if (empty($singleProduct) || !isset($singleProduct[0])) {
    http_response_code(404);
    echo "Não encontrado";
    echo '<br>';
    echo '<button><a href="/">Voltar ao início</a></button>';
    exit; 
}


$title = $singleProduct[0]["name"];

require("views/singleProduct.php");

?>
