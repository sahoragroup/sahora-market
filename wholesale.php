<?php $pageTitle = 'Wholesale';
require 'includes/header.php'; ?><section class="container section-space">
    <div class="wholesale-banner">
        <div class="eyebrow">FOR YOUR BUSINESS</div>
        <h1 class="page-title">Wholesale <em>Marketplace</em></h1>
        <p>Stock your business with quality essentials at bulk-friendly prices.</p><a class="btn btn-gold" href="#quote">REQUEST A QUOTE</a>
    </div>
    <div class="row g-4 mt-5">
        <div class="col-md-6">
            <h2>Better prices.<br><em>Better business.</em></h2>
            <p class="muted">Explore product-level wholesale prices and minimum order quantities in our shop. Ask us for a tailored bulk quotation.</p><a href="shop.php" class="btn btn-outline-gold">VIEW PRODUCTS</a>
        </div>
        <div class="col-md-6">
            <div class="filter-panel" id="quote">
                <h3>Wholesale Inquiry</h3>
                <p class="muted">Contact form demonstration. Configure a mail service before accepting real inquiries.</p>
                <form id="inquiry"><input class="form-control mb-3" required placeholder="Business name"><input class="form-control mb-3" type="email" required placeholder="Email address"><textarea class="form-control mb-3" required placeholder="Products and quantities"></textarea><button class="btn btn-gold">PREPARE INQUIRY</button></form>
            </div>
        </div>
    </div>
</section><?php require 'includes/footer.php'; ?>