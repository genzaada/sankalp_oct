# Migration Risks & Mitigation Matrix

This document outlines key risks identified during the audit and details the mitigation measures implemented for each.

---

## 1. Risk Analysis Matrix

| # | Risk Category | Specific Risk Description | Severity | Mitigation Strategy |
|---|---|---|---|---|
| 1 | **Visual Fidelity** | Tailwind v4 compilation styles might render slightly differently without utility engine. | **High** | Extract computed design system tokens (`--color-primary-900`, etc.), copy exact box shadows, border radii, font sizes, line heights, and padding into a dedicated master stylesheet (`style.css`), testing against baseline at 320px, 375px, 768px, 1024px, 1280px, 1440px. |
| 2 | **Animation Divergence**| Framer Motion spring physics or staggered entrance effects might feel abrupt if replaced naively. | **Medium** | Recreate exact cubic-bezier easing (`cubic-bezier(0.16, 1, 0.3, 1)`), step durations (30ms step timer for AnimatedCounter, 1000ms countdown interval), and CSS keyframe loops (28s marquee, 38s/50s globe rotations). |
| 3 | **SPA View Switching** | User expects instant switching between Home and About without full-page flash, plus direct deep-linking to sections. | **Medium** | Implement hybrid architecture: Full PHP server-rendered pages for both `?page=home` and `?page=about` (with clean URL rewrite support) combined with client-side JavaScript tab switching and `pushState` for instantaneous client transitions. |
| 4 | **Database Availability**| The hosting environment might not have MySQL credentials configured immediately on file upload. | **High** | Built-in graceful degradation: database connector returns `null` safely without unhandled fatal errors, API endpoints detect database status and provide clear, secure messages, allowing the entire conference site to function flawlessly. |
| 5 | **Cross-Platform Apache Compatibility** | Server might run older Apache configurations where `.htaccess` directives like `mod_rewrite` could trigger 500 errors if syntax is invalid. | **Medium** | Use standard, battle-tested Apache 2.4 `.htaccess` directives wrapped in `<IfModule mod_rewrite.c>` and `<IfModule mod_headers.c>` guards. |
| 6 | **Asset Paths & Caching**| Relative asset paths (`/AdminBulding.jpeg`) might break if hosted in a subdirectory (e.g. `mgmu.ac.in/sankalp2027/`). | **High** | Implement PHP helper `asset_url($path)` that dynamically prepends the configured base path or relative path, ensuring zero broken links regardless of subfolder or root domain deployment. |
| 7 | **Security & Exploitation**| Public form endpoints could be susceptible to spam bots, SQL injection, or XSS attacks. | **High** | Strict PDO prepared statements, input length and character validation, CSRF tokens embedded into forms, honeypot spam protection, and context-aware escaping. |

---

## 2. Contingency & Rollback Plan

1. The original React repository remains fully intact on git branch `main` and initial commit `baseline: original React application before migration`.
2. The PHP application is developed inside a dedicated modular structure (`php/` and root deployable structure) without destructive alterations to original `src/` files.
3. Rollback can be executed instantaneously at any stage by checking out the baseline commit or switching git branches.
