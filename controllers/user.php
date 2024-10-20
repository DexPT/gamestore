<?php

require("models/users.php");

$model = new User();

$users = $model->getUser();

var_dump($users);

require("views/user.php");


?>
