<?php
// Dashboard View
// This file displays the main dashboard
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="merchandise.php">Merchandise</a></li>
            <li><a href="characters.php">Characters</a></li>
            <li><a href="../auth/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <!-- Dashboard content here -->
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
