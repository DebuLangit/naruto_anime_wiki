<?php
// ============================================
// FILE: merch/index.php
// Fungsi: Tampilan daftar merchandise
// Admin : bisa akses tambah, edit, hapus
// User  : hanya lihat
// ============================================

require_once '../config/database.php';
require_once '../config/auth_check.php';

$pdo     = getDB();
$isAdmin = $_SESSION['role'] === 'admin';

// Pesan dari redirect
$msg_type = $_GET['msg_type'] ?? '';
$msg_text = $_GET['msg_text'] ?? '';

// READ semua merchandise
$merch_list = $pdo->query("
    SELECT m.*, c.name AS category_name
    FROM merchandise m
    JOIN merch_categories c ON m.category_id = c.id
    ORDER BY m.created_at DESC
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Merchandise - Naruto Anime Wiki</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        h2, h3 { margin-bottom: 10px; }
        .msg-success { background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px; }
        .msg-error   { background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; }
        .badge-admin { background:#dc3545; color:#fff; padding:2px 8px; border-radius:10px; font-size:12px; }
        .badge-user  { background:#17a2b8; color:#fff; padding:2px 8px; border-radius:10px; font-size:12px; }
        .btn-tambah  { background:#28a745; color:#fff; padding:8px 16px; border:none; border-radius:4px; cursor:pointer; text-decoration:none; display:inline-block; margin-bottom:15px; }
        .btn-edit    { background:#ffc107; color:#000; padding:6px 12px; border:none; border-radius:4px; cursor:pointer; text-decoration:none; }
        .btn-delete  { background:#dc3545; color:#fff; padding:6px 12px; border:none; border-radius:4px; cursor:pointer; }
        table { width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,.1); }
        th, td { padding:10px 14px; text-align:left; border-bottom:1px solid #eee; }
        th { background:#343a40; color:#fff; }
        tr:hover { background:#f9f9f9; }
        .info-box { background:#fff3cd; color:#856404; padding:10px; border-radius:5px; margin-bottom:15px; }
    </style>
</head>
<body>

<h2>🛒 Merchandise</h2>
<p>
    Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
    <span class="badge-<?= $_SESSION['role'] ?>"><?= $_SESSION['role'] ?></span>
    | <a href="../auth/logout.php">Logout</a>
</p>

<?php if ($msg_text): ?>
    <div class="msg-<?= htmlspecialchars($msg_type) ?>"><?= htmlspecialchars(urldecode($msg_text)) ?></div>
<?php endif; ?>

<?php if ($isAdmin): ?>
    <a href="tambah.php" class="btn-tambah">➕ Tambah Merchandise</a>
<?php else: ?>
    <div class="info-box">ℹ️ Kamu hanya bisa melihat daftar merchandise. Hubungi admin untuk perubahan data.</div>
<?php endif; ?>

<h3>📦 Daftar Merchandise (<?= count($merch_list) ?> produk)</h3>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <?php if ($isAdmin): ?><th>Aksi</th><?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($merch_list)): ?>
            <tr><td colspan="<?= $isAdmin ? 7 : 6 ?>" style="text-align:center;">Belum ada data.</td></tr>
        <?php else: ?>
            <?php foreach ($merch_list as $i => $m): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($m['name']) ?></td>
                <td><?= htmlspecialchars($m['category_name']) ?></td>
                <td>Rp <?= number_format($m['price'], 0, ',', '.') ?></td>
                <td><?= $m['stock'] ?></td>
                <td><?= htmlspecialchars(substr($m['description'], 0, 60)) ?>...</td>
                <?php if ($isAdmin): ?>
                <td>
                    <a href="edit.php?id=<?= $m['id'] ?>" class="btn-edit">Edit</a>
                    <form method="POST" action="hapus.php" style="display:inline"
                          onsubmit="return confirm('Hapus produk ini?')">
                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>