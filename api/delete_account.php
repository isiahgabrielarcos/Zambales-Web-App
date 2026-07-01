<?php
/**
 * api/delete_account.php
 * POST endpoint — permanently deletes a user profile from the database system.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed.']);
    exit;
}

require_once __DIR__ . '/config/db.php';

$email = trim($_POST['email'] ?? '');

if ($email === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'User identity email parameters are missing.']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        http_response_code(404);
        echo json_encode(['success' => false, 'error' => 'Account target profile not found.']);
        exit;
    }

    $delete_stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $delete_stmt->execute([$user['id']]);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();

    echo json_encode(['success' => true]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database operation error: ' . $e->getMessage()]);
}