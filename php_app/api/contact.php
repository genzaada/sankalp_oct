<?php
/**
 * API Endpoint: Contact Inquiries
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

$name    = trim($input['name'] ?? '');
$email   = trim($input['email'] ?? '');
$subject = trim($input['subject'] ?? 'General Inquiry');
$message = trim($input['message'] ?? '');

if (strlen($name) < 2) {
    json_response(['success' => false, 'message' => 'Please enter your name.'], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => 'Please enter a valid email address.'], 422);
}

if (strlen($message) < 5) {
    json_response(['success' => false, 'message' => 'Please enter a message.'], 422);
}

$pdo = get_db_connection();
if ($pdo !== null) {
    try {
        $stmt = $pdo->prepare("INSERT INTO contact_inquiries (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
    } catch (PDOException $e) {
        error_log("Contact DB error: " . $e->getMessage());
    }
}

json_response([
    'success' => true,
    'message' => 'Thank you for reaching out! The organizing committee will get back to you shortly.'
], 200);
