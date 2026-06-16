<?php
/**
 * api/contact.php
 * POST endpoint — receives the trip inquiry form and returns JSON.
 *
 * Usage:   POST /api/contact.php  (multipart/form-data or x-www-form-urlencoded)
 * Returns: { "success": true,  "name": "..." }
 *      or  { "success": false, "errors": ["...", ...] }
 *
 * Values are stored/returned raw — escape on output (the frontend uses
 * textContent, and SQL uses prepared statements).
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'errors' => ['Method not allowed. Use POST.']]);
    exit;
}

// ── Collect & validate input ─────────────────────────────────
$name    = trim($_POST['name']     ?? '');
$email   = trim($_POST['email']    ?? '');
$phone   = trim($_POST['phone']    ?? '');
$type    = trim($_POST['triptype'] ?? '');
$guests  = (int)($_POST['guests']  ?? 1);
$dates   = trim($_POST['dates']    ?? '');
$message = trim($_POST['message']  ?? '');

$errors = [];
if ($name === '')                               $errors[] = 'Name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
if ($message === '')                            $errors[] = 'Please write a message.';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors], JSON_UNESCAPED_UNICODE);
    exit;
}

// ── Collect & validate input ─────────────────────────────────
// We read the exact name tags used inside your contact.html form
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];
if ($name === '')                               $errors[] = 'Name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
if ($message === '')                            $errors[] = 'Please write a message.';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors], JSON_UNESCAPED_UNICODE);
    exit;
}

// ── Persist / deliver the inquiry ────────────────────────────
try {
    // Include our database connection file
    require_once __DIR__ . '/config/db.php';
    
    // Prepare a safe template slot for our new columns
    $stmt = $pdo->prepare(
        'INSERT INTO inquiries (name, email, subject, message, created_at)
         VALUES (?, ?, ?, ?, NOW())'
    );
    
    // Execute the insertion with our aligned feedback variables
    $stmt->execute([$name, $email, $subject, $message]);

} catch (PDOException $e) {
    http_response_code(500);
    // If you are developing locally, this will show you the exact MySQL error
    echo json_encode(['success' => false, 'errors' => ['SQL Error: ' . $e->getMessage()]]);
    exit;
}

// Send a successful JSON response back to the user interface
echo json_encode(['success' => true, 'name' => $name], JSON_UNESCAPED_UNICODE);