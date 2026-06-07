<?php
// ============================================
// FILE: merch/hapus.php
// Fungsi: Hapus merchandise (admin only)
// Tidak ada tampilan HTML — langsung proses
// ============================================

require_once '../config/database.php';
require_once '../config/auth_check.php';

// Hanya admin
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('Akses ditolak.'));
    exit;
}

// Hanya terima POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$pdo = getDB();
$id  = (int) ($_POST['id'] ?? 0);

if (!$id) {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('ID tidak valid.'));
    exit;
}

// Cek data ada atau tidak
$stmt = $pdo->prepare("SELECT id FROM merchandise WHERE id = ?");
$stmt->execute([$id]);

if (!$stmt->fetch()) {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('Data tidak ditemukan.'));
    exit;
}

// Hapus
$stmt = $pdo->prepare("DELETE FROM merchandise WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php?msg_type=success&msg_text=' . urlencode('Merchandise berhasil dihapus!'));
exit;
?>