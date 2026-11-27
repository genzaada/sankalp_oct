<?php
/**
 * API Endpoint: Contact Inquiries (Retired)
 * ICAIESF 2027 operates as a static informational portal.
 */

http_response_code(410);
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

echo json_encode([
    'success' => false,
    'status'  => 410,
    'message' => 'The contact API endpoint has been retired for ICAIESF 2027. Please reach out to the organizing committee via official email at directorsoet@mgmu.ac.in.'
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
exit;
