# x 2026 — Design System & Page Analysis

Conference website: *International Conference on AI, Emerging Technologies & Future Systems*

---

## 1. Overall Style

- **Genre:** Corporate/academic conference landing page — trustworthy, tech-forward, credible.
- **Mood:** Clean, spacious, "enterprise SaaS" aesthetic borrowed for an academic event (lots of white space, card-based modules, soft shadows, rounded corners).
- **Grid:** Centered container (~1200–1280px max width), generous side gutters, 12-col implied grid for feature rows.
- **Imagery:** One large photographic hero-adjacent image (campus building), abstract line-art globe/network illustration in hero, flat icon set (outline style, 1.5px stroke) throughout.

---

## 2. Color Palette

| Role | Color | Approx Hex | Usage |
|---|---|---|---|
| Primary (Deep Teal) | ● | `#0E5A56` – `#0A4A47` | Header/hero gradient background, footer background, dark CTA buttons, "Call for Papers" panel |
| Primary Gradient End | ● | `#0B3B3A` | Bottom of hero gradient (diagonal teal-to-darker-teal) |
| Accent (Gold/Amber) | ● | `#F2B705` / `#F5A623` | "Register Now" (hero), "Submit Your Paper" button, countdown separators, small underline accents, Subscribe button |
| Accent Green (secondary CTA text) | ● | `#127C6F` | "Know More" button, section eyebrow labels ("ABOUT THE CONFERENCE", "CONFERENCE TRACKS"), links ("View All..."), highlighted headline word ("Innovation & Collaboration") |
| Neutral Dark (headings/body) | ● | `#1B2430` / `#111827` | H1–H3 headings, primary body copy |
| Neutral Gray (secondary text) | ● | `#6B7280` | Sub-copy, descriptions, nav labels, table body text |
| Background — White | ● | `#FFFFFF` | Default section background |
| Background — Off-white/Light gray | ● | `#F7F9FA` / `#F4F6F7` | Alternating sections (About, Tracks, Dates/Speakers) |
| Border/Divider | ● | `#E5E7EB` | Card borders, table row dividers |
| Success/Check icon | ● | teal-green | Bullet checkmarks in "Key Highlights" |

**Pattern:** Two-tone brand system — deep teal (trust, institutional) as the dominant/structural color, gold/amber as the single high-contrast action color reserved almost exclusively for primary CTAs and countdown/decorative accents. Never mixed for body text.

---

## 3. Typography

- **Typeface:** Clean geometric/humanist sans-serif (system-UI style, similar to Inter, Poppins, or Segoe UI) throughout — one family, weight variation does the work.
- **Scale (approx):**
  - H1 (Hero): ~40–44px, bold/semi-bold, white, tight line-height, 2–3 line wrap with one line color-accented (orange "&")
  - H2 (Section titles): ~28–32px, bold, dark navy — e.g. "Shaping the Future Through *Innovation & Collaboration*" (second clause in teal)
  - H3 (Card/Component titles): ~16–18px, semi-bold — track names, speaker names, "Call for Papers"
  - Eyebrow/Kicker labels: ~12px, uppercase, letter-spaced, teal, often preceded by a small dash "—"
  - Body copy: ~14–15px, regular, gray, line-height ~1.6
  - Stat numbers: ~26–28px, bold, dark — paired with small gray caption underneath
  - Nav links: ~14px, medium, dark gray with active-state teal underline

---

## 4. Layout — Section by Section

### 4.1 Navigation Bar
- White background, logo (hexagon icon + "SANKALP 2027" wordmark) left.
- Horizontal nav: Home · About · Tracks · Call for Papers · Speakers · Committee · Schedule · Registration · Venue · Contact.
- Active item ("Home") underlined in teal.
- Right-aligned dark teal pill "Register Now →" button.

### 4.2 Hero Section
- Full-width diagonal teal gradient background (deep teal → darker teal, angled ~10–15°).
- Left column:
  - Small pill badge "International Conference" (translucent white outline).
  - H1 across 3 lines, last word of line 2 ("&") in amber.
  - Subtext (2 lines, muted white/gray).
  - Row of 3 meta items with icons: calendar (dates), pin (venue), clock (registration deadline) — bold value + small gray label under each.
  - Two buttons: solid white "Register Now →" (dark text) + outline "Download Brochure ⬇" (white border, transparent).
- Right column:
  - Decorative line-art globe/network sphere illustration with small floating tag chips ("IoT", "Cloud", "Cybersecurity").
  - Below globe: floating white countdown card, 4 segments (Days · Hours · Minutes · Seconds) separated by small amber dots, bold dark numbers + gray labels.

### 4.3 Stats Bar
- White rounded card overlapping/sitting just under the hero (card floats above the section boundary — negative margin trick).
- 6-column row, each: circular light-teal icon badge + bold number (e.g. "500+") + gray caption ("Participants").
- Items: Participants, Countries, Speakers, Institutions, Research Papers, Keynote Sessions.

### 4.4 About the Conference
- Two-column: text left, image right.
- Eyebrow "— ABOUT THE CONFERENCE" → H2 (mixed color) → paragraph → "Key Highlights" sub-label → 4-item checklist (teal check-circle icons) → dark teal "Know More →" button.
- Right: large rounded-corner photo (modern glass building, "SVERI" signage), with a small overlapping white card (badge icon + "Scopus Indexed Proceedings") anchored at bottom-left of the image, plus a subtle dot-grid decorative pattern top-right of the image.

### 4.5 Conference Tracks
- Centered eyebrow + H2, teal underline accent beneath the heading.
- 6 equal-width bordered cards in a single row, each: circular light-teal icon badge (unique outline icon), bold 1–2 line title.
- Tracks: Artificial Intelligence · IoT & Smart Systems · Cybersecurity & Privacy · Cloud Computing & Edge · Blockchain & Distributed Systems · Data Science & Big Data.
- Centered "View All Tracks →" link below.

### 4.6 Important Dates + Keynote Speakers (split row)
- Left (narrower, ~35%): "IMPORTANT DATES" header with teal vertical accent bar; simple table/list — icon + label + right-aligned date, rows separated by thin dividers. 5 rows (Paper Submission, Notification of Acceptance, Camera Ready, Early Bird Registration, Conference Dates). "View All Dates →" link below.
- Right (~65%): "— KEYNOTE SPEAKERS" header + "View All Speakers →" link (top-right). 4-column grid of speaker cards: circular/rounded photo, bold name, gray role/affiliation (2 lines), small circular LinkedIn icon badge. Carousel dots below indicate additional slides.

### 4.7 Call for Papers + Registration Fee (split row)
- Left (~35%): Solid dark-teal rounded card. White H3 "CALL FOR PAPERS", white body copy, amber "Submit Your Paper →" button, outline "Paper Guidelines ⬇" button, illustration (document + megaphone) bottom-right.
- Right (~65%): "— REGISTRATION FEE" header. Clean pricing table — columns: Category | Early Bird (with date) | Regular (with date) | On Spot; rows: Students, Research Scholars, Academicians, Industry/Others — prices in ₹. Solid dark-teal "Register Now →" button below, right-aligned.

### 4.8 Publication Partners & Sponsors
- Centered bold label "PUBLICATION PARTNERS & SPONSORS".
- Horizontal logo strip (grayscale/full-color brand logos): IEEE, Springer, Scopus, Google, Microsoft, AWS, Taylor & Francis — with left/right circular carousel arrow controls.

### 4.9 Footer
- Full-width solid dark teal.
- 4-column layout: (1) Logo + short description + social icons (FB, X/Twitter, LinkedIn, Instagram, YouTube) in circular outline badges; (2) Quick Links (two sub-columns of nav items); (3) Contact Us (address, email, phone with icons); (4) Newsletter (short text + email input + amber "Subscribe" button).
- Bottom bar: copyright line + Privacy Policy / Terms & Conditions links, small "scroll to top" circular button bottom-right.

---

## 5. Components Inventory

| Component | Style Notes |
|---|---|
| Primary button (dark) | Teal fill, white text, rounded-full/pill, trailing arrow icon |
| Primary button (amber) | Amber fill, dark text, rounded-full, used for highest-priority actions (hero Register, Submit Paper) |
| Secondary/outline button | Transparent fill, 1px border (white on dark bg, teal on light bg), rounded-full |
| Icon badge | Circular, light-teal tint background, teal line icon centered, ~40–48px |
| Card (stat) | White bg, minimal/no border, icon + number + label, horizontal in a shared strip |
| Card (track) | White bg, thin gray border, rounded corners, centered icon + label, equal-height grid |
| Card (speaker) | Photo + name + role, LinkedIn badge, part of a carousel |
| Card (floating badge) | White bg, drop shadow, overlaps photo edge (Scopus badge) |
| Table | Minimal borders, header row bold/gray, zebra-free, right-aligned numeric columns |
| Countdown widget | White card, 4 numeric blocks + labels, dot dividers |
| Eyebrow label | Uppercase, small, teal, optional leading dash "—" |
| Pill badge | Translucent outline, rounded-full, small uppercase-ish text (hero "International Conference") |

---

## 6. Spacing & Shape Language

- **Corner radius:** Consistently rounded — buttons fully pill-shaped, cards/images ~12–16px radius, icon badges circular.
- **Shadows:** Soft, low-opacity drop shadows on floating elements (stat bar, countdown card, badge card) to lift them off the section background.
- **Section padding:** Large vertical rhythm (~80–100px between major sections), consistent horizontal container padding.
- **Alternating backgrounds:** White → off-white → white → off-white pattern to visually separate sections without hard borders.
- **Overlap technique:** Stat bar and countdown card both break the hero's bottom edge — a common "floating card over section transition" pattern for modern SaaS/landing pages.

---

## 7. Iconography

- Outline/line-style icon set (not filled), consistent stroke weight (~1.5–2px), rounded caps.
- Used for: nav meta (calendar, pin, clock), stats (people, globe, mic, institution, document, sparkle), tracks (gear/AI, chip/IoT, shield/security, cloud, link/blockchain, bar-chart/data), dates list, contact info, social icons.

---

## 8. Suggested Design Tokens (for implementation)

```css
:root {
  /* Colors */
  --color-primary-900: #0A4A47;
  --color-primary-700: #0E5A56;
  --color-primary-500: #127C6F;
  --color-accent-amber: #F2B705;
  --color-text-heading: #111827;
  --color-text-body: #6B7280;
  --color-bg-light: #F7F9FA;
  --color-bg-white: #FFFFFF;
  --color-border: #E5E7EB;

  /* Typography */
  --font-family-base: "Inter", "Poppins", system-ui, sans-serif;
  --fs-h1: 2.75rem;
  --fs-h2: 1.875rem;
  --fs-h3: 1.125rem;
  --fs-body: 0.9375rem;
  --fs-eyebrow: 0.75rem;

  /* Shape */
  --radius-pill: 999px;
  --radius-card: 16px;
  --radius-icon-badge: 50%;

  /* Shadow */
  --shadow-float: 0 10px 30px rgba(16, 24, 40, 0.08);

  /* Spacing */
  --section-padding-y: 6rem;
  --container-max-width: 1280px;
}
```

---

## 9. Key Takeaways for Recreating This Design

1. **Two-color brand system** — deep teal for structure/trust, single amber accent reserved for primary calls-to-action only.
2. **Card-and-badge language** — nearly every data point (stat, track, date, speaker) is wrapped in a circular icon badge + card, giving strong visual rhythm.
3. **Floating overlap elements** — stat strip and countdown timer break section boundaries for a modern, layered feel.
4. **Eyebrow + heading + underline accent** is the repeated section-header pattern throughout.
5. **Alternating light backgrounds** instead of hard dividers to organize a long single-page layout.
6. **Pill-shaped buttons and circular icon badges** everywhere — no sharp corners, reinforcing a friendly/approachable but still corporate tone.
