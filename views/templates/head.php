<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
        ul{
            display:flex; 
            list-style-type: none; 
            justify-content:center;
            gap: 32px;
        }
        li {
            list-style: none;
        }
    </style>
</head>