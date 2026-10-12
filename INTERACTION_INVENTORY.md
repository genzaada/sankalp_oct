# Interaction Inventory: Preserved User Interactions & State

This document catalogs every interactive behavior, state transition, and event handler present in the original React application and defines its exact Vanilla JavaScript implementation.

---

## 1. Global Navigation & Scroll State

| Interaction | Source React Code | Vanilla JavaScript Implementation |
|---|---|---|
| **Sticky Navigation Transition** | `scrolled = window.scrollY > 30` applying `bg-white shadow-md` | `window.addEventListener('scroll', handleNavScroll, { passive: true })` toggling `.nav-scrolled` on `header.site-nav`. |
| **Active Nav Indicator** | `activeNav` state synced with scroll & click | `IntersectionObserver` observing sections (`#overview`, `#tracks`, `#dates`, `#speakers`, `#cfp`, `#fees`, `#contact-section`) + scroll listener updating active navigation links. |
| **Offset Smooth Scroll** | `scrollToTarget` calculating `elementPosition - navbarHeight (85px)` | `window.scrollTo({ top: targetOffset, behavior: 'smooth' })` matching the 85px navbar offset. |
| **Cross-Page Section Scroll** | `pendingScrollTarget` polling loop when switching `home` <-> `about` | `window.history.pushState` or URL hash handling + instant page section scroll execution on DOM load / transition. |
| **Mobile Menu Drawer** | `setMobileMenuOpen(!mobileMenuOpen)` | Click event on `#mobile-menu-btn` toggling `#mobile-menu-drawer` with CSS slide/height expansion animation. |
| **Mobile Drawer Auto-Close** | Closed on navigation link click | Click handler on `.mobile-nav-link` calls `closeMobileMenu()`. |

---

## 2. Dynamic Timers & Counters

| Interaction | Source React Code | Vanilla JavaScript Implementation |
|---|---|---|
| **Live Countdown Timer** | `setInterval(..., 1000)` computing `COUNTDOWN_TARGET - Date.now()` (Feb 15, 2027) | `initCountdown('2027-02-15T00:00:00Z')` updating `#cd-days`, `#cd-hours`, `#cd-mins`, `#cd-secs` with 2-digit zero-padding. |
| **Animated Number Counters** | `<AnimatedCounter>` with `onViewportEnter` running 1200ms step loop | `IntersectionObserver` triggering `runNumberCounter(element, target, duration, suffix)` for `500+`, `50+`, `120+`, `200+`, `150+`, `10+`. |

---

## 3. Media, Carousels & Sliders

| Interaction | Source React Code | Vanilla JavaScript Implementation |
|---|---|---|
| **Continuous Sponsor Marquee** | CSS `.marquee-track` running 28s infinite loop, pausing on hover | Pure CSS keyframes `@keyframes marquee` with `:hover { animation-play-state: paused; }`. |
| **Manual Sponsor Scroller** | Arrow buttons modifying `track.scrollLeft += 220` | Click listeners on `#sponsor-prev` and `#sponsor-next` calling `sponsorTrack.scrollBy({ left: +/- 220, behavior: 'smooth' })`. |
| **Keynote Speaker Mobile Slider** | Native `overflow-x-auto snap-x` with dot indicator state `speakerIndex` | Scroll listener on `#speaker-mobile-slider` updating active dot class; clicking dot scrolls to `slider.children[index]`. |

---

## 4. File Downloads & External Triggers

| Interaction | Source React Code | Vanilla JavaScript Implementation |
|---|---|---|
| **Download Brochure** | Dynamically created `<a>` element triggering `SANKALP_Brochure.pdf` download | Standard HTML `<a href="assets/docs/SANKALP_Brochure.pdf" download="SANKALP_Brochure.pdf">` with JS fallback handler. |
| **Paper Guidelines Download**| Dynamically created `<a>` element triggering `Paper_Guidelines.pdf` download | Standard HTML `<a href="assets/docs/Paper_Guidelines.pdf" download="Paper_Guidelines.pdf">` with JS fallback handler. |
| **External Submission Portal** | `window.open('http://localhost:5174', '_blank')` | Configurable portal link / submission modal trigger with fallback URL. |

---

## 5. Forms, Modals & Asynchronous Submissions

| Interaction | Target Endpoint | Behavior & State Management |
|---|---|---|
| **Conference Registration** | `POST /api/register.php` | Interactive modal with category selector, personal details, institutional affiliation, fee calculation, client validation, CSRF verification, and MySQL persistence. |
| **Paper / Abstract Submission** | `POST /api/submit-abstract.php`| Submission dialog with track selector (Tracks 1-6), author listing, abstract textarea, keyword tagging, and server validation. |
| **Newsletter Subscription** | `POST /api/newsletter.php` | Asynchronous AJAX request via `fetch()`, displaying inline success/error badges without page refresh. |
| **Contact Inquiries** | `POST /api/contact.php` | Asynchronous AJAX submission with email format verification and anti-spam protection. |
