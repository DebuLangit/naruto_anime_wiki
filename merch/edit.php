<?php
// ============================================
// FILE: merch/edit.php
// Fungsi: Form edit merchandise (admin only)
// ============================================

require_once '../config/database.php';
require_once '../config/auth_check.php';

// Hanya admin
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('Akses ditolak.'));
    exit;
}

$pdo   = getDB();
$error = '';
$id    = (int) ($_GET['id'] ?? 0);

if (!$id) {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('ID tidak valid.'));
    exit;
}

// Ambil data merchandise yang akan diedit
$stmt = $pdo->prepare("SELECT * FROM merchandise WHERE id = ?");
$stmt->execute([$id]);
$merch = $stmt->fetch();

if (!$merch) {
    header('Location: index.php?msg_type=error&msg_text=' . urlencode('Data tidak ditemukan.'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = trim($_POST['name']);
    $category_id = (int) $_POST['category_id'];
    $price       = (float) $_POST['price'];
    $stock       = (int) $_POST['stock'];
    $description = trim($_POST['description']);

    if (!$name || !$category_id || $price < 0 || $stock < 0) {
        $error = 'Semua field wajib diisi dengan benar.';
    } else {
        $stmt = $pdo->prepare("UPDATE merchandise SET category_id=?, name=?, price=?, stock=?, description=? WHERE id=?");
        $stmt->execute([$category_id, $name, $price, $stock, $description, $id]);
        header('Location: index.php?msg_type=success&msg_text=' . urlencode('Merchandise berhasil diupdate!'));
        exit;
    }
}

$categories = $pdo->query("SELECT * FROM merch_categories ORDER BY name")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Merchandise</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        h2 { margin-bottom: 15px; }
        .msg-error { background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; }
        form { background:#fff; padding:20px; border-radius:8px; max-width:500px; box-shadow:0 1px 4px rgba(0,0,0,.1); }
        label { font-weight:bold; display:block; margin-top:10px; }
        input, select, textarea { width:100%; padding:8px; margin-top:4px; box-sizing:border-box; border:1px solid #ccc; border-radius:4px; }
        .btn-submit { background:#ffc107; color:#000; padding:8px 16px; border:none; border-radius:4px; cursor:pointer; margin-top:15px; }
        .btn-cancel { background:#6c757d; color:#fff; padding:8px 16px; border:none; border-radius:4px; cursor:pointer; margin-top:15px; text-decoration:none; }
    </style>
</head>
<body>

<h2>✏️ Edit Merchandise</h2>

<?php if ($error): ?>
    <div class="msg-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST">
    <label>Nama Produk</label>
    <input type="text" name="name" required
           value="<?= htmlspecialchars($_POST['name'] ?? $merch['name']) ?>">

    <label>Kategori</label>
    <select name="category_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($categories as $cat): ?>
            <?php $selected = (($_POST['category_id'] ?? $merch['category_id']) == $cat['id']) ? 'selected' : ''; ?>
            <option value="<?= $cat['id'] ?>" <?= $selected ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Harga (Rp)</label>
    <input type="number" name="price" min="0" step="100" required
           value="<?= htmlspecialchars($_POST['price'] ?? $merch['price']) ?>">

    <label>Stok</label>
    <input type="number" name="stock" min="0" required
           value="<?= htmlspecialchars($_POST['stock'] ?? $merch['stock']) ?>">

    <label>Deskripsi</label>
    <textarea name="description" rows="3"><?= htmlspecialchars($_POST['description'] ?? $merch['description']) ?></textarea>

    <button type="submit" class="btn-submit">Update</button>
    <a href="index.php" class="btn-cancel">Batal</a>
</form>

</body>
</html>