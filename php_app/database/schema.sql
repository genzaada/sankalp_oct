-- SANKALP 2027 / ICAEITSF Database Schema for MySQL 8.x
-- MGM University School of Engineering and Technology

CREATE DATABASE IF NOT EXISTS `sankalp2027_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sankalp2027_db`;

-- 1. Conference Registrations Table
CREATE TABLE IF NOT EXISTS `conference_registrations` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `registration_code` VARCHAR(32) NOT NULL UNIQUE,
  `full_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(30) NOT NULL,
  `institution` VARCHAR(255) NOT NULL,
  `category` ENUM('Students', 'Research Scholars', 'Academicians', 'Industry / Others') NOT NULL,
  `registration_type` ENUM('early_bird', 'regular', 'spot') NOT NULL DEFAULT 'early_bird',
  `fee_amount` VARCHAR(20) NOT NULL,
  `paper_id` VARCHAR(50) DEFAULT NULL,
  `payment_status` ENUM('pending', 'verified', 'waived') NOT NULL DEFAULT 'pending',
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_email` (`email`),
  INDEX `idx_category` (`category`),
  INDEX `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Paper / Abstract Submissions Table
CREATE TABLE IF NOT EXISTS `paper_submissions` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `submission_code` VARCHAR(32) NOT NULL UNIQUE,
  `author_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(30) NOT NULL,
  `affiliation` VARCHAR(255) NOT NULL,
  `track_id` TINYINT UNSIGNED NOT NULL,
  `track_name` VARCHAR(255) NOT NULL,
  `paper_title` VARCHAR(300) NOT NULL,
  `abstract_text` TEXT NOT NULL,
  `keywords` VARCHAR(255) NOT NULL,
  `review_status` ENUM('submitted', 'under_review', 'accepted', 'revision_requested', 'rejected') NOT NULL DEFAULT 'submitted',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_track` (`track_id`),
  INDEX `idx_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Newsletter Subscriptions Table
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(191) NOT NULL UNIQUE,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `subscribed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Contact Inquiries Table
CREATE TABLE IF NOT EXISTS `contact_inquiries` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `is_resolved` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
