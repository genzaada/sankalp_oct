<?php
/**
 * API Endpoint: Newsletter Subscription
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed.'], 405);
}

$input = $_POST;
if (empty($input)) {
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true) ?? [];
}

$email = trim($input['email'] ?? '');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => 'Please provide a valid email address.'], 422);
}

$pdo = get_db_connection();
if ($pdo !== null) {
    try {
        $stmt = $pdo->prepare("INSERT IGNORE INTO newsletter_subscribers (email) VALUES (?)");
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        error_log("Newsletter DB error: " . $e->getMessage());
    }
}

json_response([
    'success' => true,
    'message' => 'Thank you! You have subscribed to SANKALP 2027 conference updates.'
], 200);
