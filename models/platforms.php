<?php

require_once("base.php");

class Platforms extends Base {

    public function getPlatforms() {

        $query = $this->db->prepare("
            SELECT platform_id, name, image
            FROM platform
        ");

        $query->execute();

        return $query->fetchAll();
    }
}
