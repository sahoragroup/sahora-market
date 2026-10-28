<?php require 'includes/config.php';
$id = (int)($_GET['id'] ?? 0);
$s = db()->prepare('SELECT p.*,c.name category FROM products p JOIN categories c ON c.id=p.category_id WHERE p.id=? AND p.active=1');
$s->execute([$id]);
$item = $s->fetch();
if (!$item) {
    http_response_code(404);
    exit('Product not found');
}
$pageTitle = $item['name'];
require 'includes/header.php'; ?><section class="container section-space"><a class="muted" href="shop.php">← Back to shop</a>
    <div class="row g-5 mt-2">
        <div class="col-lg-6">
            <div class="detail-image"><img src="<?= e($item['image']) ?>" alt="<?= e($item['name']) ?>"></div>
        </div>
        <div class="col-lg-6">
            <div class="eyebrow"><?= e($item['category']) ?></div>
            <h1 class="page-title"><?= e($item['name']) ?></h1>
            <p class="rating">★★★★★ <span>4.8 · Sample rating</span></p>
            <h2 class="text-gold"><?= money($item['price']) ?></h2>
            <p class="muted">Wholesale: <?= money($item['wholesale_price']) ?> per unit (minimum <?= $item['min_wholesale_qty'] ?> units)</p>
            <p><?= e($item['description']) ?></p>
            <p><?= $item['stock'] > 0 ? '<span class="text-success">● In stock</span>' : 'Out of stock' ?></p>
            <form action="cart.php" method="post" class="d-flex gap-3 align-items-center"><input type="hidden" name="csrf" value="<?= csrf() ?>"><input type="hidden" name="action" value="add"><input type="hidden" name="id" value="<?= $item['id'] ?>"><input class="form-control qty-input" type="number" name="qty" min="1" max="<?= $item['stock'] ?>" value="1"><button class="btn btn-gold btn-lg" <?= $item['stock'] < 1 ? 'disabled' : '' ?>>ADD TO CART <i class="bi bi-bag-plus"></i></button></form>
            <div class="mt-5 promise"><i class="bi bi-truck"></i> Delivery charges confirmed at checkout. <br><i class="bi bi-shield-check"></i> Quality-focused shopping.</div>
        </div>
    </div>
</section><?php require 'includes/footer.php'; ?>