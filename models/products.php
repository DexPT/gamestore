<?php

require_once("base.php");


class Products extends Base{

    public function getProducts (){
        $query = $this->db->prepare("
            SELECT product_id,
                   name, 
                   description, 
                   price,
                   image
            FROM products
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getProductById($id){

        $query = $this->db->prepare("
            SELECT product_id,
                   name, 
                   description, 
                   price,
                   image
            FROM products
            WHERE product_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();

    }

}

?>