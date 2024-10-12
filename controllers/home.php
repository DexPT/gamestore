    <?php

    require("models/platforms.php");

    $model = new Platforms();

    $platforms = $model -> getPlatforms();

    require("views/home.php");

    ?>