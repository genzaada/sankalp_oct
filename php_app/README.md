# ICAIESF 2027 — Production PHP Application

**International Conference on Advances in Intelligent, Emission-Free, Sustainable and Future Technologies**
*Organized by MGM University, School of Engineering and Technology (SOET), Chhatrapati Sambhajinagar*

---

## 1. Technology Overview
- **Frontend:** Semantic HTML5, Native CSS3 (Design tokens, CSS Grid/Flexbox, Keyframe animations), Vanilla JavaScript (ES6+).
- **Backend:** PHP 8.x (compatible with PHP 8.0, 8.1, 8.2, 8.3, 8.4, 8.5+).
- **Web Server:** Apache 2.4+ (compatible with MAMP, cPanel, Plesk, or standalone Apache).
- **Architecture:** Static informational conference portal. All conference content, committees, tracks, milestone dates, and venue information are rendered directly from centralized PHP configuration files.
- **Database:** Zero runtime database dependencies. Public pages do not query or write to a database.
- **Dependencies:** **Zero runtime dependencies on Node.js, React, TypeScript, or Vite.**

---

## 2. Directory Structure

```text
php_app/
├── index.php                      # Application entry point & router
├── .htaccess                      # Apache security headers, access blocks, and routing rewrites
├── config/
│   ├── app.php                    # Conference metadata, branding, and environment settings
│   ├── conference_data.php        # Centralized tracks, dates, fees, venue, and highlights data
│   ├── committee_members.php      # Organizing committee registry and member metadata
│   └── database.php               # Secure PDO connector (fails safely; not used by public pages)
├── includes/
│   ├── head.php                   # HTML head, typography, SEO metadata, and open-graph tags
│   ├── navigation.php             # Fixed navigation bar, mobile drawer, and accessibility controls
│   ├── footer.php                 # Global footer, institutional credits, and script inclusions
│   ├── icons.php                  # Vector SVG icon renderer
│   ├── helpers.php                # Security escaping, asset URL generation, and helper utilities
│   ├── sections/                  # Modular homepage section templates
│   │   ├── hero.php               # Hero section, title, animated planetary track nodes
│   │   ├── stats.php              # Floating statistics bar with animated counters
│   │   ├── overview.php           # Scope, objectives & host institution overview
│   │   ├── about-home.php         # Host institution highlight and campus visual
│   │   ├── tracks.php             # 6 official conference research tracks
│   │   ├── dates-speakers.php     # Milestone dates and keynote series announcements
│   │   ├── cfp-fees.php           # Call for papers guidelines and proposed registration fee table
│   │   ├── committee.php          # Conference advisory and organizing committees
│   │   ├── exhibition.php         # Technical exhibition and innovation showcase
│   │   ├── sponsorship.php        # Sponsorship opportunities and partnership packages
│   │   ├── sponsors.php           # Academic & institutional collaborator marquee
│   │   └── venue.php              # MGM University campus venue, travel directions & transit
│   ├── pages/
│   │   ├── home.php               # Complete homepage view
│   │   └── about.php              # Dedicated institution-focused About page (MGM University & SOET)
│   └── modals/
│       ├── registration-modal.php # Informational registration announcement modal
│       ├── submission-modal.php   # Informational paper submission modal (Microsoft CMT workflow)
│       └── brochure-modal.php     # Informational conference brochure notification modal
├── api/                           # Legacy API endpoints (Retired with HTTP 410 & blocked by .htaccess)
│   ├── register.php               # Returns HTTP 410 Gone (Direct registrations disabled)
│   ├── submit-abstract.php        # Returns HTTP 410 Gone (Submissions routed to Microsoft CMT)
│   ├── contact.php                # Returns HTTP 410 Gone (Direct inquiries use official email)
│   └── newsletter.php             # Returns HTTP 410 Gone (Subscriptions retired)
├── assets/
│   ├── css/
│   │   ├── style.css              # Master stylesheet & design system tokens
│   │   ├── hero.css               # Hero section layout, planetary orbit, and responsive styles
│   │   ├── overview.css           # Overview section styles
│   │   ├── speakers.css           # Keynote speakers and milestone dates styles
│   │   ├── committee.css          # Committee cards and portrait presentation
│   │   ├── exhibition.css         # Exhibition section styling
│   │   └── sponsorship.css        # Sponsorship tier cards styling
│   ├── js/
│   │   ├── main.js                # Core event orchestration and lifecycle initialization
│   │   ├── countdown.js           # Live countdown timer script
│   │   ├── counters.js            # Viewport-triggered animated number counters
│   │   ├── navigation.js          # Sticky nav, smooth scroll, scroll-spy & mobile drawer handlers
│   │   └── modals.js              # Informational modal popup triggers and keyboard handlers
│   ├── docs/
│   │   ├── Paper_Guidelines.html  # Formatted author submission guidelines
│   │   └── Paper_Guidelines.pdf   # Downloadable PDF submission guidelines
│   └── images/
│       ├── logo 2 .png            # Official ICAIESF 2027 logo emblem
│       ├── mgm_university.jpg     # MGM University campus photograph
│       ├── AdminBulding.jpeg      # Architectural photo (Admin Building)
│       └── committee/             # Committee member official portraits
└── database/
    └── schema.sql                 # Historical reference schema (legacy reference only; not active)
```

---

## 3. Local Testing & Verification

### A. Local PHP Server
Run the PHP built-in web server:
```bash
php -S 0.0.0.0:8080 -t php_app
```
Preview at: `http://localhost:8080/`

### B. MAMP Apache Testing
When deployed to local MAMP:
- URL: `http://localhost:8888/sankalp_oct-main/php_app/`
- All `.htaccess` rules (access blocking for `api/`, `config/`, `database/`, `.zip`, and `.sql`) are actively enforced by Apache.

---

## 4. Security Architecture

1. **Static Informational Portal:** The website operates without active user account creation, session management, or database mutation endpoints.
2. **Access Control (`.htaccess`):** Direct HTTP access to sensitive directories (`config/`, `database/`, `api/`) and sensitive file types (`.sql`, `.zip`, `.git`, `.env`) is forbidden (`HTTP 403 Forbidden`).
3. **Application-Level Safeguards:** All legacy endpoints in `api/` return `HTTP 410 Gone` with structured JSON responses, ensuring no database operations or code generation occurs even if web server rules are bypassed.
4. **Decoupled Database:** The database connector (`config/database.php`) defaults to safe null failure when environment variables are unset, ensuring that public-facing pages load immediately without MySQL.

---

## 5. Content Management Guide

All conference copy, milestone dates, registration fee tiers, committee directories, and venue information are maintained in centralized configuration files:

- **`config/app.php`:** Conference branding (`ICAIESF 2027`), full academic title, dates, venue address, contact email (`directorsoet@mgmu.ac.in`), and Microsoft CMT URL configuration.
- **`config/conference_data.php`:** Official 6 research tracks, milestone dates, proposed registration fee tiers, conference highlights, and venue transit summaries.
- **`config/committee_members.php`:** Organizing committee directory and member profiles.
