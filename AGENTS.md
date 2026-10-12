# SANKALP 2027 Conference Application

HTML5 + CSS3 + Vanilla JavaScript (ES6+) + PHP 8.x + MySQL application for MGM University.

## Production Application

The production application is located in `php_app/`:
- Entry point: `php_app/index.php`
- Apache config: `php_app/.htaccess`
- Master styling: `php_app/assets/css/style.css`
- Scripts: `php_app/assets/js/main.js`
- Database: `php_app/database/schema.sql`

## Local PHP Testing

Run the local PHP server:
```bash
php -S 0.0.0.0:8080 -t php_app
```
Preview at: `http://localhost:8080`

## Technology Stack

- **Frontend:** Semantic HTML5, Native CSS3 (Design Tokens & Keyframe Animations), Vanilla JavaScript (ES6+)
- **Backend:** PHP 8.x (Apache compatible)
- **Database:** MySQL 8.x via PDO prepared statements
- **Dependencies:** Zero production dependencies on Node.js, React, TypeScript, or Vite.