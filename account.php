<?php require 'includes/config.php';
if (!user()) redirect('login.php');
$s = db()->prepare('SELECT * FROM orders WHERE user_id=? ORDER BY id DESC');
$s->execute([user()['id']]);
$orders = $s->fetchAll();
$pageTitle = 'My Account';
require 'includes/header.php'; ?><section class="container section-space">
    <div class="eyebrow">MY SAHORA</div>
    <h1 class="page-title">Hello, <em><?= e(user()['name']) ?></em></h1>
    <div class="d-flex gap-3 my-4"><a href="shop.php" class="btn btn-gold">CONTINUE SHOPPING</a><a href="logout.php" class="btn btn-outline-gold">LOG OUT</a></div>
    <div class="filter-panel">
        <h3>My Orders</h3><?php if (!$orders): ?><p class="muted">You haven't placed an order yet.</p><?php endif; ?><?php foreach ($orders as $o): ?><div class="d-flex justify-content-between border-bottom py-3"><span>Order #<?= $o['id'] ?> · <?= e($o['status']) ?></span><strong><?= money($o['total']) ?></strong></div><?php endforeach; ?>
    </div>
</section><?php require 'includes/footer.php'; ?>