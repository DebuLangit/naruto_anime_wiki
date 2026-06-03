<?php
// Characters View
// This file displays all characters
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
    <title>Characters</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <h1>Characters</h1>
        <ul>
            <li><a href="naruto.php">Naruto</a></li>
            <li><a href="shippuden.php">Shippuden</a></li>
            <li><a href="boruto.php">Boruto</a></li>
            <li><a href="anime.php">Anime</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>All Characters</h2>
        <!-- Characters list here -->
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
