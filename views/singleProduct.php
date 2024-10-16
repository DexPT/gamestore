<!DOCTYPE html>
<html lang="en">
<?php require("templates/head.php"); ?>
<body>
    <div>
        <h1><?php echo $singleProduct[0]["name"]; ?></h1>

        <img src="<?php echo htmlspecialchars(ROOT) . "/images/" . htmlspecialchars($singleProduct[0]["image"]); ?>" alt="<?php echo htmlspecialchars($singleProduct[0]["name"]); ?>">
        <p><?php echo $singleProduct[0]["description"]; ?></p>
        <p><?php echo $singleProduct[0]["price"]; ?> €</p>
       <!--  <div>Stock: <?php echo $singleProduct[0]["stock"]; ?></div> -->    
        <button> <a href="/products/?id=<?php echo $singleProduct[0]["platform_id"]; ?>">Voltar</a>
        <button><a href="/cart">Adicionar ao carrinho</a></button>

    </div>
</body>
</html>