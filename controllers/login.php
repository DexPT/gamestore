<?php

    if( isset($_POST["send"])){

       
    


        if(
            !empty($_POST["email"]) &&
            !empty($_POST["password"]) &&
            filter_var(trim($_POST["email"], FILTER_VALIDATE_EMAIL)) &&
            mb_strlen(trim($_POST["password"])) >= 6 &&
            mb_strlen(trim($_POST["password"])) <= 255

        ){
            require("models/users.php");

            $model = new User();

            $user = $model->getByEmail( $_POST["email"] );

        if (!empty($user) && password_verify($_POST["password"], $user["password"])) {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];
            header("Location: " . ROOT . "/");
            exit();
                } else {
                    $message = "Email ou password incorretos";
                }
        } else {
            $message = "Preencha os campos corretamente";
        }
}
    



require("views/login.php");

