<?php
/**
 * Head Partial: Meta tags, stylesheets, fonts, SEO & Social Graph
 */
$config = $config ?? require __DIR__ . '/../config/app.php';
$pageTitle = $pageTitle ?? ($config['app_name'] . ' — ' . $config['app_full_title']);
$pageDescription = $config['app_name'] . ' — ' . $config['app_full_title'] . '. ' . $config['app_subtitle'] . ' (' . $config['app_dates'] . ').';

// Production domain (configured when officially confirmed)
$productionDomain = $config['production_domain'] ?? '';
$canonicalUrl = !empty($productionDomain) ? rtrim($productionDomain, '/') . '/' : '';
$ogImageUrl = !empty($productionDomain) ? rtrim($productionDomain, '/') . '/assets/images/mgm_university.png' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
<?php if (!empty($canonicalUrl)): ?>

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= e($canonicalUrl) ?>">
<?php endif; ?>
  <meta name="robots" content="index, follow, max-image-preview:large">
  <meta name="keywords" content="ICAIESF 2027, Intelligent Engineering, Sustainable Future, Electric Vehicles, Industry 5.0, Smart Materials, MGM University, SOET, International Conference, Academic Conference">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
<?php if (!empty($canonicalUrl)): ?>
  <meta property="og:url" content="<?= e($canonicalUrl) ?>">
<?php endif; ?>
  <meta property="og:title" content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($pageDescription) ?>">
<?php if (!empty($ogImageUrl)): ?>
  <meta property="og:image" content="<?= e($ogImageUrl) ?>">
  <meta property="og:image:alt" content="MGM University Campus - <?= e($config['app_name']) ?>">
<?php endif; ?>
  <meta property="og:site_name" content="<?= e($config['app_name']) ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
<?php if (!empty($canonicalUrl)): ?>
  <meta name="twitter:url" content="<?= e($canonicalUrl) ?>">
<?php endif; ?>
  <meta name="twitter:title" content="<?= e($pageTitle) ?>">
  <meta name="twitter:description" content="<?= e($pageDescription) ?>">
<?php if (!empty($ogImageUrl)): ?>
  <meta name="twitter:image" content="<?= e($ogImageUrl) ?>">
  <meta name="twitter:image:alt" content="MGM University Campus - <?= e($config['app_name']) ?>">
<?php endif; ?>

  <!-- Schema.org JSON-LD Structured Data for Event & Organization -->
  <?php
  $datesConfirmed = !empty($config['dates_confirmed']);

  $eventData = [
      '@type' => 'EducationEvent',
      'name' => $config['app_name'] . ' — ' . $config['app_full_title'],
      'alternateName' => $config['app_name'],
      'description' => $pageDescription . ($datesConfirmed ? '' : ' (Proposed Dates: April 9–10, 2027; Administrative Confirmation in Progress)'),
      'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
      'location' => [
          '@type' => 'Place',
          'name' => 'School of Engineering and Technology, MGM University',
          'address' => [
              '@type' => 'PostalAddress',
              'streetAddress' => 'MGM Campus, CIDCO, N-6',
              'addressLocality' => 'Chhatrapati Sambhajinagar',
              'addressRegion' => 'Maharashtra',
              'postalCode' => '431003',
              'addressCountry' => 'IN'
          ]
      ],
      'organizer' => [
          '@type' => 'Organization',
          '@id' => 'https://mgmu.ac.in#organization',
          'name' => 'School of Engineering and Technology, MGM University',
          'url' => 'https://mgmu.ac.in'
      ]
  ];

  if (!empty($canonicalUrl)) {
      $eventData['@id'] = $canonicalUrl . '#event';
  }

  if (!empty($ogImageUrl)) {
      $eventData['organizer']['logo'] = $ogImageUrl;
  }

  if ($datesConfirmed) {
      $eventData['startDate'] = '2027-04-09T09:00:00+05:30';
      $eventData['endDate'] = '2027-04-10T18:00:00+05:30';
      $eventData['eventStatus'] = 'https://schema.org/EventScheduled';
  }

  $organizationData = [
      '@type' => 'Organization',
      '@id' => 'https://mgmu.ac.in#organization',
      'name' => 'School of Engineering and Technology, MGM University',
      'url' => 'https://mgmu.ac.in',
      'contactPoint' => [
          '@type' => 'ContactPoint',
          'contactType' => 'Conference Secretariat',
          'email' => $config['contact_email'] ?? '',
          'telephone' => '+91-' . preg_replace('/[^0-9]/', '', $config['contact_phone'] ?? '')
      ]
  ];

  $jsonLd = [
      '@context' => 'https://schema.org',
      '@graph' => [$eventData, $organizationData]
  ];
  ?>
  <script type="application/ld+json">
  <?= json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
  </script>

  <!-- Preconnect for Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Master Stylesheets -->
  <link rel="stylesheet" href="<?= asset_url('assets/css/style.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/responsive.css') ?>?v=2027.1">

  <!-- Section-Specific Redesign Stylesheets -->
  <link rel="stylesheet" href="<?= asset_url('assets/css/tracks.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/speakers.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/dates.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/hero.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/stats.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/about.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/committee.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/sponsorship.css') ?>?v=2027.1">
  <link rel="stylesheet" href="<?= asset_url('assets/css/venue.css') ?>?v=2027.1">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><path d='M50 5L88.9711 27.5V72.5L50 95L11.0289 72.5V27.5L50 5Z' fill='%230E5A56' stroke='%23F2B705' stroke-width='4'/><text x='50' y='60' fill='white' font-size='30' font-weight='bold' font-family='sans-serif' text-anchor='middle'>I</text></svg>">
</head>
<body id="top">
  <!-- Accessible Skip to Content Link (WCAG 2.2 AA) -->
  <a href="#main-content" class="skip-to-content">Skip to main content</a>
