-- Virtual Travel Planner Database Schema
-- Run this script in phpMyAdmin or via MySQL command line to initialize the database and table.

CREATE DATABASE IF NOT EXISTS `virtual_travel_planner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `virtual_travel_planner`;

-- Table structure for table `quote_requests`
CREATE TABLE IF NOT EXISTS `quote_requests` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `service_type` VARCHAR(50) NOT NULL,
  `pickup_date` DATE DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
