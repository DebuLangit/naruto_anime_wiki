<?php
// ============================================
// FILE: config/auth_check.php
// Fungsi: Proteksi halaman — wajib login
// Cara pakai: include di baris PALING ATAS
//             setiap halaman yang butuh login
// ============================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika belum login, redirect ke halaman login
if (empty($_SESSION['user_id'])) {
    header('Location: /naruto_anime_wiki/auth/login.php?error=Kamu+harus+login+terlebih+dahulu');
    exit;
}
?>