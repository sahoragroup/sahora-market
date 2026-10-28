# SAHORA MARKET

Black-and-gold PHP / Bootstrap / MySQL e-commerce development starter.

## Run locally with XAMPP

1. Copy this `sahora-market` folder to `C:\xampp\htdocs\sahora-market`.
2. Start **Apache** and **MySQL** in XAMPP.
3. Open `http://localhost/phpmyadmin` and import `database/sahora_market.sql` (the SQL creates the database).
4. If needed, edit MySQL credentials in `includes/config.php`.
5. Visit `http://localhost/sahora-market/`.
6. Register a customer account and test adding products, checkout and order history.

## Admin access (local testing only)

There is no default admin password. After registering your own account, promote it manually in phpMyAdmin using:

```sql
UPDATE users SET role='admin' WHERE email='your-own-email@example.com';
```

Log out and back in, then visit `/sahora-market/admin/index.php`.

## Implemented

Homepage, responsive catalog, category/price/search filters, product details, session cart, customer register/login (password_hash), checkout with Cash on Delivery / manual bank-transfer selection, transactional order storage and stock reduction, customer order list, read-only admin overview, wholesale/contact mock inquiry forms.

## Not yet implemented

Online card payment, working email forms/newsletter, saved wishlists, password reset, wholesale tier calculation/quotations, full admin CRUD, real ratings, stock photos owned by SAHORA, promotions, shipping API, hardened deployment, automated tests.

Product images are external Unsplash placeholders and require an internet connection. Prices and delivery charge are demo values, not real quotations. Never launch publicly without a security review, production configuration, verified payment gateway and operational order fulfillment process.
