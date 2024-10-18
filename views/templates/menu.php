<nav>
<ul>
    <li><a href="<?php echo ROOT; ?>">Home</a></li>
    <li><a href="<?php echo ROOT; ?>/cart">Carrinho</a></li>

    <?php
        if( isset($_SESSION["user_id"]) ){           
    ?>
        <li><a href="<?= ROOT ?>/logout/">Terminar sessão</a></li>
    <?php
            }
            else{
    ?>
        <li><a href="<?= ROOT ?>/login/">Login</a></li>
        <li><a href="<?= ROOT ?>/register/">Criar conta</a></li>
    <?php
            }
    ?>

</ul>
</nav>