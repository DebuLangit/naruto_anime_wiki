<?php

class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Get all users
    public function getAllUsers() {
        // TODO: Implement database query
    }

    // Get user by ID
    public function getUserById($id) {
        // TODO: Implement database query
    }

    // Create new user
    public function createUser($data) {
        // TODO: Implement database query
    }

    // Update user
    public function updateUser($id, $data) {
        // TODO: Implement database query
    }

    // Delete user
    public function deleteUser($id) {
        // TODO: Implement database query
    }
}
?>
