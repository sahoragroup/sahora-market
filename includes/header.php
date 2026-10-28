<?php require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? 'SAHORA MARKET'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#0b0b0b">
    <title><?= e($pageTitle) ?> | SAHORA MARKET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="announcement text-center py-2">WELCOME TO SAHORA MARKET <span class="mx-2">✦</span> YOUR EVERYDAY SHOPPING DESTINATION <span class="d-none d-md-inline">✦ RETAIL & WHOLESALE</span></div>
    <header class="sticky-top site-header">
        <div class="container">
            <div class="d-flex align-items-center gap-3 py-3">
                <a class="brand text-decoration-none" href="index.php">
                    <span class="brand-icon">✦</span> SAHORA<span>MARKET</span></a>
                <form action="shop.php" class="search-box d-none d-lg-flex flex-grow-1 ms-lg-4"><i class="bi bi-search">
                    
                </i><input name="q" aria-label="Search products" placeholder="Search groceries, electronics, essentials..." value="<?= e($_GET['q'] ?? '') ?>"><button type="submit">Search</button></form>
                <div class="ms-auto d-flex align-items-center gap-3"><a aria-label="Account" href="account.php"><i class="bi bi-person fs-5"></i></a><a aria-label="Wishlist" href="wishlist.php"><i class="bi bi-heart fs-5"></i></a><a aria-label="Shopping cart" href="cart.php" class="position-relative"><i class="bi bi-bag fs-5"></i><span class="cart-badge"><?= cart_count() ?></span></a><button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><i class="bi bi-list fs-3"></i></button></div>
            </div>
            <nav class="collapse navbar-collapse d-lg-flex nav-links pb-3" id="nav"><a href="index.php">Home</a><a href="shop.php">Shop All</a><a href="shop.php#categories">Categories</a><a href="wholesale.php">Wholesale</a><a href="shop.php?sort=price">Special Offers</a><a href="about.php">About Us</a><a href="contact.php">Contact</a><?php if ((user()['role'] ?? '') === 'admin'): ?><a href="admin/index.php">Admin</a><?php endif; ?></nav>
        </div>
    </header>
    <main>