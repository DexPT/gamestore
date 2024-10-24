<!DOCTYPE html>
<html lang="pt">
    <?php require("templates/head.php"); ?>
    <?php require("templates/menu.php"); ?> 
    <body>
        <main>
            <h1>Compra Efetuada com Sucesso</h1>

            <table>
                <caption>Resumo da Encomenda</caption>
                <tr>
                    <th>Número Encomenda</th>
                    <td><?= $order_id ?></td>
                </tr>
                <tr>
                    <th>Referência Pagamento</th>
                    <td>2254615168</td>
                </tr>
                <tr>
                    <th>Total a Pagar</th>
                    <td><?= $total ?>€</td>
                </tr>
            </table>

            <button><a href="<?= ROOT ?>">Voltar ao inicio</a></button>
        </main>

    </body>
</html>