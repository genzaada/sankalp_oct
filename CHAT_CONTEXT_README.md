# ICAIESF 2027 — Session Chat & Implementation Context

This file preserves the full context, architectural decisions, and all changes implemented during the development session for the **ICAIESF 2027** conference website (`php_app/`).

---

## 1. Repository & Local Environment
- **GitHub Repository:** `https://github.com/genzaada/sankalp_oct.git` (branch: `main`)
- **Production Application Root:** `php_app/`
- **Local PHP Server:** `php -S 0.0.0.0:8080 -t php_app` → `http://localhost:8080`
- **XAMPP Apache URL:** `http://localhost/Conference_Sankalp/sankalp_oct/php_app/`
- **Tech Stack:** PHP 8.x, Semantic HTML5, Native CSS3 (design tokens in `php_app/assets/css/style.css`), Vanilla ES6+ JavaScript, Three.js (`0.164.1` via import map in `php_app/includes/head.php`). All `api/*.php` endpoints are retired (`410 Gone`); the site runs statically without MySQL.

---

## 2. Page Routing & Navigation (`php_app/index.php` & `php_app/assets/js/navigation.js`)
- **Default Landing Page:** Opening `/` or `index.php` loads **`abstract-submission`** by default (`$pageParam = isset($_GET['page']) ? strtolower($_GET['page']) : 'abstract-submission'`).
- **Supported `?page=` Routes:**
  - `index.php` / `index.php?page=abstract-submission` → `php_app/includes/pages/abstract-submission.php`
  - `index.php?page=home` → `php_app/includes/pages/home.php`
  - `index.php?page=about` → `php_app/includes/pages/about.php` (Host Institution profile)
  - `index.php?page=sponsor` → `php_app/includes/pages/sponsor.php` (Sponsor & Supporting Institutions)
  - `index.php?page=conference-acknowledgement` → `php_app/includes/pages/conference-acknowledgement.php` (**footer-only**, not in navbar)
- **Active Green Underline (Scroll-Spy):**
  - `navigation.php` sets initial `.active` class server-side for `home`, `about`, `sponsor`, and `abstract-submission`.
  - `initScrollSpy()` in `navigation.js` inspects `?page=` so:
    - On `abstract-submission` (or `/`), **Abstract Submission** is highlighted at the top and **Registration** highlights when scrolling into `#fees`.
    - On `sponsor` and `about`, **Sponsor** / **About** stay highlighted.
    - On `conference-acknowledgement`, no navbar link is highlighted.
    - On `home`, scroll-spy tracks `About`, `Committee`, `Tracks`, `Schedule`, `Speakers`, and `Venue`.

---

## 3. Summary of Changes Implemented

### A. Navbar & Branding (`php_app/includes/navigation.php`, `php_app/assets/css/style.css`)
- **Left Brand Logo:** Replaced inline SVG + text block with `php_app/assets/images/logo%202%20.png` (`.brand-logo-img`, `48px` desktop / `40px` mobile).
- **Right Navbar Logo:** Generated transparent, tightly cropped `php_app/assets/images/mgm_logo_navbar.png` (`1193×686` from `MGM LOGO.jpeg`) and placed it on the right side of the navbar linking to `https://mgmu.ac.in` (`.nav-mgm-logo`, `48px` desktop / `40px` mobile) without altering navbar height or spacing.
- **Removed Navbar Items:** Removed `Registration Info` button, `Exhibition`, and `Contact` from `nav_links` (`php_app/config/conference_data.php`).
- **Registration Link Fix:** Routed `Registration` in `nav_links` to `index.php?page=abstract-submission#fees`.

### B. Hero Section & 3D Extruded Logo (`php_app/includes/sections/hero.php`, `hero.css`, `hero-cube.js`, `head.php`)
- **Typography & Content:**
  - Removed the `International Academic & Industry Conference` pill badge, `Special Emphasis` line, and `Call For Papers` / `Registration Info` action buttons.
  - Highlighted **I** in *International* and **C** in *Conference* in amber (`.acronym-highlight`); kept *Advancing Intelligent Engineering for a Sustainable Future* on a single line on desktop (`23px`) with `April 9-10 2027` directly below.
  - Updated organizer text to `Organized By` / `School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra, India` (`font-weight: 600`).
  - Replaced the 3 meta boxes with a subtly highlighted **Paper Submission Deadline** box (`15 January 2027`, amber text + soft amber border/glow) beside a yellow **Submit Abstract** button (`openSubmissionModal()`).
  - Hid `#countdown-widget` on the `abstract-submission` page while keeping it on `home`.
- **Hero Wallpaper:** Added `php_app/assets/images/hero-wallpaper.jpg` (`z-index: 0`, `opacity: 0.55`) in front of the green gradient background and behind `.hero-content` (`z-index: 2`).
- **3D Extruded Logo (v3 — `php_app/assets/js/hero-cube.js`):**
  - Replaced the wireframe globe and GLB cube with a faithful procedural 3D extruded version of the `logo 2 .png` emblem (no outer cube, cage, or frame).
  - Centered all outer hexagonal/gear/leaf segments and the 6-node/6-rod molecular network on `z = 0` for a cohesive side profile, with smooth rounded bevels (`bevelSegments: 10`), `THREE.Box3` geometric center pivot, rich deep-teal (`0x0e635a`, `0x12786d`) and emerald (`0x1bb886`, `0x26d19a`) `MeshPhysicalMaterial`s, `RoomEnvironment` studio reflections, emerald key + cyan rim + soft fill lighting, 3/4 default camera `(1.55, 0.62, 4.15)`, 360° horizontal `OrbitControls` with constrained vertical polar angle, and gentle idle `autoRotate`.

### C. Abstract Submission & Fee Structure (`php_app/includes/pages/abstract-submission.php`, `php_app/includes/sections/cfp-fees.php`)
- Moved `cfp-fees.php` from `home.php` onto `abstract-submission.php` directly below `hero.php`.
- Simplified the Registration Fee Structure table to 3 columns: **Registration Category**, **Early Bird** (`By 25 Dec 2026`), and **Late / On-Spot** (`After 25 Dec 2026`). Removed the `Provisional Fee Schedule` pill badge and changed the **Institutional Advisory Notice** to plain red text (`#dc2626`).
- Added outline-free, full-container-width sections with uppercase `1.375rem` `#111827` headings and `1rem` `#111827` body text:
  - **REGISTRATION INFORMATION** (SAARC/non-SAARC inclusions, presenting author & co-author rules, and **Accommodation**)
  - **PROPOSED CONFERENCE TRACKS** (6 numbered themes + **View Tracks** button linking to `index.php?page=home#tracks`)
  - **ABSTRACT SUBMISSION GUIDELINES** (Text Abstract, Graphical Abstract with template/sample actions, Research Highlights)
  - **SUBMISSION PROCEDURE** (4 Microsoft CMT steps for `ICAIESF 2027`)
  - **PUBLICATION OPPORTUNITIES** (including *Science and Technology for the Built Environment – Taylor & Francis* linked to `https://www.tandfonline.com/journals/uhvc21`)

### D. Host Institution, Sponsor & Conference Acknowledgement Pages
- **Host Institution (`php_app/includes/pages/about.php`, `about.css`):** Redesigned from Figma `SANKALP 2027 · Institution` template into native PHP/CSS3 (`About the Host Institution`, `mgm_university.png`, `www.mgmu.ac.in`, `Campus and Infrastructure`, and institutional facts). Removed Key Highlights from `php_app/includes/sections/about-home.php`.
- **Sponsor (`php_app/includes/pages/sponsor.php`):** Renamed from `sponsorship` to `sponsor` with yellow `PARTNERSHIP & COLLABORATION` `<h1>` header and **CONFERENCE ORGANIZERS AND SUPPORTING INSTITUTIONS** (`SAEINDIA Chhatrapati Sambhajinagar Division`, `ASHRAE Pune Chapter`, `ISHRAE Chhatrapati Sambhajinagar Chapter`).
- **Conference Acknowledgement (`php_app/includes/pages/conference-acknowledgement.php`):** Footer-only page featuring **CONFERENCE ACKNOWLEDGEMENT** (highlighting **Microsoft CMT** and **ICAIESF 2027**) and **SUBMIT YOUR RESEARCH AND JOIN US**.

### E. Removed Sections & Pre-Deployment Fixes
- **Removed Sections:** Deleted `exhibition.php` / `exhibition.css` and `overview.php` / `overview.css` (Conference Objectives) and removed their references from `home.php`, `head.php`, `conference_data.php`, and `navigation.js`.
- **Pre-Deployment (`php_app/includes/head.php`):** Replaced `?v=<?= time() ?>` with `?v=2027.1` across CSS links for production caching; updated inline SVG favicon letter to `I`.

### F. Footer & Scroll-to-Top (`php_app/includes/footer.php`, `app.php`, `style.css`, `main.js`)
- Set footer text to crisp `#ffffff` white (amber column headings & hover states) and added `mgm_logo_navbar.png` inside `.footer-brand-badge` in Column 1.
- Updated **For Conference Enquiries** details (`Dr. Parminder Kaur Dhingra`, `Conference Chair, ICAIESF 2027`, `Professor & Director`, `School of Engineering and Technology`, `MGM University, Chhatrapati Sambhajinagar – 431003, Maharashtra, India`, single-line `+91 99601 37111 | 0240-6481000, Ext. 2811`, `directorsoet@mgmu.ac.in`).
- Added circular **Instagram**, **LinkedIn**, and **Google Maps Location** icons below the **Email Secretariat** button; added **Conference Acknowledgement** link to Quick Links; removed the bottom copyright bar.
- Added floating `#scroll-to-top-btn` (fixed bottom-right, appears after `300px` scroll).
