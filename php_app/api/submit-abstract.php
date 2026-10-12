<?php
/**
 * API Endpoint: Paper / Abstract Submission
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

// CSRF validation
$csrf = $input['csrf_token'] ?? '';
if (!verify_csrf_token($csrf)) {
    json_response(['success' => false, 'message' => 'Invalid or expired security token.'], 403);
}

$authorName   = trim($input['author_name'] ?? '');
$email        = trim($input['email'] ?? '');
$phone        = trim($input['phone'] ?? '');
$affiliation  = trim($input['affiliation'] ?? '');
$trackId      = (int)($input['track_id'] ?? 1);
$paperTitle   = trim($input['paper_title'] ?? '');
$abstractText = trim($input['abstract_text'] ?? '');
$keywords     = trim($input['keywords'] ?? '');

$trackNames = [
    1 => 'Sustainable Energy Systems and Decarbonization Technologies',
    2 => 'Smart and Sustainable Built Environments',
    3 => 'Sustainable Manufacturing and Circular Economy',
    4 => 'Artificial Intelligence and Digital Technologies for Sustainability',
    5 => 'Climate Change, Environmental Management and Resource Sustainability',
    6 => 'Sustainable Transportation and Resilient Infrastructure Systems',
];

if (strlen($authorName) < 2) {
    json_response(['success' => false, 'message' => 'Please provide the primary author name.'], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['success' => false, 'message' => 'Please provide a valid email address.'], 422);
}

if (strlen($paperTitle) < 5 || strlen($paperTitle) > 300) {
    json_response(['success' => false, 'message' => 'Paper title must be between 5 and 300 characters.'], 422);
}

if (strlen($abstractText) < 30) {
    json_response(['success' => false, 'message' => 'Abstract text must be at least 30 characters.'], 422);
}

if (!isset($trackNames[$trackId])) {
    $trackId = 1;
}
$trackName = $trackNames[$trackId];

$submissionCode = 'SANKALP-T' . $trackId . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));

$pdo = get_db_connection();
if ($pdo !== null) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO paper_submissions 
            (submission_code, author_name, email, phone, affiliation, track_id, track_name, paper_title, abstract_text, keywords)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $submissionCode,
            $authorName,
            $email,
            $phone,
            $affiliation,
            $trackId,
            $trackName,
            $paperTitle,
            $abstractText,
            $keywords
        ]);
    } catch (PDOException $e) {
        error_log("Paper DB write error: " . $e->getMessage());
    }
}

json_response([
    'success'         => true,
    'message'         => 'Paper abstract submitted successfully for peer review!',
    'submission_code' => $submissionCode,
    'track'           => $trackName,
    'title'           => $paperTitle
], 200);
