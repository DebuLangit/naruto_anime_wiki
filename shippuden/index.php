<?php require_once '../config/auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naruto Shippuden</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>

    <div class="logo">
        <img src="../img/naruto1_logo.jpg" alt="Naruto Logo">
    </div>

    <nav>
        <ul>
            <li><a href="../home.php">HOME</a></li>
            <li><a href="merchandise.php">MERCH</a></li>
            <li><a href="../auth/login.php">LOGIN</a></li>
        </ul>
    </nav>

</header>

<section class="banner">
    <h1>ANIME</h1>
</section>

<section class="anime-tabs">

    <a href="../naruto/index.php" class="tab">
        Naruto
    </a>

    <a href="../shippuden/index.php" class="tab active">
        Naruto Shippuden
    </a>

    <a href="../boruto/index.php" class="tab">
        Boruto
    </a>

</section>

<section class="anime-container">

    <div class="summary">

        <img src="../img/shippuden.jpg"
             alt="Shippuden Logo"
             class="anime-logo">

        <p>
            After two years of training with Jiraiya,
            Naruto returns to Konoha stronger than ever.
            He begins his journey to rescue Sasuke and
            face the threat of Akatsuki.
        </p>

    </div>

    <div class="poster">
        <img src="../img/shippuden.container.jpg"
             alt="Naruto Shippuden">
    </div>

</section>

<section class="story">

    <h2>STORY ARC</h2>

    <div class="accordion">
        <button class="accordion-btn">
            EP1-32 | Kazekage Rescue Mission
        </button>

        <div class="accordion-content">
            <p>
                Team Kakashi attempts to rescue Gaara from Akatsuki.
            </p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            EP113-143 | Itachi Pursuit Mission
        </button>

        <div class="accordion-content">
            <p>
                Sasuke searches for Itachi and forms Team Hebi.
            </p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            EP262-321 | Fourth Great Ninja War
        </button>

        <div class="accordion-content">
            <p>
                The Allied Shinobi Forces battle Madara and Obito.
            </p>
        </div>
    </div>

</section>

<footer>
    Naruto Fan Portal © 2026
</footer>

<script src="../js/script.js"></script>

</body>
</html>