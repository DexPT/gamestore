<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <h1>Criar conta</h1>
    <p>Se tiver uma conta, <a href="<?= ROOT ?>/login/">clique aqui</a></p>

    <form action="<?= ROOT ?>/register" method="POST">
        <div>
            <label>
                Username
                <input type="text" name="username" minlength="3" maxlength="20" required>
            </label>
        </div>
        <div>
            <label>
                Nome
                <input type="text" name="name" minlength="3" maxlength="60" required>
            </label>
        </div>
        <div>
            <label>
                Morada
                <input type="text" name="address" minlength="3" maxlength="60" required>
            </label>
        </div>
        <div>
            <label>
                Data de nascimento
                <input type="date" name="birth_date" required>
            </label>
        </div>
        <div>
            <label>
                Email
                <input type="email" name="email" minlength="3" maxlength="60" required>
            </label>
        </div>
        <div>
            <label>
                Password
                <input type="password" name="password" minlength="3" maxlength="60" required>
            </label>
        </div>
        <div>
            <button type="submit">Criar conta</button>
        </div>
    </form>
</body>
</html>