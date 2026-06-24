<?php
/**
 * api/reviews.php
 * POST endpoint — submits a review for an accommodation.
 * Requires an authenticated session (set by api/login.php); the reviewer's
 * name always comes from the session/users table, never from client input.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed. Use POST.']);
    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'You must be signed in to leave a review.']);
    exit;
}

require_once __DIR__ . '/config/db.php';

$accommodation_id = (int) ($_POST['accommodation_id'] ?? 0);
$rating            = (int) ($_POST['rating'] ?? 0);
$comment           = trim($_POST['comment'] ?? '');

$errors = [];
if ($accommodation_id <= 0) {
    $errors[] = 'A valid accommodation is required.';
}
if ($rating < 1 || $rating > 5) {
    $errors[] = 'Rating must be between 1 and 5.';
}
if ($comment === '') {
    $errors[] = 'Review comment is required.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $check = $pdo->prepare('SELECT id FROM accommodations WHERE id = ?');
    $check->execute([$accommodation_id]);
    if (!$check->fetch()) {
        http_response_code(404);
        echo json_encode(['success' => false, 'error' => 'Accommodation not found.']);
        exit;
    }

    $stmt = $pdo->prepare(
        'INSERT INTO reviews (accommodation_id, user_id, rating, comment) VALUES (?, ?, ?, ?)'
    );
    $stmt->execute([$accommodation_id, $_SESSION['user_id'], $rating, $comment]);

    echo json_encode([
        'success' => true,
        'review'  => [
            'id'         => (int) $pdo->lastInsertId(),
            'user_name'  => $_SESSION['user_name'],
            'rating'     => $rating,
            'comment'    => $comment,
            'created_at' => date('Y-m-d H:i:s'),
        ],
    ]);

} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        http_response_code(409);
        echo json_encode(['success' => false, 'error' => 'You\'ve already reviewed this accommodation.']);
        exit;
    }
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
