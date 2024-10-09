<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamestore in the nighty</title>
    <style>
        .platform-container {
            display: flex;
            flex-wrap: wrap; 
            gap: 30px;
            justify-content: center;
        }

        .platform {
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
            max-width: 100px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: #eee;
            justify-content: center;
            height: 150px;
        }

        img {
            max-width: 100%;
            height: auto; 
            margin: 10px 0; 
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <main>
        <h1>Gamestore</h1>
        <p>v0.0.01</p>

        <div class="platform-container">
        <?php
        foreach ($platforms as $platform) {
            echo '
                <div class="platform">
                    <a href="' . htmlspecialchars(ROOT) . '/products/' . htmlspecialchars($platform["platform_id"]) . '">
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
