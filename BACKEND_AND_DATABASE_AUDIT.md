# Backend & Database Audit: PHP 8.x Architecture & MySQL Persistence

This document specifies the backend requirements, PHP endpoints, PDO security model, and MySQL database schema for the MGMU hosting environment.

---

## 1. Environment & Architecture Constraints

1. **Server Environment:** Apache 2.4+ with PHP 8.x (verified PHP 8.5.9 on local machine).
2. **Database:** MySQL 8.x / MariaDB 10.x with `pdo_mysql`.
3. **Apache Directives:** `.htaccess` with URL rewriting, MIME type mapping, and security headers.
4. **Security Mandates:**
   - PDO prepared statements with parameterized inputs.
   - Strict input validation and sanitization.
   - Session-based CSRF token generation and validation.
   - Context-aware output escaping (`htmlspecialchars`).
   - Secure error handling that prevents internal stack trace disclosure.
   - Zero credential leaks into version control.

---

## 2. API Endpoints Specification

### 1. `POST /api/register.php`
- **Purpose:** Handles attendee and author conference registrations.
- **Request Format:** `application/json` or standard `multipart/form-data`.
- **Fields:**
  - `full_name` (string, 2-150 chars, required)
  - `email` (valid email format, required)
  - `phone` (phone string, 7-20 chars, required)
  - `institution` (string, 2-255 chars, required)
  - `category` (enum: `Students`, `Research Scholars`, `Academicians`, `Industry / Others`, required)
  - `registration_type` (enum: `early_bird`, `regular`, `spot`, required)
  - `paper_id` (string, optional)
  - `csrf_token` (string, validated against session)
- **Response:** JSON `{ "success": true, "message": "...", "registration_id": 1001 }`

### 2. `POST /api/submit-abstract.php`
- **Purpose:** Handles paper/abstract submissions.
- **Request Format:** `application/json` or `multipart/form-data`.
- **Fields:**
  - `author_name` (string, required)
  - `email` (email, required)
  - `phone` (string, required)
  - `affiliation` (string, required)
  - `track_id` (integer: 1 to 6, required)
  - `paper_title` (string, 5-255 chars, required)
  - `abstract_text` (text, 50-1000 words, required)
  - `keywords` (string, required)
  - `csrf_token` (string, validated against session)
- **Response:** JSON `{ "success": true, "message": "...", "submission_code": "SANKALP-T1-XXXX" }`

### 3. `POST /api/newsletter.php`
- **Purpose:** Newsletter subscription from footer.
- **Request Format:** JSON or form post.
- **Fields:**
  - `email` (email, required)
  - `csrf_token` (string)
- **Response:** JSON `{ "success": true, "message": "Thank you for subscribing to SANKALP 2027 updates." }`

### 4. `POST /api/contact.php`
- **Purpose:** General conference and venue inquiries.
- **Request Format:** JSON or form post.
- **Fields:**
  - `name` (string, required)
  - `email` (email, required)
  - `subject` (string, required)
  - `message` (text, required)
  - `csrf_token` (string)
- **Response:** JSON `{ "success": true, "message": "Your message has been received." }`

---

## 3. Database Schema (`database/schema.sql`)

```sql
-- SANKALP 2027 / ICAEITSF Database Schema for MySQL 8.x
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
```

---

## 4. PDO Database Connection Management (`config/database.php`)

```php
<?php
// Secure PDO database connector
function get_db_connection(): ?PDO {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $config = require __DIR__ . '/app.php';
    $dbConfig = $config['database'];

    $dsn = sprintf(
        "mysql:host=%s;port=%d;dbname=%s;charset=%s",
        $dbConfig['host'],
        $dbConfig['port'],
        $dbConfig['name'],
        $dbConfig['charset']
    );

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$dbConfig['charset']} COLLATE utf8mb4_unicode_ci"
    ];

    try {
        $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass'], $options);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        return null;
    }
}
```
If MySQL is not yet configured or credentials are not yet set by the administrator in the hosting panel, API endpoints degrade gracefully without crashing the UI, alerting the user with clean user-friendly feedback.
