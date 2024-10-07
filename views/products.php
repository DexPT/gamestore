<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "Gamestore"; ?>
    </title>
</head>
<body>



    <?php 
    foreach($products as $product){
        echo '
        
            <img src=" /images/'.$product["image"].'" alt="'.$product["name"].'">
            <h2>'.$product["name"].'</h2>
            <p>'.$product["description"].'</p>
            <p>Preço: <span>'.$product["price"].'€</span></p>
        ';
    }

    ?>
    
</body>
</html>