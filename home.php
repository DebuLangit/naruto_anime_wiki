<?php require_once 'config/auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naruto Shippuden</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>

    <div class="logo">
        <img src="img/naruto1_logo.jpg" alt="Naruto Logo">
    </div>

    <nav>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="merchandise.php">MERCH</a></li>
            <li><a href="auth/login.php">LOGIN</a></li>
        </ul>
    </nav>

</header>

<section class="banner">
    <h1>ANIME</h1>
</section>

<section class="anime-tabs">

    <a href="naruto/index.php" class="tab">
        Naruto
    </a>

    <a href="shippuden/index.php" class="tab active">
        Naruto Shippuden
    </a>

    <a href="boruto/index.php" class="tab">
        Boruto
    </a>

</section>

</body>
</html>