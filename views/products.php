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
            <h1>'.$product["name"].'</h1>
            <p>'.$product["description"].'</p>
            <p>'.$product["price"].'</p>

        ';
    }

    ?>
    
</body>
</html>