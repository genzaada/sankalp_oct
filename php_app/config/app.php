<?php
/**
 * Application Configuration
 * ICAIESF 2027 Conference
 * International Conference on Advancing Intelligent Engineering for a Sustainable Future
 */

return [
    'app_name' => 'ICAIESF 2027',
    'app_full_title' => 'International Conference on Advancing Intelligent Engineering for a Sustainable Future',
    'app_subtitle' => 'Organized by School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar',
    'app_emphasis' => 'Sustainable Automotive Mobility, Intelligent Engineering and Industry 5.0',
    
    // Conference Dates (Official Schedule)
    'dates_confirmed' => true,
    'app_dates' => 'April 9–10, 2027',
    'app_dates_label' => 'April 9–10, 2027',
    
    'app_venue' => 'School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra, India',
    'app_venue_label' => 'School of Engineering and Technology, MGM University',
    'app_base_url' => '', // Leave empty for automatic relative path detection
    
    // Official Conference Leadership & Contact
    'conference_chair' => 'Dr. Parminder Kaur Dhingra',
    'conference_chair_title' => 'Conference Chair, Professor & Director, School of Engineering and Technology, MGM University',
    'contact_email' => 'directorsoet@mgmu.ac.in',
    'contact_phone' => '9960137111',
    'contact_office' => '0240-6481000, Ext. 2811',

    // Official Social Media Profiles (Empty strings keep profile icons gracefully hidden)
    'social_links' => [
        'facebook'  => '',
        'twitter'   => '',
        'linkedin'  => '',
        'instagram' => '',
        'youtube'   => ''
    ],

    // Official Microsoft CMT Paper Submission & Peer Review Portal URL
    // Configurable: Set to official Microsoft CMT URL when activated
    'cmt_submission_url' => getenv('CMT_SUBMISSION_URL') ?: '',
    
    // Target countdown date (ISO 8601) - Inactive / pending date confirmation
    'countdown_target' => '2027-04-09T00:00:00Z',

    // Travel & Venue details
    'location_how_to_reach' => 'Connected by air via Chhatrapati Sambhajinagar Airport (IXU), central railway junction, and national expressways with direct connections from Mumbai, Pune, Hyderabad, and Delhi.',

    // Database settings (Optional: environment variables only; public pages operate statically without MySQL)
    'database' => [
        'host'    => getenv('DB_HOST') ?: '',
        'port'    => (int)(getenv('DB_PORT') ?: 3306),
        'name'    => getenv('DB_NAME') ?: '',
        'user'    => getenv('DB_USER') ?: '',
        'pass'    => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
        'charset' => 'utf8mb4'
    ],

    // Security & Environment
    'environment' => getenv('APP_ENV') ?: 'production', // 'development' or 'production'
    'csrf_token_name' => 'csrf_token'
];
    