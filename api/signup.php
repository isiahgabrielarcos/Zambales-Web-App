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

// Isama ang db connection file running on port 3307
require_once __DIR__ . '/config/db.php';

// Kolektahin ang data mula sa form inputs
$name             = trim($_POST['name'] ?? '');
$email            = trim($_POST['email'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$password         = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$errors = [];

// Server-side safety verification checks
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

// Kung may nakitang basic field validation validation errors, huminto agad dito
if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    // 1. Check muna natin kung may kaparehong email na rehistrado sa users table
    $check_stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $check_stmt->execute([$email]);
    
    if ($check_stmt->fetch()) {
        http_response_code(422);
        echo json_encode(['success' => false, 'errors' => ['That email address is already registered.']]);
        exit;
    }

    // 2. 💡 Ang "Scrambler Machine" (Password Hashing Hashing)
    // Huwag isasaksak ang plain text password sa database. Gagamit tayo ng password_hash() 
    // na gumagawa ng permanenteng unreadable character mix.
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 3. I-insert ang bagong secure account record sa database rows natin
    $insert_stmt = $pdo->prepare(
        'INSERT INTO users (name, email, phone, password_hash) VALUES (?, ?, ?, ?)'
    );
    
    $insert_stmt->execute([$name, $email, $phone, $password_hash]);

    // Magpadala ng successful JSON reply pabalik sa user interface
    echo json_encode(['success' => true]);

} catch (PDOException $e) {
    http_response_code(500);
    // Ipapakita nito ang exact server error kung sakaling magka-glitch
    echo json_encode(['success' => false, 'errors' => ['Database Error: ' . $e->getMessage()]]);
    exit;
}