# Component Mapping: React to PHP / HTML5 / Vanilla JS

This document maps every React component and sub-render function found in `src/App.tsx` and related source files to its equivalent PHP, HTML, CSS, and Vanilla JavaScript implementation.

---

## 1. Top-Level Hierarchy

| React Component (`App.tsx`) | Target PHP Template | Target CSS Classes | Target JavaScript Module |
|---|---|---|---|
| `<App>` | `index.php` | `.app-container` | `assets/js/main.js` |
| Navigation Header (`<nav>`) | `includes/navigation.php` | `.site-nav`, `.nav-scrolled`, `.nav-link` | `assets/js/navigation.js` |
| Mobile Menu Drawer | `includes/navigation.php` | `.mobile-drawer`, `.drawer-open` | `assets/js/navigation.js` |
| Hero Section (`<header>`) | `includes/sections/hero.php` | `.hero-section`, `.hero-gradient`, `.pill-badge` | `assets/js/countdown.js` |
| `<GlobeVisual>` | `includes/sections/globe.php` | `.globe-container`, `.globe-ring`, `.tech-tag` | `assets/css/animations.css` |
| Countdown Widget | `includes/sections/countdown.php` | `.countdown-block`, `.countdown-num`, `.countdown-sep` | `assets/js/countdown.js` |
| Stats Bar (`<section>`) | `includes/sections/stats.php` | `.stats-float-card`, `.icon-badge` | `assets/js/counters.js` |
| `<AnimatedCounter>` | Integrated in `stats.php` | `.counter-value` | `assets/js/counters.js` (IntersectionObserver) |
| `<ConferenceOverviewSection>` | `includes/sections/overview.php`| `.overview-section` | `assets/js/animations.js` |
| `<ConferenceScopeSection>` | `includes/sections/scope.php` | `.scope-grid`, `.scope-card` | Native CSS Grid |
| `<ConferenceObjectivesSection>` | `includes/sections/objectives.php` | `.objectives-box`, `.objective-item` | Native CSS Grid |
| `<AboutHostInstitutionSection>` | `includes/sections/host-institution.php` | `.host-card`, `.host-artwork` | Native CSS Flex / Grid |
| About Section (Home) | `includes/sections/about-home.php` | `.about-highlights`, `.dot-grid` | Native CSS |
| Tracks Section (`#tracks`) | `includes/sections/tracks.php` | `.tracks-grid`, `.track-card` | `assets/js/tracks.js` |
| Important Dates (`#dates`) | `includes/sections/dates.php` | `.dates-card`, `.date-row` | Native CSS |
| Keynote Speakers (`#speakers`) | `includes/sections/speakers.php` | `.speakers-grid`, `.speaker-card`, `.speaker-slider` | `assets/js/speakers.js` |
| Call for Papers Card (`#cfp`) | `includes/sections/cfp.php` | `.cfp-card`, `.btn-amber` | Native CSS |
| Registration Fees (`#fees`) | `includes/sections/fees.php` | `.fee-table`, `.fee-mobile-card` | `assets/js/modals.js` |
| Publication Partners / Marquee | `includes/sections/sponsors.php` | `.marquee-track`, `.sponsor-scroller` | `assets/js/sponsors.js` |
| Global Footer (`<footer>`) | `includes/footer.php` | `.site-footer`, `.social-icon-btn` | `assets/js/forms.js` |
| About Page (`currentPage === 'about'`) | `includes/pages/about.php` | `.about-page`, `.committee-grid` | `assets/js/navigation.js` |
| Registration Modal | `includes/modals/registration-modal.php` | `.modal-backdrop`, `.modal-dialog` | `assets/js/modals.js` |
| Abstract Submission Modal | `includes/modals/submission-modal.php` | `.modal-backdrop`, `.modal-dialog` | `assets/js/modals.js` |

---

## 2. Icon Set Mapping

All SVG icons defined in `App.tsx` (`Icon.Calendar`, `Icon.MapPin`, `Icon.Clock`, `Icon.Download`, `Icon.ArrowRight`, `Icon.Check`, `Icon.Linkedin`, `Icon.Users`, `Icon.Globe`, `Icon.Mic`, `Icon.Building`, `Icon.FileText`, `Icon.Award`, `Icon.Menu`, `Icon.X`, `Icon.Facebook`, `Icon.Twitter`, `Icon.Instagram`, `Icon.Youtube`, `Icon.Mail`, `Icon.Phone`) are extracted into:

`includes/icons.php` as reusable helper functions:
- `render_icon('calendar')`
- `render_icon('map-pin')`
- `render_icon('clock')`
- `render_icon('download')`
- `render_icon('arrow-right')`
- `render_icon('check')`
- `render_icon('linkedin')`
- `render_icon('users')`
- `render_icon('globe')`
- `render_icon('mic')`
- `render_icon('building')`
- `render_icon('file-text')`
- `render_icon('award')`
- `render_icon('menu')`
- `render_icon('x')`
- `render_icon('facebook')`
- `render_icon('twitter')`
- `render_icon('instagram')`
- `render_icon('youtube')`
- `render_icon('mail')`
- `render_icon('phone')`

This preserves exact SVG dimensions, stroke widths (`1.75` - `2.5`), linecap/linejoin rules, and vector paths.

---

## 3. Data Structure Mapping

All data arrays declared in `src/App.tsx` (`STATS`, `TRACKS`, `DATES`, `SPEAKERS`, `REG_FEES`, `SPONSORS`, `SANKALP_SCOPES`, `OBJECTIVES`, `COMMITTEE`, `COUNTDOWN_TARGET`) are centralized in:

`config/conference_data.php`

This allows templates to loop over native PHP arrays, making the application maintainable, easy to configure, and fully server-renderable with zero client-side JavaScript execution overhead.
