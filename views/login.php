<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<?php require("templates/menu.php"); ?> 
<body>
    <?php
    if( isset($message)){
        echo '<p>' .$message. '</p>';
    }
?>
    <h1>Login</h1>
    <p>Se tiver uma conta, <a href="<?= ROOT ?>/register/">clique aqui</a></p>

    <form action="<?= ROOT ?>/login" method="POST">
        <div>
            <label for="email">Email
                <input type="email" name="email" required>
            </label>
        </div>
        <div>
            <label for="password">Password
                <input type="password" name="password" required minlength="6" maxlength="255">
            </label>
        </div>
        <div>
            <button type="submit" name="send">Login</button>
        </div>
    </form>
</body>
</html> 