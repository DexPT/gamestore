<?php

class Base
{
    public $db;

    public function __construct()
    {

        $this->db = new PDO(
            "mysql:host=" . ENV["DB_HOST"] . ";dbname=" . ENV["DB_NAME"] . ";charset=utf8mb4",
            ENV["DB_USER"],
            ENV["DB_PASSWORD"],
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]
        );
    }

    public function isValidKey($api_key)
    {

        $query = $this->db->prepare("
            SELECT
                user_id
            FROM
                users
            WHERE api_key = ? 
        ");

        $query->execute([
            $api_key
        ]);

        $user = $query->fetch();

        return !empty($user);
    }

    public function getAll($tabela, $colunas)
    {


        $query = $this->db->prepare('
            SELECT 
                ' . $colunas . '
            FROM 
                ' . $tabela . '
        ');

        $query->execute();
        return $query->fetchAll();

    }

    public function getId($tabela, $colunas, $campoId, $valor = "%")
    {

        $query = $this->db->prepare('
            SELECT 
                ' . $colunas . '
            FROM 
                ' . $tabela . '
            WHERE 
                '. $campoId .' = ' . $valor . ' 
        ');


    

        $query->execute();
        return $query->fetchAll();

    }

  
}

?>