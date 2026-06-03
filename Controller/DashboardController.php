<?php

class DashboardController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    // Display dashboard
    public function index() {
        // Get user data
        $users = $this->userModel->getAllUsers();
        
        // Pass data to view
        include '../View/user/dashboard.php';
    }
}
?>
