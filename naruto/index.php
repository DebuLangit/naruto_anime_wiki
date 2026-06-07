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

    <a href="../shippuden/index.php" class="tab active">
        Naruto Shippuden
    </a>

    <a href="../boruto/index.php" class="tab">
        Boruto
    </a>

</section>

<?php require_once '../includes/footer.php'; ?>