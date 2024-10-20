<?php

require("models/users.php");

$model = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $requiredFields = ["username", "name", "address", "birth_date", "email", "password"];
    $isValid = true;

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $isValid = false;
            break;
        }
    }

    if ($isValid) {

        $username = trim($_POST["username"]);
        $name = trim($_POST["name"]);
        $address = trim($_POST["address"]);
        $birth_date = trim($_POST["birth_date"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

       $model->insertUser($username, $name, $address, $birth_date, $email, $hashedPassword);  

        header("Location: " . ROOT . "/login");
        exit();
    } else {
        echo "Todos os campos são obrigatórios";
    }
    
}

require("views/register.php");


?>