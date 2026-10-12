# SANKALP 2027 / ICAEITSF — Migration Inventory

## 1. Executive Summary
- **Original Application:** React 19 + TypeScript + Vite 8 + Tailwind CSS v4 + Framer Motion.
- **Target Platform:** Apache Web Server + PHP 8.x + MySQL (PDO) + HTML5 + CSS3 + Vanilla JavaScript (ES6+).
- **Hosting Specification:** MGMU Server Environment (Direct file deployment, Apache execution, phpMyAdmin / MySQL database).
- **Governing Rule:** 100% preservation of design, layout, content, responsiveness, and interactive animations with zero production dependencies on Node.js, React, TypeScript, or Vite.

---

## 2. Source Technology vs. Target Technology Inventory

| Component / Layer | Source Implementation | Target Production Replacement |
|---|---|---|
| **Runtime & Hosting** | Node.js / Vite 8 dev server | Apache 2.4+ / PHP 8.x FPM or mod_php |
| **Document Root** | SPA `index.html` loading `/src/main.tsx` | Modular `index.php` with modular PHP include templates |
| **Templating Engine** | React JSX / TSX (`src/App.tsx`) | Native PHP Templates (`includes/header.php`, `includes/footer.php`, etc.) |
| **State Management** | React `useState`, `useEffect` | Vanilla JS State Manager (`assets/js/main.js`, `app-state.js`) |
| **Styling Framework**| Tailwind CSS v4 (`@tailwindcss/vite`) + `src/index.css` | Native Semantic CSS3 (`assets/css/style.css`, design tokens, responsive queries) |
| **Animations** | `framer-motion` (viewport enters, floating, marquee, modal) | Native CSS3 keyframes, CSS transitions, and `IntersectionObserver` |
| **Routing & Navigation**| React local page state (`currentPage: 'home' \| 'about'`) + hash scroll | Query/URL routing (`index.php?page=home` / `index.php?page=about`) + client-side pushState / AJAX tab switching |
| **Persistence / Forms** | Mock `preventDefault()` forms | MySQL Database with PDO prepared statements, CSRF protection, and REST/JSON endpoints |
| **Database** | None in original React frontend | MySQL 8.x schema (`database/schema.sql`) for registrations, submissions, newsletter, contact |
| **Media & Static Assets**| `public/` directory | `assets/images/`, `assets/icons/`, `assets/fonts/` |

---

## 3. Page Structure & Section Inventory

### Page 1: Home View (`?page=home` / default)
1. **Top Navigation Bar:**
   - Brand logo hexagon with gold border + SANKALP 2027 typography.
   - Desktop navigation links (Home, About, Tracks, Call for Papers, Speakers, Committee, Schedule, Registration, Venue, Contact).
   - "Register Now" primary pill button.
   - Mobile hamburger menu toggle & sliding drawer.
2. **Hero Section:**
   - Deep teal diagonal gradient background with subtle ambient glow blur.
   - Event status pill badge with pulsing amber indicator.
   - Full conference H1 title and institutional sub-caption.
   - Conference metadata pill cards (Dates, Venue, Deadline).
   - Dual Call-to-Action buttons: "Register Now" (solid white) + "Download Brochure" (outline).
   - Interactive rotating wireframe Globe visual with 3 floating tech tags ("IoT", "Cloud", "Cybersecurity").
   - Live Countdown widget (Days, Hours, Minutes, Seconds) targeting Feb 15, 2027.
3. **Key Conference Statistics Bar (Overlapping):**
   - Floating white card with negative top margin (`-mt-10`).
   - 6 statistical badges with animated counting: Participants (500+), Countries (50+), Speakers (120+), Institutions (200+), Research Papers (150+), Keynote Sessions (10+).
4. **Conference Overview Section:**
   - Eyebrow header "Conference Overview".
   - Scope panel: 10 multidisciplinary research scopes with teal checkmarks + international callout.
   - Objectives panel: 6 conference objectives with gold checkmark badges in dark teal gradient card.
   - Host institution panel: SOET & MGM University information with quotation and campus graphic.
5. **About Highlight Section:**
   - Dual-column layout with "Shaping the Future Through Innovation & Collaboration".
   - 4 key highlights with checkmark badges.
   - "Know More" button linking to the About view.
   - Architectural campus image (`AdminBulding.jpeg`) with decorative SVG dot grid.
6. **Conference Tracks Section:**
   - 6 Track cards in a 3-column responsive grid:
     - Track 1: Sustainable Energy Systems & Decarbonization.
     - Track 2: Smart & Sustainable Built Environments.
     - Track 3: Sustainable Manufacturing & Circular Economy.
     - Track 4: AI & Digital Technologies for Sustainability.
     - Track 5: Climate Change & Environmental Management.
     - Track 6: Sustainable Transportation & Resilient Infrastructure.
   - Each card contains icon, badge, 6 detailed topics, sub-themes count, and "Submit to Track" link.
   - Global "Submit Your Paper to a Track" CTA.
7. **Important Dates & Keynote Speakers:**
   - Split section (~35% / ~65%):
   - Important Dates: 5 key milestones with deadline badges and date pills.
   - Keynote Speakers: 4 international keynote speakers (Dr. Kai-Fu Lee, Dr. Fei-Fei Li, Dr. R. A. Mashelkar, Dr. Yann LeCun) with photo, role, organization, and LinkedIn link.
   - Mobile horizontal snap-slider with pagination dots.
8. **Call for Papers & Registration Fees:**
   - Split section (~35% / ~65%):
   - Dark teal CfP card with background watermark illustration, submit button, and guideline download.
   - Registration fee comparison table (Students, Scholars, Academicians, Industry) across Early Bird, Regular, and Spot categories.
   - Mobile tiered card view for fees.
9. **Publication Partners & Sponsors:**
   - Continuous marquee animation featuring IEEE, Springer, Scopus, Google, Microsoft, AWS, Taylor & Francis.
   - Manual left/right navigation controls.
10. **Global Footer:**
    - Column 1: SANKALP branding, description, and social media icons (Facebook, Twitter, LinkedIn, Instagram, YouTube).
    - Column 2: Quick Links matrix with hover chevron indicators.
    - Column 3: Complete institutional contact information with icons (Address, Email, Phone).
    - Column 4: Newsletter subscription form.
    - Bottom bar: Copyright, Privacy Policy, Terms & Conditions.

### Page 2: About View (`?page=about`)
1. **Hero Banner:** SANKALP 2027 badge, "About the Conference & Host Institution" heading.
2. **Vision & Mission Panel:** Comprehensive academic narrative.
3. **Organizing Institution Showcase:** Detailed overview of SOET and MGM University with campus photo.
4. **Organizing Committee Directory:**
   - Patrons (Chief Patron, Patron, Co-Patron).
   - Steering Committee (General Chair, Technical Program Chair, Finance Chair).
   - Advisory Board (International Advisor, National Advisor, Industry Advisor).
5. **Sidebar Venue & Tourism Showcase:**
   - Venue coordinates and transit connectivity (Air, Rail, Highway).
   - Tourism & Heritage spotlight: UNESCO Ajanta & Ellora caves with scenic imagery.
