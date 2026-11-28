<?php
/**
 * ICAIESF 2027 — International Conference Website
 * School of Engineering & Technology, MGM University
 * 
 * Technology: PHP 8.x, Semantic HTML5, CSS3, Vanilla JavaScript (ES6+), MySQL PDO
 */

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/icons.php';

// Central Configuration & Static Data Loading
$config = require __DIR__ . '/config/app.php';
$conferenceData = require __DIR__ . '/config/conference_data.php';

// Route detection: default to abstract-submission; support ?page=home | about | sponsor | abstract-submission | conference-acknowledgement | terms-and-conditions
$pageParam = isset($_GET['page']) ? strtolower($_GET['page']) : 'abstract-submission';
$currentPage = in_array($pageParam, ['home', 'about', 'sponsor', 'abstract-submission', 'conference-acknowledgement', 'terms-and-conditions'], true) ? $pageParam : 'abstract-submission';
if ($currentPage === 'about') {
    $pageTitle = 'About the Host Institution — ' . $config['app_name'];
} elseif ($currentPage === 'sponsor') {
    $pageTitle = 'Sponsor — ' . $config['app_name'];
} elseif ($currentPage === 'abstract-submission') {
    $pageTitle = 'Abstract Submission — ' . $config['app_name'];
} elseif ($currentPage === 'conference-acknowledgement') {
    $pageTitle = 'Conference Acknowledgement — ' . $config['app_name'];
} elseif ($currentPage === 'terms-and-conditions') {
    $pageTitle = 'Terms & Conditions — ' . $config['app_name'];
} else {
    $pageTitle = $config['app_name'] . ' — ' . $config['app_full_title'];
}

// 1. Head & Meta
require __DIR__ . '/includes/head.php';

// 2. Navigation Header
require __DIR__ . '/includes/navigation.php';

// 3. Page View
if ($currentPage === 'about') {
    require __DIR__ . '/includes/pages/about.php';
} elseif ($currentPage === 'sponsor') {
    require __DIR__ . '/includes/pages/sponsor.php';
} elseif ($currentPage === 'abstract-submission') {
    require __DIR__ . '/includes/pages/abstract-submission.php';
} elseif ($currentPage === 'conference-acknowledgement') {
    require __DIR__ . '/includes/pages/conference-acknowledgement.php';
} elseif ($currentPage === 'terms-and-conditions') {
    require __DIR__ . '/includes/pages/terms-and-conditions.php';
} else {
    require __DIR__ . '/includes/pages/home.php';
}

// 4. Global Footer, Modals & Client Scripts
require __DIR__ . '/includes/footer.php';
