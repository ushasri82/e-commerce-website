CREATE DATABASE IF NOT EXISTS ecommerce;

USE ecommerce;

DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, image) VALUES
('Wireless Headphones', 'High-quality wireless headphones.', 1499.00, 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800'),

('Smart Watch', 'Modern smartwatch with multiple features.', 2499.00, 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800'),

('Running Shoes', 'Comfortable shoes for everyday running.', 1999.00, 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800'),

('Backpack', 'Durable backpack for college and travel.', 999.00, 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800'),

('Wireless Headphones', 'Premium wireless headphones with deep bass.', 1499.00, 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800'),

('Smart Watch', 'Modern smartwatch with health tracking.', 2499.00, 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800'),

('Running Shoes', 'Comfortable lightweight running shoes.', 1999.00, 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800'),

('Travel Backpack', 'Durable backpack for travel and college.', 999.00, 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800'),

('Bluetooth Speaker', 'Portable speaker with powerful sound.', 1299.00, 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=800'),

('Gaming Mouse', 'High precision RGB gaming mouse.', 799.00, 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=800'),

('Mechanical Keyboard', 'RGB mechanical keyboard for gaming.', 1899.00, 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=800'),

('Smartphone', 'Modern smartphone with powerful performance.', 15999.00, 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800'),

('Laptop', 'Slim laptop for work and entertainment.', 49999.00, 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800'),

('Sunglasses', 'Stylish UV protected sunglasses.', 699.00, 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=800'),

('Mens T-Shirt', 'Premium cotton casual T-shirt.', 599.00, 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=800'),

('Womens Handbag', 'Elegant everyday handbag.', 1299.00, 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800'),

('Sports Shoes', 'Comfortable shoes for sports and fitness.', 1799.00, 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=800'),

('Power Bank', '10000mAh fast charging power bank.', 899.00, 'https://images.unsplash.com/photo-1609592424847-5f6e9f9b9a44?w=800'),

('USB-C Cable', 'Durable fast charging USB-C cable.', 299.00, 'https://images.unsplash.com/photo-1625842268584-8f3296236761?w=800'),

('Smart LED Bulb', 'Color changing WiFi smart LED bulb.', 499.00, 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=800'),

('Water Bottle', 'Insulated stainless steel water bottle.', 799.00, 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=800'),

('Travel Bag', 'Large lightweight travel bag.', 1499.00, 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800'),

('Fitness Band', 'Fitness tracker with activity monitoring.', 1199.00, 'https://images.unsplash.com/photo-1576243345690-4e4b1d2c8e5e?w=800'),

('Wireless Earbuds', 'Compact earbuds with charging case.', 1299.00, 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=800');
