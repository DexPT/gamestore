<?php

require_once("base.php");

class Products extends Base
{
    public function getProductsFromPlatform($platform_id) {
        $query = $this->db->prepare("
            SELECT 
                product_id, name, image, price, stock, platform_id
            FROM 
                products
            WHERE 
                platform_id = ?
        ");

        $query->execute([$platform_id]);
        return $query->fetchAll();
    }

    public function getAllProducts(){
       
        return $this->getAll("products", "product_id, name, price, image, description, stock, platform_id");
    }


    public function getProductId($productId){

        return $this->getId("products", "product_id, name, price, image, description, stock, platform_id",
         "platform_id", $productId);
        
    } 
  
    public function getProductByID($productId){
        return $this->getId("products", "product_id, name, price, image, description, stock, platform_id", "product_id", $productId);
    }

    public function checkStock($item) {
        
        $query = $this->db->prepare("
            SELECT product_id, name, price, stock
            FROM products
            WHERE product_id = ?
            AND stock >= ?
        ");

        $query->execute([
            $item["product_id"],
            $item["quantity"]
        ]);

        return $query->fetch();
    }

    public function updateStock($item) {
        $query = $this->db->prepare("
            UPDATE products
            SET stock = stock - ?
            WHERE product_id = ?
        ");

        return $query->execute([
            $item["quantity"],
            $item["product_id"]
        ]);
    }
}

?>