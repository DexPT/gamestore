<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($userInfo['username']) ?></h1>
    
    <h2>Informações da Conta</h2>
    <p>Email: <?= htmlspecialchars($userInfo['email']) ?></p>


    <h2>Minhas Encomendas</h2>
    <?php if (empty($userOrders)): ?>
        <p>Ainda não fizeste nenhuma encomenda.</p>
    <?php else: ?>
       <table>
    <thead>
        <tr>
            <th>Número da Encomenda</th>
            <th>Data da Encomenda</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($userOrders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order["order_number"]) ?></td>
                <td><?= htmlspecialchars($order["order_date"]) ?></td>
                <td><?= htmlspecialchars($order["total"]) ?>€</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <?php endif; ?>


    <h2>Informação Pessoal</h2>
    
    <form id="updateProfileForm">
    <div>
        <label for="name">Nome:</label>    
        <input type="text" name="name" value="<?= htmlspecialchars($userInfo['name']); ?>" required>
    
    </div>    
    <div>
        <label for="address">Morada:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($userInfo['address']); ?>" required>
    </div>
    <div>
        <label for="birth_date">Data de Nascimento:</label>
        <input type="date" name="birth_date" value="<?= htmlspecialchars($userInfo['birth_date']); ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($userInfo['email']); ?>" required>
    </div>
    <div>
        <label for="current_password">Senha Atual: </label>
        <input type="password" name="old_password" placeholder="Senha Antiga" required>
    </div>
    <div>
        <label for="new_password">Nova Senha:</label>
        <input type="password" name="new_password" placeholder="Nova Senha (deixa em branco se não quiseres mudar)">
    </div>
    <br>
    <button type="submit">Atualizar Perfil</button>
</form>

<div id="message"></div>

<div id="message"></div>


<div id="updateMessage"></div>


<div id="updateMessage"></div>

<br>    
<button><a href="/">Voltar ao início</a></button>
</body>
</html>
