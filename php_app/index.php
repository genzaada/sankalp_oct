<?php
/**
 * SANKALP 2027 — International Conference Website
 * School of Engineering & Technology, MGM University
 * 
 * Technology: PHP 8.x, Semantic HTML5, CSS3, Vanilla JavaScript (ES6+), MySQL PDO
 */

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/icons.php';

// Central Configuration & Static Data Loading
$config = require __DIR__ . '/config/app.php';
$conferenceData = require __DIR__ . '/config/conference_data.php';

// Route detection: support both query param (?page=about) and client-side view switching
$currentPage = isset($_GET['page']) && strtolower($_GET['page']) === 'about' ? 'about' : 'home';
$pageTitle = $currentPage === 'about' 
    ? 'About the Conference & Host Institution — ' . $config['app_name'] 
    : $config['app_name'] . ' — ' . $config['app_full_title'];

// 1. Head & Meta
require __DIR__ . '/includes/head.php';

// 2. Navigation Header
require __DIR__ . '/includes/navigation.php';

// 3. Page View: Unified single-page layout
require __DIR__ . '/includes/pages/home.php';

// 4. Global Footer, Modals & Client Scripts
require __DIR__ . '/includes/footer.php';
