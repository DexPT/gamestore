
<nav>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="<?= ROOT ?>/cart">Carrinho</a></li>

    <?php
        if( isset($_SESSION["user_id"]) ){           
    ?>
        <li>Bem-vindo <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></li>
        <li><a href="<?= ROOT ?>/profile/">Minha Conta</a></li>
        <li><a href="<?= ROOT ?>/logout/">Terminar sessão</a></li>
    <?php
            } else {
    ?>
        <li><a href="<?= ROOT ?>/login/">Login</a></li>
        <li><a href="<?= ROOT ?>/register/">Criar conta</a></li>
    <?php
            }
    ?>

</ul>
</nav>