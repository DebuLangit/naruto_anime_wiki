<?php
// Anime Characters View
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
    <title>Anime</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <h1>Anime</h1>
        <ul>
            <li><a href="characters.php">Back to Characters</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Anime Characters</h2>
        <!-- Anime characters here -->
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
