    <?php

    require("models/platforms.php");

    $model = new Platforms();

    $title = "Game store - A melhor cena da atualidade";

    $platforms = $model->getPlatforms();

    /* var_dump($platforms); */

    require("views/home.php");

    ?>