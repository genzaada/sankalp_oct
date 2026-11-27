<?php
/**
 * API Endpoint: Newsletter Subscription (Retired)
 * ICAIESF 2027 operates as a static informational portal.
 */

http_response_code(410);
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

echo json_encode([
    'success' => false,
    'status'  => 410,
    'message' => 'The newsletter subscription endpoint has been retired for ICAIESF 2027. Official updates and announcements are published directly on the conference portal.'
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
exit;
