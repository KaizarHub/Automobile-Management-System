-- KD Automobile Management System (KDAMS)
-- Production-ready starter schema for MySQL/MariaDB 10.4+
-- Demo password for all seeded users: Admin@123 (change after first login)

CREATE DATABASE IF NOT EXISTS `kd_automobile_management`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `kd_automobile_management`;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `sales`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `media`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `user_groups`;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE `user_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_level` tinyint unsigned NOT NULL,
  `group_status` tinyint unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_group_level` (`group_level`),
  UNIQUE KEY `uq_group_name` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` tinyint unsigned NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.png',
  `status` tinyint unsigned NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_username` (`username`),
  KEY `idx_user_level` (`user_level`),
  KEY `idx_user_status` (`status`),
  CONSTRAINT `fk_users_group` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_category_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `media` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_media_type` (`file_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `quantity` int unsigned NOT NULL DEFAULT 0,
  `buy_price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `categorie_id` int unsigned NOT NULL,
  `media_id` int unsigned NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_product_name` (`name`),
  KEY `idx_product_category` (`categorie_id`),
  KEY `idx_product_media` (`media_id`),
  KEY `idx_product_stock` (`quantity`),
  CONSTRAINT `fk_products_category` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sales` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `qty` int unsigned NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_sales_product` (`product_id`),
  KEY `idx_sales_date` (`date`),
  CONSTRAINT `fk_sales_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_groups` (`group_name`,`group_level`,`group_status`) VALUES
('Administrator',1,1),('Inventory Manager',2,1),('Sales Manager',3,1);

INSERT INTO `users` (`name`,`username`,`password`,`user_level`,`image`,`status`) VALUES
('KDAMS Administrator','Admin','$2y$12$A5cLq709gXX5MazLc04i3eFuaseu7h4ZM/PLiVQQiycugq30Of87W',1,'no_image.png',1),
('Inventory Manager','Inventory','$2y$12$A5cLq709gXX5MazLc04i3eFuaseu7h4ZM/PLiVQQiycugq30Of87W',2,'no_image.png',1),
('Sales Manager','Sales','$2y$12$A5cLq709gXX5MazLc04i3eFuaseu7h4ZM/PLiVQQiycugq30Of87W',3,'no_image.png',1);

INSERT INTO `categories` (`name`) VALUES
('Engine & Mechanical'),('Braking System'),('Electrical & Lighting'),
('Filters & Fluids'),('Suspension & Steering'),('Body & Exterior');

INSERT INTO `products` (`name`,`quantity`,`buy_price`,`sale_price`,`categorie_id`,`media_id`) VALUES
('Engine Oil 5W-30 4L',40,5200.00,6500.00,4,0),
('Oil Filter - Premium',65,850.00,1200.00,4,0),
('Front Brake Pad Set',25,7200.00,9500.00,2,0),
('12V Car Battery 60Ah',18,18500.00,22500.00,3,0),
('LED Headlight Pair',30,6800.00,8900.00,3,0),
('Air Filter - Universal',50,1400.00,1900.00,4,0),
('Shock Absorber Front Pair',12,16500.00,21000.00,5,0),
('Spark Plug Set',45,2600.00,3500.00,1,0),
('Radiator Coolant 1L',35,950.00,1350.00,1,0),
('Side Mirror - Universal',16,4200.00,5800.00,6,0);

INSERT INTO `sales` (`product_id`,`qty`,`price`,`date`) VALUES
(1,3,19500.00,CURDATE()-INTERVAL 1 DAY),
(3,2,19000.00,CURDATE()-INTERVAL 2 DAY),
(4,1,22500.00,CURDATE()-INTERVAL 3 DAY),
(8,4,14000.00,CURDATE()-INTERVAL 4 DAY);

-- Useful reporting indexes are included above; all monetary values are stored as DECIMAL.
