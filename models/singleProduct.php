<?php

require_once("base.php");

class SingleProduct extends Base {
    

    
    public function getSingleProduct() {

        $query = $this->db->prepare("
            SELECT 
                product_id, name, price, image, description, stock, platform_id
            FROM 
                products
            WHERE 
                product_id = ?
        ");

        $query->execute([$_GET["id"]]);
        return $query->fetchAll();
    }
}   

?>