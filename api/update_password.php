<?php
/**
 * api/update_password.php
 * POST endpoint — validates old password and modifies it with a new secure hash.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed.']);
    exit;
}

// Isama ang ating database link file na tumatakbo sa Port 3307
require_once __DIR__ . '/config/db.php';

$email        = trim($_POST['email'] ?? '');
$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';

if ($email === '' || $old_password === '' || $new_password === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'All fields are strictly required.']);
    exit;
}

if (strlen($new_password) < 8) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'New password must be at least 8 characters long.']);
    exit;
}

try {
    // 1. Hanapin muna natin ang record ng user gamit ang email niya
    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        http_response_code(404);
        echo json_encode(['success' => false, 'error' => 'User profile record not found.']);
        exit;
    }

    // 2. I-verify natin kung tama ba ang nilagay niyang 'Current Password'
    if (!password_verify($old_password, $user['password_hash'])) {
        http_response_code(401);
        // Sinasabi natin sa frontend kung anong field ang may mali para maganda ang validation error display
        echo json_encode([
            'success' => false, 
            'field' => 'old_password', 
            'error' => 'Incorrect current password.'
        ]);
        exit;
    }

    // 3. 🛡️ Scramble time! Gawing secure hash string ang inyong bagong password
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    // 4. THE UPDATE STATEMENT: Palitan na ang nakatagong string sa MySQL rows
    $update_stmt = $pdo->prepare('UPDATE users SET password_hash = ? WHERE id = ?');
    $update_stmt->execute([$new_password_hash, $user['id']]);

    // Mag-reply ng success status pabalik sa browser screen natin!
    echo json_encode(['success' => true]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database update error: ' . $e->getMessage()]);
}