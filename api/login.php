<?php
/**
 * api/login.php
 * POST endpoint — validates login credentials against the database.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed.']);
    exit;
}

require_once __DIR__ . '/config/db.php';

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'Email and password are required.']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
        exit;
    }

    if (password_verify($password, $user['password_hash'])) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        echo json_encode([
            'success' => true,
            'user' => [
                'name'  => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone']
            ]
        ]);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database failure: ' . $e->getMessage()]);
}