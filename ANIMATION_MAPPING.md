# Animation Mapping: Framer Motion to CSS3 & Vanilla JavaScript

This document maps all Framer Motion animations across `src/App.tsx` and `src/index.css` to lightweight, hardware-accelerated CSS3 and Vanilla JavaScript implementations.

---

## 1. Global & Viewport Animations

| Framer Motion Pattern | Original Timing & Values | Native CSS / JS Implementation |
|---|---|---|
| **Page Transition** | `opacity: [0, 1]`, `y: [15, 0]`, duration: 350ms, ease: `easeOut` | CSS class `.page-transition`: `opacity 0.35s ease-out, transform 0.35s ease-out`. |
| **Viewport Fade-Up** | `initial: { opacity: 0, y: 20-30 }`, `whileInView: { opacity: 1, y: 0 }`, `viewport: { once: true }` | `IntersectionObserver` adding `.in-view` class to `.reveal-up` elements. CSS: `opacity: 0; transform: translateY(24px); transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);` |
| **Staggered Delays** | `transition: { delay: i * 0.08 }` on grid items | Inline style or CSS utility `--delay: calc(var(--index) * 80ms); transition-delay: var(--delay);`. |
| **Subtle Ambient Hero Glow** | `opacity: [0.15, 0.3, 0.15]`, duration: 8s, repeat: Infinity, ease: `easeInOut` | CSS keyframe `@keyframes ambientGlow { 0%, 100% { opacity: 0.15; } 50% { opacity: 0.3; } }` with `animation: ambientGlow 8s ease-in-out infinite;`. |
| **Pill Badge Pulse** | Pulsing dot in hero status pill | CSS keyframe `@keyframes badgePulse { 0%, 100% { transform: scale(1); opacity: 1; } 50% { transform: scale(1.3); opacity: 0.7; } }`. |

---

## 2. Interactive Micro-Interactions & Hover States

| Component | Framer Motion Definition | Native CSS Replacement |
|---|---|---|
| **Primary Buttons** | `whileHover: { scale: 1.05 }`, `whileTap: { scale: 0.95 }` | `.btn-primary:hover { transform: translateY(-2px) scale(1.02); } .btn-primary:active { transform: scale(0.96); }` |
| **Amber CTA Buttons** | `whileHover: { scale: 1.05, boxShadow }`, `whileTap: { scale: 0.95 }` | `.btn-amber:hover { transform: translateY(-2px) scale(1.02); box-shadow: 0 8px 24px rgba(242,183,5,0.45); } .btn-amber:active { transform: scale(0.96); }` |
| **Stats Cards** | `whileHover: { y: -4 }` | `.stats-card:hover { transform: translateY(-4px); transition: transform 0.2s ease; }` |
| **Track Cards** | `whileHover: { y: -6, boxShadow: '0 16px 36px rgba(14,90,86,0.12)' }` | `.track-card:hover { transform: translateY(-6px); box-shadow: 0 16px 36px rgba(14,90,86,0.12); }` |
| **Speaker Cards** | `whileHover: { y: -5 }` | `.speaker-card:hover { transform: translateY(-5px); }` |
| **Scope Bullets** | `whileHover: { x: 3 }` | `.scope-bullet:hover { transform: translateX(3px); }` |
| **Social Media Badges**| `whileHover: { y: -3, scale: 1.1 }` | `.social-icon:hover { transform: translateY(-3px) scale(1.1); }` |

---

## 3. Complex Globe Visual & Tech Tags

| Visual Element | Original Animation Spec | Native CSS / SVG Implementation |
|---|---|---|
| **Globe Glow Core** | `opacity: [0.1, 0.22, 0.1]`, `scale: [0.95, 1.05, 0.95]`, 6s repeat | `@keyframes globeCorePulse { 0%, 100% { opacity: 0.1; transform: scale(0.95); } 50% { opacity: 0.22; transform: scale(1.05); } }` |
| **Outer Dashed Ring** | `rotate: -360deg`, duration: 50s linear infinite | `@keyframes rotateCounterClockwise { from { transform: rotate(0deg); } to { transform: rotate(-360deg); } }` |
| **Wireframe Globe SVG**| `rotate: 360deg`, duration: 38s linear infinite | `@keyframes rotateClockwise { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }` |
| **Floating Tech Tags (IoT, Cloud, Cyber)** | Y-oscillation between `-7px` and `+7px`, duration 4-6s ease-in-out infinite, staggered delays | `@keyframes floatBobOdd { 0%, 100% { transform: translateY(-7px); } 50% { transform: translateY(7px); } }` and `@keyframes floatBobEven { 0%, 100% { transform: translateY(7px); } 50% { transform: translateY(-7px); } }` |

---

## 4. Marquee & Continuous Motion

| Visual Element | Specification | Native CSS Implementation |
|---|---|---|
| **Sponsors Marquee** | Infinite horizontal translation `0%` to `-50%` over 28 seconds, pause on hover | `@keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } } .marquee-track { animation: marquee 28s linear infinite; } .marquee-track:hover { animation-play-state: paused; }` |

---

## 5. Accessibility & Reduced Motion

In compliance with WCAG standards and the migration charter:
```css
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```
All motion smoothly collapses to instant state transitions when the client prefers reduced motion.
