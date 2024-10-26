<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <main>
        <h1>Minhas Encomendas</h1>

        <?php if (empty($orders)): ?>
            <p>Você não tem nenhuma encomenda.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Número da Encomenda</th>
                        <th>Data da Encomenda</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                            <td><?= htmlspecialchars($order['order_date']) ?></td>
                            <td><?= htmlspecialchars($order['total']) ?>€</td>
                            <td><?= htmlspecialchars($order['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <button><a href="<?= ROOT ?>">Voltar ao início</a></button>
    </main>
</body>
</html>
