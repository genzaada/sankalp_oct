# Asset Inventory: Images, Fonts & Static Resources

This document catalogs every static asset in the application, verifying existence, integrity, file format, and destination path in the production PHP structure.

---

## 1. Local Image Assets

| File Name | Original Path | Target Production Path | Dimensions / Size | Usage Context |
|---|---|---|---|---|
| `AdminBulding.jpeg` | `public/AdminBulding.jpeg` | `assets/images/AdminBulding.jpeg` | High-res JPEG (~57 KB) | About highlight section campus photo |
| `mgm_university.jpg` | `public/mgm_university.jpg` | `assets/images/mgm_university.jpg` | High-res JPEG (~403 KB) | Organizing institution fallback photo |
| `mgm_university.png` | `public/mgm_university.png` | `assets/images/mgm_university.png` | High-res PNG (~403 KB) | Organizing institution card graphic (SOET / MGM University) |
| `sveri_building.png` | `public/sveri_building.png` | `assets/images/sveri_building.png` | High-res PNG (~1007 KB) | Institutional campus building visual resource |

---

## 2. Remote CDN Image Assets

| Resource URL | Target Usage | Fallback Strategy |
|---|---|---|
| `https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?...` | Keynote Speaker: Dr. Kai-Fu Lee | Local cached SVG avatar fallback |
| `https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?...` | Keynote Speaker: Dr. Fei-Fei Li | Local cached SVG avatar fallback |
| `https://images.unsplash.com/photo-1560250097-0b93528c311a?...` | Keynote Speaker: Dr. R. A. Mashelkar | Local cached SVG avatar fallback |
| `https://images.unsplash.com/photo-1500648767791-00dcc994a43e?...` | Keynote Speaker: Dr. Yann LeCun | Local cached SVG avatar fallback |
| `https://images.unsplash.com/photo-1590050752117-238cb0fb12b1?...` | Tourism: Ajanta & Ellora Heritage Caves | Local cached image fallback |

---

## 3. Typography & Web Fonts

| Font Family | Weights | Source / Link | Fallback Stack |
|---|---|---|---|
| **Inter** | 300, 400, 500, 600, 700 | Google Fonts CDN | `system-ui, -apple-system, sans-serif` |
| **Poppins** | 400, 500, 600, 700, 800 | Google Fonts CDN | `system-ui, sans-serif` |
| **DM Mono** | 400, 500 (normal & italic)| Google Fonts CDN | `ui-monospace, SFMono-Regular, Menlo, monospace` |

Google Fonts import string:
`https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&family=DM+Mono:ital,wght@0,400;0,500;1,400&display=swap`

Preconnect tags added in `<head>` for zero rendering delay:
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
```

---

## 4. Vector Logos & Icons

- Hexagonal SANKALP 2027 brand logo embedded directly via semantic vector SVG.
- 21 Feather/Lucide-style vector outline icons embedded via PHP helper functions in `includes/icons.php`.
- Zero external font-icon library dependencies (e.g., FontAwesome, Glyphicons) to avoid render blocking.
