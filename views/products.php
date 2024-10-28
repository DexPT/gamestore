<!DOCTYPE html>
<html lang="pt">
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

                        <img src="' . htmlspecialchars(ROOT) . '/images/' . htmlspecialchars($product["image"]) . '" alt="' . htmlspecialchars($product["name"]) . '" style="width: 300px;">
                        <p>' . htmlspecialchars($product["name"]) . '</p>
                        <p>' . htmlspecialchars($product["price"]) . ' €</p>
                        
                    </a>
                </li>
            ';
        }
        ?>

    </ul>
    <div style="text-align: center;">
        <button style="margin: 0 0"><a href="/">Voltar ao inicio</a></button>
    </div>
</body>
</html>