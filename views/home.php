<!DOCTYPE html>
<html lang="pt">
<?php require("templates/head.php"); ?>
<body>
    <main>
        <h1>Gamestore</h1>
        <p>v0.0.01</p>

        <div class="platform-container">
        <?php
        foreach ($platforms as $platform) {
            echo '
                <div class="platform">
                    <a href="' . htmlspecialchars(ROOT) . '/products/?id=' . htmlspecialchars($platform["platform_id"]) . '">
                        <img src="' . htmlspecialchars(ROOT) . '/images/' . htmlspecialchars($platform["image"]) . '" alt="' . htmlspecialchars($platform["name"]) . '">
                        <p>' . htmlspecialchars($platform["name"]) . '</p>
                    </a>
                </div>
            ';
        }
        ?>
        </div>
    </main>
</body>
</html>
