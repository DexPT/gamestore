<!DOCTYPE html>
<html lang="pt">
    <?php require("templates/head.php"); ?>
    <?php require("templates/menu.php"); ?> 
    <body>
        <main>
            <h1>Carrinho</h1>
<?php
    if ( empty($_SESSION["cart"])){
        echo '<p>Carrinho vazio, precisa de adicionar algum artigo</p>';
    }
    else{
?>
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th>Remover</th>
                </tr>
<?php
    $total = 0;
    foreach($_SESSION["cart"] as $item){

        $subtotal = $item["price"] * $item["quantity"];
        $total += $subtotal;

        echo '
            <tr data-product_id="' .$item["product_id"]. '">
                <td>' .$item["name"]. '</td>
                <td>
                    <input 
                    type="number" 
                    name="changeQuantity" 
                    value="' .$item["quantity"]. '" 
                    min="1" 
                    max="' .$item["stock"]. '"
                    aria-label="Alterar Quantidade"
                    >
                </td>
                <td>' .$item["price"]. '€</td>
                <td>' .$subtotal. '€</td>
                <td>
                    <button type="button" name="remove" aria-label="Remover Produto">X</button> 
                </td>
                </tr>
        ';
    }
        ?>

                        <tr>
                            <td colspan="3">Total</td>
                            <td colspan="2"><?= $total ?>€</td>
                        </tr>
                    </table>
        <?php
            }
        ?>
        <h3>Morada de Entrega</h3>
        <p><?php echo htmlspecialchars($userAddress); ?></p>

            <nav>
                <a href="<?= ROOT ?>/">Escolher mais produtos</a>
                <a href="<?= ROOT ?>/checkout/">Finalizar a encomenda</a>
            </nav>
       
        </main>
    </body>
</html>