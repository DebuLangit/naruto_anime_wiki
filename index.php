<?php
/**
 * Main Router
 * Entry point untuk semua request
 */

// Load Models
require_once 'Model/UserModel.php';
require_once 'Model/AuthModel.php';
require_once 'Model/MerchandiseModel.php';

// Load Controllers
require_once 'Controller/AuthController.php';
require_once 'Controller/DashboardController.php';
require_once 'Controller/MerchandiseController.php';
require_once 'Controller/CharacterController.php';

// Start session
session_start();

// Get request
$request = $_GET['page'] ?? 'login';

// Route request ke controller yang sesuai
switch ($request) {
    case 'login':
        // Redirect to login page
        if (!isset($_SESSION['user_id'])) {
            include 'View/auth/login.php';
        } else {
            header('Location: ?page=dashboard');
        }
        break;

    case 'logout':
        // Logout
        $authModel = new AuthModel(null);
        $authController = new AuthController($authModel);
        $authController->logout();
        break;

    case 'dashboard':
        // Dashboard
        if (isset($_SESSION['user_id'])) {
            $userModel = new UserModel(null);
            $dashboardController = new DashboardController($userModel);
            $dashboardController->index();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'merchandise':
        // Merchandise list
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $merchandiseController = new MerchandiseController($merchandiseModel);
            $merchandiseController->index();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'merchandise_detail':
        // Merchandise detail
        if (isset($_SESSION['user_id'])) {
            $id = $_GET['id'] ?? null;
            $merchandiseModel = new MerchandiseModel(null);
            $merchandiseController = new MerchandiseController($merchandiseModel);
            $merchandiseController->detail($id);
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'characters':
        // Characters list
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $characterController = new CharacterController($merchandiseModel);
            $characterController->index();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'naruto':
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $characterController = new CharacterController($merchandiseModel);
            $characterController->naruto();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'shippuden':
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $characterController = new CharacterController($merchandiseModel);
            $characterController->shippuden();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'boruto':
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $characterController = new CharacterController($merchandiseModel);
            $characterController->boruto();
        } else {
            header('Location: ?page=login');
        }
        break;

    case 'anime':
        if (isset($_SESSION['user_id'])) {
            $merchandiseModel = new MerchandiseModel(null);
            $characterController = new CharacterController($merchandiseModel);
            $characterController->anime();
        } else {
            header('Location: ?page=login');
        }
        break;

    default:
        header('Location: ?page=login');
        break;
}
?>
