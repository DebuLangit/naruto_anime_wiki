<?php

class MerchandiseModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Get all merchandise
    public function getAllMerchandise() {
        // TODO: Implement database query
    }

    // Get merchandise by ID
    public function getMerchandiseById($id) {
        // TODO: Implement database query
    }

    // Get merchandise by category/character
    public function getMerchandiseByCharacter($character) {
        // TODO: Implement database query
    }

    // Create new merchandise
    public function createMerchandise($data) {
        // TODO: Implement database query
    }

    // Update merchandise
    public function updateMerchandise($id, $data) {
        // TODO: Implement database query
    }

    // Delete merchandise
    public function deleteMerchandise($id) {
        // TODO: Implement database query
    }
}
?>
