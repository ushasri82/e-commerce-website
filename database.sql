CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
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
('Wireless Headphones', 'High-quality wireless headphones.', 1499.00, 'headphones.jpg'),
('Smart Watch', 'Modern smartwatch with multiple features.', 2499.00, 'watch.jpg'),
('Running Shoes', 'Comfortable shoes for everyday running.', 1999.00, 'shoes.jpg'),
('Backpack', 'Durable backpack for college and travel.', 999.00, 'backpack.jpg');
