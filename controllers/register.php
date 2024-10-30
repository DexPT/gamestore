<?php

$title = "Game store - Registar";

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
        
        
        if ($model->usernameExists($username)) {
            echo "O nome de utilizador já existe. Por favor, escolha outro.";
        } 
        
        else if ($model->emailExists($email)) {
            echo "O email já está em uso. Por favor, utilize outro.";
        } 
        else {
            $model->insertUser($username, $name, $address, $birth_date, $email, $password);  

            header("Location: " . ROOT . "/login");
            exit();
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}

require("views/register.php");

?>
