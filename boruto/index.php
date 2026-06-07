<?php
require_once '../config/auth_check.php';
require_once '../includes/functions.php';

$page_title = 'Naruto';   // ← ganti judul
$base_path  = '../';

require_once '../includes/header.php';
?>

<!-- konten halaman di sini -->
<section class="banner">
    <h1>ANIME</h1>
</section>

<section class="anime-tabs">

    <a href="../naruto/index.php" class="tab">
        Naruto
    </a>

    <a href="../shippuden/index.php" class="tab">
        Naruto Shippuden
    </a>

    <a href="../boruto/index.php" class="tab active">
        Boruto
    </a>

</section>

<section class="anime-container">

    <div class="summary">

        <img src="../img/boruto_logo.jpg"
             alt="Boruto Logo"
             class="anime-logo">

        <p>
            Boruto Uzumaki is the son of Naruto Uzumaki,
            the Seventh Hokage. He seeks to forge his own
            path while facing new enemies and challenges.
        </p>

    </div>

    <div class="poster">
        <img src="../img/boruto.container.jpg"
             alt="Boruto">
    </div>

</section>

<section class="story">

    <h2>STORY ARC</h2>

    <div class="accordion">
        <button class="accordion-btn">
            Academy Entrance Arc
        </button>

        <div class="accordion-content">
            <p>
                Boruto begins his ninja journey at the academy.
            </p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            Chunin Exams Arc
        </button>

        <div class="accordion-content">
            <p>
                Boruto participates in the Chunin Exams and faces Momoshiki.
            </p>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-btn">
            Kawaki Arc
        </button>

        <div class="accordion-content">
            <p>
                Kawaki arrives in Konoha and becomes involved with Team 7.
            </p>
        </div>
    </div>

</section>

<?php require_once '../includes/footer.php'; ?>