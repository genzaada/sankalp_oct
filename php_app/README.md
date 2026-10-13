# SANKALP 2027 — Production PHP Application

**International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and Intelligent Technologies for Progress**  
*Organized by MGM University, Chhatrapati Sambhajinagar*

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

---

## 5. Direct Content Editing Guide

All website copy, dates, venue, contacts, and track data are 100% decoupled from HTML templates. You can edit the entire website directly using these two configuration files:

### A. General Conference Settings: `config/app.php`
Edit this file for site-wide metadata:
- **`app_name`**: Primary conference name/year (`SANKALP 2027`). Changes navbar brand, footer, modals, and page titles.
- **`app_full_title`**: Complete academic title used in SEO tags, page `<title>`, and hero subtitle.
- **`app_subtitle`**: Organizing body description (`Organized by MGM University, Chhatrapati Sambhajinagar`).
- **`app_dates`**: Conference event dates (`15–16 February 2027`).
- **`app_venue`**: Official physical venue address (`MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003`). Automatically updates the Hero card, Venue section, Footer, and Google Maps direction links.
- **`app_venue_label`**: Short campus badge name (`MGM University Campus`).
- **`location_how_to_reach`**: Transit summary for air, rail, and highway travelers.
- **`contact_email`**: Official conference email (`sankalp@mgmu.ac.in`).
- **`contact_phone`**: Official phone number (`+91 1234 567890`).
- **`countdown_target`**: Target date (`2027-02-15T00:00:00Z`) driving the live JS countdown timer widget.

### B. Repeating Section Data: `config/conference_data.php`
Edit this file to update repeating blocks:
- **`tracks`**: List of all 6 tracks with icons and sub-themes. Editing tracks here automatically updates both the Tracks grid and the Abstract Submission dialog dropdown.
- **`dates`**: Milestones, paper deadlines, and early-bird dates.
- **`speakers`**: Keynote speaker bios, headshots, organizations, and social links.
- **`reg_fees`**: Registration tiers and fees.
- **`stats`**: Animated counter statistics bar.
- **`highlights`**: Key conference highlights checklist.
- **`sponsors`**: Publication and academic partners in the scrolling marquee.
- **`scopes`**: 10 multidisciplinary research scope domains.
- **`objectives`**: Conference core mission objectives.
- **`committee`**: Full organizing committee directory by tier.

---

## 6. Changelog & Architectural Context

### Why These Changes Were Made
- **Problem**: Previously, venue information, dates, subtitle, and track names were hardcoded directly in individual templates (`hero.php`, `venue.php`, `footer.php`, `head.php`, `about.php`, `submission-modal.php`). When administrators edited `config/app.php`, the updates were not reflected on the website.
- **Solution**: Replaced all hardcoded values with dynamic bindings to `$config` and `$conferenceData`. Now, editing `config/app.php` or `config/conference_data.php` immediately reflects across all pages, modals, and footer components without editing PHP templates or HTML.
- **Hero Globe Scale & Revolving Track Symbols**: Enlarged the rotating wireframe globe to 360px and replaced the 3 generic tech labels (`IoT`, `Cloud`, `Cybersecurity`) with the pure symbols of the **6 official conference tracks** (`⚡`, `🏙️`, `♻️`, `🤖`, `🌿`, `🚆`). Created a continuous 360° orbital planetary revolution system (`orbitRevolve` 28s) with counter-rotating nodes (`orbitCounterRotate`) that keeps the symbols perfectly upright as they orbit smoothly around the globe, with hover-pause, glassmorphic styling, and click-to-scroll navigation.
- **SANKALP 2027 Brand & Hero Title Scaling**: Scaled the header navigation brand logo emblem from 36px to 48px, increased "SANKALP" typography to 24.8px (1.55rem, 800-weight) and "2027" to 13px (0.22em tracking). Transformed the hero section to proudly display **SANKALP 2027** as a massive, commanding `<h1>` heading (`clamp(3rem, 6.8vw, 4.85rem)`) with glowing white and golden amber gradient text styling, backed by an authoritative academic sub-theme `<h2>`.
- **Committee Member Photos & Dedicated Registry**: Created `assets/images/committee/` directory for executive portraits and `config/committee_members.php` for centralized configuration of all committee members and their photo assets. Enhanced member cards with explicit white backgrounds (`#ffffff`), placing the member's photo at the top with their role, name, and institution displayed below it. Configured transparent cutout staging (zero inner box borders or backgrounds, with realistic silhouette drop shadows) so transparent PNG cutouts integrate seamlessly directly onto the card. Added portraits for Chief Patron **Dr. Vilas S. Sapkal** and Co-Patron **Dr. Ashish Gadekar**.







