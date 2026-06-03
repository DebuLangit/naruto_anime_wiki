<?php

class AuthController {
    private $authModel;

    public function __construct($authModel) {
        $this->authModel = $authModel;
    }

    // Handle login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->authModel->verifyLogin($username, $password)) {
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: dashboard.php');
                exit();
            } else {
                $error = 'Username atau password salah';
            }
        }
    }

    // Handle logout
    public function logout() {
        session_start();
        session_destroy();
        header('Location: login.php');
        exit();
    }

    // Check if user is logged in
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}
?>
