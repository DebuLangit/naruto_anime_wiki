<?php
// ============================================
// FILE: includes/header.php
// Fungsi: Header global (navbar)
// Cara pakai: require_once '../includes/header.php';
// Wajib set $page_title sebelum include ini
// ============================================

// Pastikan session sudah jalan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = $page_title ?? 'Naruto Anime Wiki';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="<?= $base_path ?? '../' ?>css/style.css">
</head>
<body>

<header>

    <div class="logo">
        <img src="<?= $base_path ?? '../' ?>img/naruto1_logo.jpg" alt="Naruto Logo">
    </div>

    <nav>
        <ul>
            <li><a href="<?= $base_path ?? '../' ?>home.php">HOME</a></li>
            <li><a href="<?= $base_path ?? '../' ?>merch/index.php">MERCH</a></li>
            <?php if (!empty($_SESSION['user_id'])): ?>
                <li><a href="<?= $base_path ?? '../' ?>auth/logout.php">LOGOUT (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
            <?php else: ?>
                <li><a href="<?= $base_path ?? '../' ?>auth/login.php">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</header>