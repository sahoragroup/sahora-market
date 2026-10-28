CREATE DATABASE IF NOT EXISTS sahora_market CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sahora_market;
CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(120) NOT NULL,email VARCHAR(190) NOT NULL UNIQUE,password_hash VARCHAR(255) NOT NULL,role ENUM('customer','admin') NOT NULL DEFAULT 'customer',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE IF NOT EXISTS categories(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(120) NOT NULL UNIQUE,image VARCHAR(500) NOT NULL);
CREATE TABLE IF NOT EXISTS products(id INT AUTO_INCREMENT PRIMARY KEY,category_id INT NOT NULL,name VARCHAR(200) NOT NULL,description TEXT NOT NULL,price DECIMAL(12,2) NOT NULL,wholesale_price DECIMAL(12,2) NOT NULL,min_wholesale_qty INT NOT NULL DEFAULT 10,stock INT NOT NULL DEFAULT 0,image VARCHAR(500) NOT NULL,active TINYINT(1) NOT NULL DEFAULT 1,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(category_id) REFERENCES categories(id),INDEX(category_id));
CREATE TABLE IF NOT EXISTS orders(id INT AUTO_INCREMENT PRIMARY KEY,user_id INT NOT NULL,customer_name VARCHAR(120) NOT NULL,phone VARCHAR(25) NOT NULL,address TEXT NOT NULL,city VARCHAR(120) NOT NULL,payment_method ENUM('cod','bank') NOT NULL,total DECIMAL(12,2) NOT NULL,status ENUM('pending','confirmed','shipped','completed','cancelled') NOT NULL DEFAULT 'pending',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(user_id) REFERENCES users(id),INDEX(user_id));
CREATE TABLE IF NOT EXISTS order_items(id INT AUTO_INCREMENT PRIMARY KEY,order_id INT NOT NULL,product_id INT NOT NULL,quantity INT NOT NULL,unit_price DECIMAL(12,2) NOT NULL,FOREIGN KEY(order_id) REFERENCES orders(id),FOREIGN KEY(product_id) REFERENCES products(id));
INSERT IGNORE INTO categories(id,name,image) VALUES
(1,'Groceries & Food','https://images.unsplash.com/photo-1542838132-92c53300491e?w=500&q=80'),
(2,'Beverages','https://images.unsplash.com/photo-1544145945-f90425340c7e?w=500&q=80'),
(3,'Household Essentials','https://images.unsplash.com/photo-1585421514738-01798e348b17?w=500&q=80'),
(4,'Personal Care & Beauty','https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=500&q=80'),
(5,'Electronics & Accessories','https://images.unsplash.com/photo-1498049794561-7780e7231661?w=500&q=80'),
(6,'Kitchen & Dining','https://images.unsplash.com/photo-1556911220-bff31c812dba?w=500&q=80'),
(7,'Stationery & Office','https://images.unsplash.com/photo-1455390582262-044cdead277a?w=500&q=80'),
(8,'Fashion & Accessories','https://images.unsplash.com/photo-1483985988355-763728e1935b?w=500&q=80'),
(9,'Baby & Kids','https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?w=500&q=80'),
(10,'Wholesale & Bulk','https://images.unsplash.com/photo-1601593768795-3e7c2e9d3d3d?w=500&q=80');
INSERT IGNORE INTO products(id,category_id,name,description,price,wholesale_price,min_wholesale_qty,stock,image) VALUES
(1,1,'Premium Basmati Rice 5kg','Quality basmati rice for family meals.',2850,2600,10,70,'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=650&q=85'),
(2,1,'Fresh Red Apples 1kg','Fresh, crisp red apples.',1450,1250,10,45,'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=650&q=85'),
(3,2,'Fresh Orange Juice 1L','Refreshing orange juice.',890,750,12,55,'https://images.unsplash.com/photo-1600271886742-f049cd451bba?w=650&q=85'),
(4,3,'Home Cleaning Essentials Set','A convenient household cleaning bundle.',1950,1700,10,35,'https://images.unsplash.com/photo-1585421514738-01798e348b17?w=650&q=85'),
(5,4,'Premium Skincare Collection','Daily skincare essentials.',3250,2850,10,30,'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=650&q=85'),
(6,5,'Wireless Headphones','Comfortable wireless headphones.',6950,6200,5,22,'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=650&q=85'),
(7,6,'Ceramic Coffee Mug','Modern ceramic mug for everyday use.',1250,990,12,60,'https://images.unsplash.com/photo-1514228742587-6b1558fcca3d?w=650&q=85'),
(8,7,'Premium Notebook Set','Stationery notebook collection.',1190,950,15,80,'https://images.unsplash.com/photo-1531346878377-a5be20888e57?w=650&q=85');
