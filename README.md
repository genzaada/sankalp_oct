# SANKALP 2027 — Conference Web Application

**International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and Intelligent Technologies for Progress**  
*Organized by MGM University, Chhatrapati Sambhajinagar*

---

## Direct Content Editing & Configuration System

The entire website is 100% data-driven and directly editable from two central configuration files without modifying HTML or template code:

### 1. Global Conference Configuration: [`php_app/config/app.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/config/app.php)
Edit this single file to immediately update all global information across the entire website:

| Configuration Key | Purpose / What it controls | Where it reflects |
| :--- | :--- | :--- |
| `'app_name'` | Conference acronym & year (e.g., `SANKALP 2027`) | Page titles, Navbar brand logo, Hero pill badge, Footer, Registration modal |
| `'app_full_title'` | Full academic title of the conference | Page `<title>`, Meta description, Hero H1, Footer summary |
| `'app_subtitle'` | Organizing institution / subtitle | Hero subtitle, Meta description, About banner, Footer copyright |
| `'app_dates'` | Conference event dates (e.g., `15–16 February 2027`) | Hero meta cards, Important dates section |
| `'app_venue'` | Official venue address | Hero meta cards, Venue section card, About sidebar, Footer contact info, Google Maps link |
| `'app_venue_label'` | Short venue campus label | Venue card footer button label |
| `'location_how_to_reach'` | Airport, rail, and highway transit info | Venue card, About page transit guide |
| `'contact_email'` | Official inquiry email (e.g., `sankalp@mgmu.ac.in`) | Footer contact row (clickable `mailto:`) |
| `'contact_phone'` | Official phone number (e.g., `+91 1234 567890`) | Footer contact row (clickable `tel:`) |
| `'countdown_target'` | Countdown ISO 8601 target (e.g., `2027-02-15T00:00:00Z`) | Live JavaScript countdown clock widget |
| `'database'` | MySQL connection credentials (`host`, `name`, `user`, `pass`) | Backend PDO connection & API endpoints |

### 2. Structured Section Content: [`php_app/config/conference_data.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/config/conference_data.php)
Edit this file to modify all repeating data structures and conference content:

| Section Key | Description | Where it reflects |
| :--- | :--- | :--- |
| `'tracks'` | Conference tracks, numbers, icons, and sub-themes | Track grid & Abstract Submission modal track dropdown. See full research scopes in [TRACKS_README.md](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/TRACKS_README.md) |
| `'dates'` | Important submission deadlines and acceptance dates | Important dates timeline card & Hero deadline indicator |
| `'speakers'` | Keynote speakers, titles, affiliations, and headshots | Keynote speakers grid & mobile touch slider |
| `'reg_fees'` | Early bird, regular, and on-spot fees by category | Fee table & mobile responsive cards |
| `'stats'` | Key conference metrics (500+ participants, etc.) | Floating hero stats bar with animated counters |
| `'highlights'` | Key conference highlights list | "Shaping the Future" homepage section |
| `'sponsors'` | Publication partners (IEEE, Scopus, Springer, etc.) | Infinite marquee scroller track |
| `'scopes'` | 10 multidisciplinary scope research areas | Scopes 2-column balanced grid |
| `'objectives'` | Core objectives of the conference | Objectives gradient card |
| `'committee'` | Patrons, Steering committee, and Advisory board | Organizing committee cards |
| `'nav_links'` | Primary navigation menu items and anchor targets | Desktop navbar, mobile drawer, and footer links |

---

## Recent Changes & Architectural Updates

### Context
In previous iterations, elements such as the host venue address, organizing institution subtitle, dates, and track lists were hardcoded directly inside individual PHP template files (`hero.php`, `venue.php`, `footer.php`, `head.php`, `about.php`, `submission-modal.php`, etc.). When administrators modified values in `config/app.php`, the changes did not propagate to the live web pages.

### Purpose of Changes
1. **100% Dynamic Binding**: Eliminate all hardcoded presentation strings and wire all templates to read dynamically from `$config` and `$conferenceData`.
2. **Immediate Venue Update**: Successfully replaced the legacy venue string with the user's updated venue:
   - **New Venue**: `MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003`
   - **New Subtitle**: `Organized by MGM University, Chhatrapati Sambhajinagar`
3. **Dynamic Form Integration**: Abstract submission modal track options now automatically generate from the tracks defined in `conference_data.php`.
4. **Context Preservation**: Retain a complete audit trail so team members understand where to configure content without touching template code.

### Files Modified & Bound to Config
- [`php_app/index.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/index.php) — Centrally loads `$config` and `$conferenceData` and generates dynamic page `<title>`.
- [`php_app/config/app.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/config/app.php) — Extended with `app_venue_label` and `location_how_to_reach` keys.
- [`php_app/config/conference_data.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/config/conference_data.php) — Added `highlights` array for homepage key highlights.
- [`php_app/includes/head.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/head.php) — Meta description and page title bound to `$config`.
- [`php_app/includes/navigation.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/navigation.php) — Brand logo title and year dynamically rendered from `$config['app_name']`.
- [`php_app/includes/sections/hero.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/sections/hero.php) — Subtitle, dates, venue, and early bird deadline bound to config.
- [`php_app/includes/sections/venue.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/sections/venue.php) — Location address, transit directions, and Google Maps search query bound to config.
- [`php_app/includes/footer.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/footer.php) — Venue address, email, phone, brand title, and copyright line bound to config.
- [`php_app/includes/pages/about.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/pages/about.php) — Banner subtitle, vision paragraph, venue sidebar card, and transit directions bound to config.
- [`php_app/includes/sections/overview.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/sections/overview.php) — Conference scope and host institution bound to config.
- [`php_app/includes/sections/about-home.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/sections/about-home.php) — Highlights bound to `$conferenceData['highlights']`.
- [`php_app/includes/modals/registration-modal.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/modals/registration-modal.php) — Header badge bound to `$config['app_name']`.
- [`php_app/includes/modals/submission-modal.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/includes/modals/submission-modal.php) — Tracks `<select>` options dynamically generated from `$conferenceData['tracks']`.
- [`php_app/assets/css/hero.css`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/assets/css/hero.css) — Enlarged rotating wireframe globe from 280px to 360px (+28% scale) and added orbital glassmorphic styles for the 6 track badges.

### Hero Rotating Globe & Revolving Track Symbols Update
- **Globe Scaling**: Increased the globe mesh diameter to 360px (`clamp(260px, 30vw, 360px)`), enhancing visual depth and hero presence.
- **Pure Symbols Only**: Stripped all text labels from the orbs to display only the pure symbols of the 6 official conference tracks:
  1. `⚡` (Track 1: Sustainable Energy Systems)
  2. `🏙️` (Track 2: Smart Built Environments)
  3. `♻️` (Track 3: Circular Economy)
  4. `🤖` (Track 4: AI & Intelligent Tech)
  5. `🌿` (Track 5: Climate & Ecology)
  6. `🚆` (Track 6: Transportation)
- **Continuous Planetary Revolution**: Implemented a 360° orbital revolution system (`orbitRevolve` 28s) with counter-rotating nodes (`orbitCounterRotate`) so the symbols orbit smoothly around the rotating globe while staying upright at every angle.
- **Interactive Controls**: Orbs pause on hover for easy clicking, feature glassmorphic glowing shadows, show track tooltips on hover, and smoothly scroll to the Tracks section on click.

### SANKALP 2027 Title & Brand Typography Scaling
- **Header Brand Logo Enhancement**:
  - Scaled the hexagon emblem from `36px` (`w-9 h-9`) to `48px × 48px` with refined vector geometry and hover micro-interaction (scale & subtle rotation).
  - Increased `SANKALP` title typography from `16px` (`1rem`) to `24.8px` (`1.55rem`) with `font-weight: 800` display font, letter-spacing, and deep teal contrast.
  - Increased `2027` year sub-label from `10px` to `13px` with `0.22em` wide tracking and amber hover transition.
- **Hero Main Title Prominence**:
  - Prominently styled **SANKALP 2027** as the primary `<h1>` heading with massive typography (`clamp(3rem, 6.8vw, 4.85rem)`), pure white glow for "SANKALP" and radiant gold/amber gradient for "2027".
  - Structured the full academic name as an authoritative `<h2>` subtitle (`clamp(1.15rem, 2.2vw, 1.55rem)`) with glowing acronym letters (`S-A-N-K-A-L-P`), establishing proper visual hierarchy.
- **Footer Brand Sizing**: Aligned footer brand typography and icon to match the enhanced 48px scale and high-contrast color scheme.

### Committee Member Photos & Asset Registry
- **Images Directory**: Created dedicated folder [`php_app/assets/images/committee/`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/assets/images/committee/) for committee member portraits.
- **Dedicated Config File**: Created [`php_app/config/committee_members.php`](file:///d:/New%20folder/xampp/htdocs/Conference_Sankalp/sankalp_oct/php_app/config/committee_members.php) mapping every patron, chair, and advisor with their role, name, affiliation, and image asset path.
- **Cutout Stage (No Inner Box)**: Configured `.member-photo-frame` with transparent background, no inner border, and dynamic drop-shadow (`filter: drop-shadow`) so transparent PNG cutouts integrate seamlessly right into the card window without looking like a "photo in a box".
- **White Background**: Ensured all committee member cards feature an explicit `#ffffff` background with subtle borders and hover depth.
- **Member Portraits Added**:
  - **Dr. Vilas S. Sapkal** (Chief Patron, Hon'ble Vice-Chancellor): `assets/images/committee/dr_vilas_sapkal.png`
  - **Dr. H. H. Shinde** (Patron, Dean SOET): `assets/images/committee/dr_hh_shinde.png`
  - **Dr. Ashish Gadekar** (Co-Patron, Registrar): `assets/images/committee/dr_ashish_gadekar.png`
- **Hero Action Buttons**: Removed the unattached "Download Brochure" button so the interface focuses cleanly on "Register Now" until the official PDF brochure is attached.
- **Hero Pill Badge Removed**: Removed the "International Academic Conference" status pill badge from the top of the hero section for a cleaner visual flow leading directly with the prominent SANKALP 2027 title.
- **Dynamic Conference Title Rendering**: Bound the hero academic subtitle `<h2>` directly to `$config['app_full_title']` using a new helper `render_conference_theme_title()` in `includes/helpers.php`. Edits made in `config/app.php` (such as casing, title revisions, or words) now immediately reflect on the live website while automatically preserving the golden acronym letter highlighting.
- **Call for Papers Announcement State**: Replaced the paper submission input form in `includes/modals/submission-modal.php` with a dedicated "To Be Announced" announcement modal. Clicking "Call for Papers" / "Submit Your Paper" now opens an announcement dialog with expected timeline dates and organizer contact details instead of opening an active submission input form.
- **Hero Meta Grid Streamlined**: Removed the "Early Bird Deadline" glass card from the hero section meta row, centering and balancing the grid on the two core items: "Conference Dates" and "Venue".
- **Pure Icon Globe Logo Nodes**: Removed the text label pills (`Climate & Ecology`, `Energy Systems`, etc.) from the revolving track logo orbs on the hero wireframe globe, leaving clean, minimalist floating planetary emblems.
- **Paper Guidelines Button Retained as Dummy**: Removed the unattached PDF file download trigger from the "Paper Guidelines" button in `includes/sections/cfp-fees.php`, retaining the button styling in the UI without initiating an unattached file download.



---

## Technology Stack

This project runs on the officially mandated MGMU web hosting environment:

- **Frontend:** Semantic HTML5, Native CSS3 (Design Tokens & Keyframe Animations), Vanilla JavaScript (ES6+)
- **Backend:** PHP 8.x
- **Database:** MySQL 8.x / MariaDB 10.x with PDO prepared statements
- **Web Server:** Apache 2.4+ (compatible with cPanel / File Manager deployment)
- **Zero runtime dependencies on Node.js, React, TypeScript, or Vite.**

---

## Directory Organization

- `php_app/` — **Production Application Directory**
  - `php_app/index.php` — Application entry point
  - `php_app/.htaccess` — Apache security directives & URL rewrite rules
  - `php_app/config/` — Application configuration & database connectors
  - `php_app/includes/` — Modular PHP templates (navigation, sections, modals, footer)
  - `php_app/api/` — PHP REST endpoints (registrations, submissions, newsletter, contact)
  - `php_app/assets/` — Production CSS, Vanilla JavaScript, images, and documents
  - `php_app/database/` — MySQL database schema (`schema.sql`)
- `DEPLOYMENT.md` — Complete step-by-step cPanel and Apache deployment guide
- `MIGRATION_REPORT.md` — Detailed migration report and acceptance test verification
- `ROLLBACK.md` — Rollback procedures
- `ICAEITSF-design-system.md` — Brand guidelines and design system specifications

---

## Local Development & Testing

To test the application locally with PHP:

```bash
php -S 0.0.0.0:8080 -t php_app
```

Then open `http://localhost:8080/` in your browser.

