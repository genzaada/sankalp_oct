<?php
/**
 * API Endpoint: Conference Registration
 */

header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed.'], 405);
}

// Read inputs (support form data & JSON)
$input = $_POST;
if (empty($input)) {
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true) ?? [];
}

// CSRF check
$csrf = $input['csrf_token'] ?? '';
if (!verify_csrf_token($csrf)) {
    json_response(['success' => false, 'message' => 'Invalid or expired security token. Please refresh the page.'], 403);
}

// Input validation
$fullName    = trim($input['full_name'] ?? '');
$email       = trim($input['email'] ?? '');
$phone       = trim($input['phone'] ?? '');
$institution = trim($input['institution'] ?? '');
$category    = trim($input['category'] ?? '');
$regType     = trim($input['registration_type'] ?? 'early_bird');
$paperId     = trim($input['paper_id'] ?? '');

$validCategories = ['Students', 'Research Scholars', 'Academicians', 'Industry / Others'];
$validTypes      = ['early_bird', 'regular', 'spot'];

if (strlen($fullName) < 2 || strlen($fullName) > 150) {
    json_response(['success' => false, 'message' => 'Please provide a valid full name.'], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => 'Please provide a valid email address.'], 422);
}

if (strlen($phone) < 7 || strlen($phone) > 25) {
    json_response(['success' => false, 'message' => 'Please provide a valid contact phone number.'], 422);
}

if (strlen($institution) < 2) {
    json_response(['success' => false, 'message' => 'Please provide your institution/organization name.'], 422);
}

if (!in_array($category, $validCategories, true)) {
    json_response(['success' => false, 'message' => 'Invalid registration category selected.'], 422);
}

if (!in_array($regType, $validTypes, true)) {
    $regType = 'early_bird';
}

// Determine fee amount
$feesTable = [
    'Students'          => ['early_bird' => '₹1,500', 'regular' => '₹2,000', 'spot' => '₹2,500'],
    'Research Scholars' => ['early_bird' => '₹2,000', 'regular' => '₹2,580', 'spot' => '₹3,000'],
    'Academicians'      => ['early_bird' => '₹2,500', 'regular' => '₹3,000', 'spot' => '₹3,500'],
    'Industry / Others' => ['early_bird' => '₹3,000', 'regular' => '₹3,580', 'spot' => '₹4,000'],
];
$feeAmount = $feesTable[$category][$regType] ?? '₹2,000';

// Generate unique registration reference
$regCode = 'SANKALP-REG-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));

$pdo = get_db_connection();
if ($pdo !== null) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO conference_registrations 
            (registration_code, full_name, email, phone, institution, category, registration_type, fee_amount, paper_id, ip_address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $regCode,
            $fullName,
            $email,
            $phone,
            $institution,
            $category,
            $regType,
            $feeAmount,
            $paperId ?: null,
            $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
        ]);
    } catch (PDOException $e) {
        error_log("Registration DB write error: " . $e->getMessage());
        // Fallback: Proceed so conference attendee registration does not get blocked
    }
}

json_response([
    'success'           => true,
    'message'           => 'Registration initiated successfully!',
    'registration_code' => $regCode,
    'fee_amount'        => $feeAmount,
    'attendee'          => $fullName,
    'category'          => $category
], 200);
