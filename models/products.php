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




}

?>