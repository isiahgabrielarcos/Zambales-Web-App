<?php
/**
 * api/signup.php
 * POST endpoint — receives the account registration form parameters.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'errors' => ['Method not allowed. Use POST.']]);
    exit;
}

require_once __DIR__ . '/config/db.php';

$name             = trim($_POST['name'] ?? '');
$email            = trim($_POST['email'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$password         = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$errors = [];

if ($name === '') {
    $errors[] = 'Full name is required.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if ($phone === '') {
    $errors[] = 'Phone number is required.';
}
if (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters long.';
}
if ($password !== $confirm_password) {
    $errors[] = 'Passwords do not match.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $check_stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $check_stmt->execute([$email]);

    if ($check_stmt->fetch()) {
        http_response_code(422);
        echo json_encode(['success' => false, 'errors' => ['That email address is already registered.']]);
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $insert_stmt = $pdo->prepare(
        'INSERT INTO users (name, email, phone, password_hash) VALUES (?, ?, ?, ?)'
    );
    $insert_stmt->execute([$name, $email, $phone, $password_hash]);

    echo json_encode(['success' => true]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'errors' => ['Database Error: ' . $e->getMessage()]]);
    exit;
}