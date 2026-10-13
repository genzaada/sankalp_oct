<?php
/**
 * Head Partial: Meta tags, stylesheets, fonts
 */
$config = require __DIR__ . '/../config/app.php';
$pageTitle = $pageTitle ?? ($config['app_name'] . ' — ' . $config['app_full_title']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="SANKALP 2027 — International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and Intelligent Technologies for Progress. Organized by School of Engineering & Technology, MGM University.">
  
  <!-- Preconnect for Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Master Stylesheets -->
  <link rel="stylesheet" href="<?= asset_url('assets/css/style.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/responsive.css') ?>?v=<?= time() ?>">

  <!-- Section-Specific Redesign Stylesheets -->
  <link rel="stylesheet" href="<?= asset_url('assets/css/tracks.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/speakers.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/dates.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/hero.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/stats.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/overview.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/about.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/committee.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset_url('assets/css/venue.css') ?>?v=<?= time() ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><path d='M50 5L88.9711 27.5V72.5L50 95L11.0289 72.5V27.5L50 5Z' fill='%230E5A56' stroke='%23F2B705' stroke-width='4'/><text x='50' y='60' fill='white' font-size='30' font-weight='bold' font-family='sans-serif' text-anchor='middle'>S</text></svg>">
</head>
<body>
