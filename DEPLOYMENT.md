# MGMU Hosting Deployment Guide

This guide describes how to deploy the migrated **SANKALP 2027 / ICAEITSF** web application to the MGMU hosting environment (cPanel, File Manager, Apache, and MySQL / phpMyAdmin).

---

## 1. Hosting Environment Prerequisites

- **Web Server:** Apache 2.4+
- **PHP Version:** PHP 8.0, 8.1, 8.2, 8.3, 8.4, or 8.5+
- **PHP Extensions:** `pdo_mysql`, `mbstring`, `json`, `session` (all standard on MGMU hosting)
- **Database:** MySQL 8.x / MariaDB 10.x
- **No Node.js, React, or Vite required on production server.**

---

## 2. Step-by-Step Deployment Procedure

### Step 1: Package Production Files
From your local terminal, generate a deployment archive of the `php_app` directory:
```bash
cd /Users/salman/Downloads/sankalp_16_09
zip -r sankalp2027_production.zip php_app/ -x "*/.DS_Store"
```
Or upload the files directly using cPanel File Manager or FTP/SFTP.

### Step 2: Upload to Web Root
1. Log in to the MGMU hosting control panel (cPanel).
2. Open **File Manager**.
3. Navigate to `public_html/` (or your desired directory, e.g. `public_html/sankalp2027/`).
4. Upload `sankalp2027_production.zip`.
5. Extract the archive into the folder so that `index.php` resides directly in the document root.

### Step 3: Database Setup via phpMyAdmin
1. In cPanel, click **MySQL Databases** (or **Manage My Databases**).
2. Create a new database: e.g., `mgmu_sankalp2027`.
3. Create a database user: e.g., `mgmu_user` with a secure password.
4. Assign the user to the database with `ALL PRIVILEGES`.
5. Open **phpMyAdmin**, select the newly created database, and click the **Import** tab.
6. Choose `database/schema.sql` and click **Go**.

### Step 4: Configure Database Connection
Edit `config/app.php` in File Manager (or via FTP):
```php
'database' => [
    'host'    => 'localhost',
    'port'    => 3306,
    'name'    => 'mgmu_sankalp2027',
    'user'    => 'mgmu_user',
    'pass'    => 'YOUR_SECURE_PASSWORD',
    'charset' => 'utf8mb4'
],
```

### Step 5: Verify Permissions
Ensure file and folder permissions in File Manager are set to standard Apache defaults:
- Folders: `755` (`drwxr-xr-x`)
- Files: `644` (`-rw-r--r--`)
- `.htaccess`: `644`

---

## 3. Post-Deployment Verification Checklist

1. [ ] **Homepage Load:** Visit `https://your-domain.edu/` — confirm full hero gradient, title, and countdown timer.
2. [ ] **Navigation & Sticky Header:** Scroll down — verify header adds shadow and active nav items update.
3. [ ] **Animated Counters:** Verify statistics count up smoothly from 0 to 500+, 50+, etc.
4. [ ] **Tracks Grid:** Click "Submit to Track" on any card — verify abstract submission dialog opens with the correct track selected.
5. [ ] **Keynote Speakers:** Verify photos load, cards respond to hover, and LinkedIn links work.
6. [ ] **Call for Papers & Fees:** Test "Register Now" modal and fee calculation.
7. [ ] **Marquee:** Confirm continuous marquee scrolls and pauses when hovered.
8. [ ] **About View:** Click "About" in navbar — verify smooth transition to vision, host institution showcase, and organizing committee.
9. [ ] **Form Submissions:** Submit a test registration and test newsletter — verify successful feedback badge and MySQL database entry.
10. [ ] **Security:** Verify `.htaccess` prevents access to `config/` and `database/` directly from the browser.
