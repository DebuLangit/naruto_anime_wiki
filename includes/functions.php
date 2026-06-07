<?php
// ============================================
// FILE: includes/functions.php
// Fungsi: Kumpulan function helper global
// Cara pakai: require_once '../includes/functions.php';
// ============================================

// --------------------------------------------
// FUNCTION 1: Cek apakah user sudah login
// Kembalikan true/false
// --------------------------------------------
function isLoggedIn() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['user_id']);
}

// --------------------------------------------
// FUNCTION 2: Cek apakah user adalah admin
// Kembalikan true/false
// --------------------------------------------
function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

// --------------------------------------------
// FUNCTION 3: Format harga ke Rupiah
// Contoh: formatRupiah(150000) → "Rp 150.000"
// --------------------------------------------
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// --------------------------------------------
// FUNCTION 4: Potong teks panjang
// Contoh: truncate('teks panjang...', 20)
// --------------------------------------------
function truncate($text, $limit = 100) {
    if (strlen($text) <= $limit) return $text;
    return substr($text, 0, $limit) . '...';
}

// --------------------------------------------
// FUNCTION 5: Redirect dengan pesan
// --------------------------------------------
function redirectWithMessage($url, $type, $message) {
    header('Location: ' . $url . '?msg_type=' . $type . '&msg_text=' . urlencode($message));
    exit;
}

// --------------------------------------------
// FUNCTION 6: Tampilkan pesan dari query string
// Panggil di dalam HTML untuk tampilkan notif
// --------------------------------------------
function showMessage() {
    $type = $_GET['msg_type'] ?? '';
    $text = $_GET['msg_text'] ?? '';
    if ($type && $text) {
        echo "<div class='msg-{$type}'>" . htmlspecialchars(urldecode($text)) . "</div>";
    }
}