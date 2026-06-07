<?php
// ============================================
// FILE: auth/proses_login.php
// Fungsi: Memproses form login
// ============================================

require_once '../config/database.php';
session_start();


// Tolak akses langsung (bukan dari form POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// Ambil & bersihkan input
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi input tidak boleh kosong
if (empty($username) || empty($password)) {
    header('Location: login.php?error=Username+dan+password+wajib+diisi');
    exit;
}

// Cari user berdasarkan username
$stmt = getDB()->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Cek apakah user ditemukan & password cocok
if (!$user || !password_verify($password, $user['password'])) {
    header('Location: login.php?error=Username+atau+password+salah');
    exit;
}

// Login berhasil — simpan data ke session
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role']     = $user['role'];

// Arahkan berdasarkan role
if ($user['role'] === 'admin') {
    header('Location: ../dashboard.php');
} else {
    header('Location: ../home.php');
}
exit;
?>