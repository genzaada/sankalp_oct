<?php
/**
 * Application Configuration
 * SANKALP 2027 / ICAEITSF Conference
 */

return [
    'app_name' => 'SANKALP 2027',
    'app_full_title' => 'International Conference on Sustainable Advances in ENgineering, Knowledge Systems, AI and InteLligent Technologies for Progress',
    'app_subtitle' => 'Organized by MGM University, Chhatrapati Sambhajinagar',
    'app_dates' => '15–16 February 2027',
    'app_venue' => 'MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003',
    'app_venue_label' => 'MGM University Campus',
    'app_base_url' => '', // Leave empty for automatic relative path detection
    'contact_email' => 'sankalp@mgmu.ac.in',
    'contact_phone' => '+91 1234 567890',
    
    // Target countdown date (ISO 8601)
    'countdown_target' => '2027-02-15T00:00:00Z',

    // Travel & Venue details
    'location_how_to_reach' => 'Connected by air via Chhatrapati Sambhajinagar Airport (IXU), central railway junction, and national expressways with direct connections from Mumbai, Pune, Hyderabad, and Delhi.',

    // Database settings
    'database' => [
        'host'    => getenv('DB_HOST') ?: (file_exists('/Applications/MAMP') ? '127.0.0.1' : 'localhost'),
        'port'    => (int)(getenv('DB_PORT') ?: (file_exists('/Applications/MAMP') ? 8889 : 3306)),
        'name'    => getenv('DB_NAME') ?: 'sankalp2027_db',
        'user'    => getenv('DB_USER') ?: 'root',
        'pass'    => getenv('DB_PASS') !== false ? getenv('DB_PASS') : (file_exists('/Applications/MAMP') ? 'root' : ''),
        'charset' => 'utf8mb4'
    ],

    // Security & Environment
    'environment' => getenv('APP_ENV') ?: 'production', // 'development' or 'production'
    'csrf_token_name' => 'csrf_token'
];
    