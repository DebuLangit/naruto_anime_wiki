<?php
// ============================================
// FILE: dashboard.php
// Fungsi: Dashboard admin
// ============================================

require_once 'config/auth_check.php';
require_once 'config/database.php';
require_once 'includes/functions.php';

// Hanya admin
if (!isAdmin()) {
    redirectWithMessage('home.php', 'error', 'Akses ditolak. Halaman khusus admin.');
}

$pdo = getDB();

// Ambil statistik
$total_user  = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$total_merch = $pdo->query("SELECT COUNT(*) FROM merchandise")->fetchColumn();
$total_stok  = $pdo->query("SELECT SUM(stock) FROM merchandise")->fetchColumn() ?? 0;

// Daftar semua user
$users = $pdo->query("SELECT id, username, email, role, created_at FROM users ORDER BY created_at DESC")->fetchAll();

$page_title = 'Dashboard Admin';
$base_path  = '';

require_once 'includes/header.php';
?>

<style>
    .dashboard-wrapper { padding: 30px 40px; }
    h2 { margin-bottom: 20px; }

    /* STAT CARDS */
    .stat-cards { display: flex; gap: 20px; margin-bottom: 35px; flex-wrap: wrap; }
    .card {
        background: #fff;
        border-radius: 8px;
        padding: 20px 30px;
        box-shadow: 0 1px 4px rgba(0,0,0,.1);
        flex: 1;
        min-width: 160px;
        text-align: center;
    }
    .card .number { font-size: 42px; font-weight: bold; color: #343a40; }
    .card .label  { font-size: 14px; color: #777; margin-top: 4px; }
    .card.blue  .number { color: #007bff; }
    .card.green .number { color: #28a745; }
    .card.orange .number { color: #fd7e14; }

    /* SHORTCUT */
    .shortcuts { display: flex; gap: 15px; margin-bottom: 35px; flex-wrap: wrap; }
    .shortcut-btn {
        padding: 12px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        color: #fff;
    }
    .shortcut-btn.green  { background: #28a745; }
    .shortcut-btn.orange { background: #fd7e14; }
    .shortcut-btn.blue   { background: #007bff; }
    .shortcut-btn.dark   { background: #343a40; }

    /* TABLE */
    h3 { margin-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.1); }
    th, td { padding: 10px 14px; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #343a40; color: #fff; }
    tr:hover { background: #f9f9f9; }
    .badge-admin { background: #dc3545; color: #fff; padding: 2px 8px; border-radius: 10px; font-size: 12px; }
    .badge-user  { background: #17a2b8; color: #fff; padding: 2px 8px; border-radius: 10px; font-size: 12px; }

    .msg-error { background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; }
</style>

<div class="dashboard-wrapper">

    <h2>⚙️ Dashboard Admin</h2>
    <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>

    <?php showMessage(); ?>

    <!-- ===================== STAT CARDS ===================== -->
    <div class="stat-cards">
        <div class="card blue">
            <div class="number"><?= $total_user ?></div>
            <div class="label">Total User</div>
        </div>
        <div class="card green">
            <div class="number"><?= $total_merch ?></div>
            <div class="label">Total Merchandise</div>
        </div>
        <div class="card orange">
            <div class="number"><?= number_format($total_stok, 0, ',', '.') ?></div>
            <div class="label">Total Stok</div>
        </div>
    </div>

    <!-- ===================== SHORTCUT ===================== -->
    <h3>🔗 Shortcut</h3>
    <div class="shortcuts">
        <a href="merch/tambah.php"  class="shortcut-btn green">➕ Tambah Merchandise</a>
        <a href="merch/index.php"   class="shortcut-btn orange">📦 Kelola Merchandise</a>
        <a href="naruto/index.php"  class="shortcut-btn blue">🌀 Naruto</a>
        <a href="shippuden/index.php" class="shortcut-btn blue">⚡ Shippuden</a>
        <a href="boruto/index.php"  class="shortcut-btn blue">🔵 Boruto</a>
        <a href="auth/logout.php"   class="shortcut-btn dark">🚪 Logout</a>
    </div>

    <!-- ===================== TABEL USER ===================== -->
    <h3>👥 Daftar User (<?= count($users) ?>)</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $i => $u): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><span class="badge-<?= $u['role'] ?>"><?= $u['role'] ?></span></td>
                <td><?= date('d M Y', strtotime($u['created_at'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require_once 'includes/footer.php'; ?>