<?php require 'includes/config.php';
if (!user()) redirect('login.php');
$id = (int)($_GET['id'] ?? 0);
$s = db()->prepare('SELECT * FROM orders WHERE id=? AND user_id=?');
$s->execute([$id, user()['id']]);
$order = $s->fetch();
if (!$order) {
    http_response_code(404);
    exit('Order not found');
}
$pageTitle = 'Order Received';
require 'includes/header.php'; ?><section class="container section-space text-center">
    <div class="empty-state"><i class="bi bi-check-circle text-gold"></i>
        <h1>Thank you for your order!</h1>
        <p>Order #<?= $id ?> · <?= money($order['total']) ?></p>
        <p class="muted">Your order is pending confirmation. No payment was processed online.</p><a href="account.php" class="btn btn-gold">VIEW MY ORDERS</a>
    </div>
</section><?php require 'includes/footer.php'; ?>