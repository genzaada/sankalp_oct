<?php
/**
 * SANKALP 2027 — International Conference Website
 * School of Engineering & Technology, MGM University
 * 
 * Technology: PHP 8.x, Semantic HTML5, CSS3, Vanilla JavaScript (ES6+), MySQL PDO
 */

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/icons.php';

// Route detection: support both query param (?page=about) and client-side view switching
$currentPage = isset($_GET['page']) && strtolower($_GET['page']) === 'about' ? 'about' : 'home';
$pageTitle = $currentPage === 'about' 
    ? 'About the Conference & Host Institution — SANKALP 2027' 
    : 'SANKALP 2027 — International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and Intelligent Technologies';

// 1. Head & Meta
require __DIR__ . '/includes/head.php';

// 2. Navigation Header
require __DIR__ . '/includes/navigation.php';

// 3. Page Views (both rendered to allow instant client-side switching without screen flicker)
require __DIR__ . '/includes/pages/home.php';
require __DIR__ . '/includes/pages/about.php';

// 4. Global Footer, Modals & Client Scripts
require __DIR__ . '/includes/footer.php';
