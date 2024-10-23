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
if (empty($products)) {
    http_response_code(404);
    echo "Não encontrado";
    echo '<br>';
    echo '<button><a href="/">Voltar ao início</a></button>';
    exit; 
}

/* var_dump($products); */

require("views/products.php");

?>
