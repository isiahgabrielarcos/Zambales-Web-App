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

// Include our database credentials running on Port 3307
require_once __DIR__ . '/config/db.php';

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'Email and password are required.']);
    exit;
}

try {
    // Look up if this email exists inside our logs
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verification check: If the email wasn't found, stop immediately
    if (!$user) {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
        exit;
    }

    // 💡 The Key Verification Step
    // password_verify() automatically takes the plain text input ($password),
    // hashes it, and checks if it fits the safe mold stored in ($user['password_hash'])
    if (password_verify($password, $user['password_hash'])) {
        
        // Start a secure server-side verification tracking token
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        // Return a success approval token and basic user traits back to the layout
        echo json_encode([
            'success' => true,
            'user' => [
                'name'  => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone']
            ]
        ]);
    } else {
        // Passwords don't match!
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database failure: ' . $e->getMessage()]);
}