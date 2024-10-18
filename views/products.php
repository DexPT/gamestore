<!DOCTYPE html>
<html lang="en">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <h1 style="text-align: center;"><?php echo $title; ?></h1>
    <ul>

        <?php
        foreach ($products as $product) {
            echo '
                <li>
                    <a href="/singleProduct/?id=' . htmlspecialchars($product["product_id"]) . '">

                        <img src="' . htmlspecialchars(ROOT) . '/images/' . htmlspecialchars($product["image"]) . '" alt="' . htmlspecialchars($product["name"]) . '">
                        <p>' . htmlspecialchars($product["name"]) . '</p>
                        <p>' . htmlspecialchars($product["price"]) . ' €</p>
                        
                    </a>
                    <button><a href="/cart">Adicionar ao carrinho</a></button>
                    
                </li>
            ';
        }
        ?>

    </ul>

    <button><a href="/">Voltar ao inicio</a></button>
</body>
</html>