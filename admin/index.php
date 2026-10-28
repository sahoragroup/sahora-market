<?php require '../includes/config.php';
require_admin();
$counts = ['products' => db()->query('SELECT COUNT(*) FROM products')->fetchColumn(), 'orders' => db()->query('SELECT COUNT(*) FROM orders')->fetchColumn(), 'customers' => db()->query("SELECT COUNT(*) FROM users WHERE role='customer'")->fetchColumn(), 'revenue' => db()->query("SELECT COALESCE(SUM(total),0) FROM orders WHERE status='completed'")->fetchColumn()];
$orders = db()->query('SELECT o.*,u.email FROM orders o JOIN users u ON u.id=o.user_id ORDER BY o.id DESC LIMIT 20')->fetchAll(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SAHORA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container section-space">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">SAHORA <em>Admin</em></h1><a href="../index.php" class="btn btn-outline-gold">VIEW STORE</a>
        </div>
        <div class="row g-3 my-4"><?php foreach ($counts as $k => $v): ?><div class="col-6 col-lg-3">
                    <div class="filter-panel">
                        <div class="eyebrow"><?= e(strtoupper($k)) ?></div>
                        <h2><?= $k === 'revenue' ? money($v) : (int)$v ?></h2>
                    </div>
                </div><?php endforeach; ?></div>
        <div class="filter-panel">
            <h3>Recent Orders</h3>
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody><?php foreach ($orders as $o): ?><tr>
                                <td><?= $o['id'] ?></td>
                                <td><?= e($o['email']) ?></td>
                                <td><?= money($o['total']) ?></td>
                                <td><?= e($o['payment_method']) ?></td>
                                <td><?= e($o['status']) ?></td>
                            </tr><?php endforeach; ?></tbody>
                </table>
            </div>
            <p class="muted">Read-only dashboard starter. Product CRUD, reporting and order management are not implemented yet.</p>
        </div>
    </div>
</body>

</html>