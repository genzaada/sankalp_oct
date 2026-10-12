# SANKALP 2027 — Production PHP Application

**International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and Intelligent Technologies for Progress**  
*Organized by School of Engineering & Technology, MGM University, Chhatrapati Sambhajinagar*

---

## 1. Technology Overview
- **Frontend:** Semantic HTML5, Native CSS3 (Design tokens, Flexbox/Grid, Animations), Vanilla JavaScript (ES6+).
- **Backend:** PHP 8.x (compatible with PHP 8.0, 8.1, 8.2, 8.3, 8.4, 8.5+).
- **Database:** MySQL 8.x / MariaDB 10.x accessed via secure PDO prepared statements.
- **Web Server:** Apache 2.4+ (compatible with cPanel, DirectAdmin, Plesk, or standalone Apache).
- **Dependencies:** **Zero runtime dependencies on Node.js, React, TypeScript, or Vite.**

---

## 2. Directory Structure

```text
php_app/
├── index.php                      # Application entry point & router
├── .htaccess                      # Apache security headers, MIME types, rewrites
├── config/
│   ├── app.php                    # General configuration & environment variables
│   ├── database.php               # Secure PDO database connector
│   └── conference_data.php        # Centralized conference content & data
├── includes/
│   ├── head.php                   # HTML head, Google Fonts, and meta tags
│   ├── navigation.php             # Fixed navigation bar & mobile drawer
│   ├── footer.php                 # Global footer, social links, scripts
│   ├── icons.php                  # Vector SVG icon renderer
│   ├── helpers.php                # Security, escaping, and CSRF utilities
│   ├── sections/                  # Modular homepage section templates
│   │   ├── hero.php               # Hero section, title, globe & countdown
│   │   ├── stats.php              # Floating statistics bar with animated counters
│   │   ├── overview.php           # Scope, objectives & host institution
│   │   ├── about-home.php         # Shaping the future & campus photo
│   │   ├── tracks.php             # 6 conference tracks and sub-themes
│   │   ├── dates-speakers.php     # Important dates & keynote speakers
│   │   ├── cfp-fees.php           # Call for papers & registration fee table
│   │   └── sponsors.php           # Continuous marquee & sponsors scroller
│   ├── pages/
│   │   ├── home.php               # Complete homepage view
│   │   └── about.php              # Complete about page view
│   └── modals/
│       ├── registration-modal.php # Interactive conference registration dialog
│       └── submission-modal.php   # Paper/abstract submission dialog
├── api/
│   ├── register.php               # Registration submission endpoint
│   ├── submit-abstract.php        # Paper abstract submission endpoint
│   ├── newsletter.php             # Newsletter subscription endpoint
│   └── contact.php                # Contact inquiry endpoint
├── assets/
│   ├── css/
│   │   ├── style.css              # Master stylesheet & design system tokens
│   │   ├── animations.css         # Keyframe animations (globe, marquee, reveals)
│   │   └── responsive.css         # Viewport breakpoint overrides
│   ├── js/
│   │   ├── main.js                # Core event orchestration & lifecycle
│   │   ├── countdown.js           # Live countdown timer
│   │   ├── counters.js            # Viewport-triggered animated number counters
│   │   ├── navigation.js          # Sticky nav, smooth scroll & view routing
│   │   ├── modals.js              # Modal popup triggers & keyboard handlers
│   │   └── forms.js               # Asynchronous AJAX form handlers with CSRF
│   └── images/
│       ├── AdminBulding.jpeg      # Architectural photo (Admin Building)
│       ├── mgm_university.png     # MGM University campus artwork
│       ├── mgm_university.jpg     # MGM University photograph
│       └── sveri_building.png     # Campus building visual asset
└── database/
    └── schema.sql                 # MySQL tables schema
```

---

## 3. Quick Start (Local PHP Testing)

Run the PHP built-in web server:
```bash
php -S 0.0.0.0:8080 -t php_app
```
Then visit:
- Homepage: `http://localhost:8080/` or `http://localhost:8080/index.php?page=home`
- About Page: `http://localhost:8080/index.php?page=about`

---

## 4. Production Deployment to MGMU Hosting (cPanel / Apache)

1. Upload all contents of `php_app/` into the hosting server's document root (typically `public_html/` or conference subfolder `public_html/sankalp2027/`).
2. Log into **cPanel** > **MySQL Databases** (or phpMyAdmin) and import `database/schema.sql`.
3. In `config/app.php`, update the database credentials if necessary:
   ```php
   'database' => [
       'host' => 'localhost',
       'port' => 3306,
       'name' => 'your_cpanel_dbname',
       'user' => 'your_cpanel_dbuser',
       'pass' => 'your_cpanel_dbpass',
       'charset' => 'utf8mb4'
   ]
   ```
4. Verify the site in your browser. All static content, styling, interactive modals, and animations work out-of-the-box.
