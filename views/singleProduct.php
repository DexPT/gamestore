<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <div>
        <h1><?php echo $singleProduct[0]["name"]; ?></h1>

        <img src="<?php echo htmlspecialchars(ROOT) . "/images/" . htmlspecialchars($singleProduct[0]["image"]); ?>" alt="<?php echo htmlspecialchars($singleProduct[0]["name"]); ?>">
        <p><?php echo $singleProduct[0]["description"]; ?></p>
        <p><?php echo $singleProduct[0]["price"]; ?> €</p>
        <form method="POST" action="<?= ROOT ?>/cart/">
            <div>
                <label>
                    Quantidade
                        <input 
                            type="number" 
                            name="quantity" 
                            required 
                            min="1" 
                            max="<?= $singleProduct[0]["stock"] ?>" 
                            value="1">
                    <input type="hidden" name="product_id" value="<?= $singleProduct[0]["product_id"] ?>">
                    <button type="submit" name="send">Comprar</button>

            </div>
        </form>

    </div>
</body>
</html>