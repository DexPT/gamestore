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

    public function getPlatform($platform_id) {
        $query = $this->db->prepare("
            SELECT platform_id, name, image
            FROM platforms
        ");

        $query->execute([$platform_id]);
        return $query->fetch();
    }
}
