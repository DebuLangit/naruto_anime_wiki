<?php
// Merchandise Detail View
// This file displays merchandise details
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Detail</title>
    <link rel="stylesheet" href="../css/merchandise.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <h1>Merchandise Detail</h1>
        <ul>
            <li><a href="merchandise.php">Back to Merchandise</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Merchandise Detail</h2>
        <!-- Merchandise detail here -->
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
