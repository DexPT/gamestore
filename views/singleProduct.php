<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <div>
        <h1><?php echo $singleProduct[0]["name"]; ?></h1>

        <img src="<?php echo htmlspecialchars(ROOT) . "/images/" . htmlspecialchars($singleProduct[0]["image"]); ?>" alt="<?php echo htmlspecialchars($singleProduct[0]["name"]); ?>">
        <h2>Descrição</h2>
        <p><?php echo $singleProduct[0]["description"]; ?></p>
        <h2>Preço</h2>
        <p><?php echo $singleProduct[0]["price"]; ?> €</p>

        <?php if ($singleProduct[0]["stock"] > 0): ?>
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
                    </label>
                    <input type="hidden" name="product_id" value="<?= $singleProduct[0]["product_id"] ?>">
                    <button type="submit" name="send">Comprar</button>
                </div>
            </form>
        <?php else: ?>
            <p style="color: red; font-weight: bold;">Esgotado</p>
            <button type="button" disabled style="cursor: not-allowed;">Indisponível</button>
        <?php endif; ?>
        
    </div>
    <br>
    <button><a href="/">Voltar ao inicio</a></button>
</body>
</html>