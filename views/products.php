<!DOCTYPE html>
<html lang="en">
<?php require("templates/head.php"); ?>
<body>
    <h1>Products</h1>
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
                </li>
            ';
        }
        ?>

    </ul>
</body>
</html>