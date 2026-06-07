<?php
// ============================================
// FILE: shippuden/index.php
// ============================================

require_once '../config/auth_check.php';
require_once '../includes/functions.php';

$page_title = 'Naruto Shippuden';
$base_path  = '../';

require_once '../includes/header.php';
?>

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
            <p>Team Kakashi attempts to rescue Gaara from Akatsuki.</p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            EP113-143 | Itachi Pursuit Mission
        </button>
        <div class="accordion-content">
            <p>Sasuke searches for Itachi and forms Team Hebi.</p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            EP262-321 | Fourth Great Ninja War
        </button>
        <div class="accordion-content">
            <p>The Allied Shinobi Forces battle Madara and Obito.</p>
        </div>
    </div>

</section>

<?php require_once '../includes/footer.php'; ?>