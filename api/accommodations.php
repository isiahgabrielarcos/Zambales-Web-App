<?php
/**
 * api/accommodations.php
 * GET endpoint — returns all accommodations, each with its list of reviews
 * (reviewer name comes from the users table, never from client input).
 *
 * Usage:   GET /api/accommodations.php
 * Returns: { "success": true, "data": [ {id, name, type, ..., reviews: [...]}, ... ] }
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed. Use GET.']);
    exit;
}

require_once __DIR__ . '/config/db.php';

try {
    $accommodations = $pdo->query(
        'SELECT id, name, type, description, location, image_url, stars, website_url, maps_url
         FROM accommodations ORDER BY id'
    )->fetchAll();

    $reviews = $pdo->query(
        'SELECT r.id, r.accommodation_id, r.rating, r.comment, r.created_at, u.name AS user_name
         FROM reviews r
         JOIN users u ON u.id = r.user_id
         ORDER BY r.created_at DESC'
    )->fetchAll();

    $reviewsByAccommodation = [];
    foreach ($reviews as $review) {
        $reviewsByAccommodation[$review['accommodation_id']][] = [
            'id'         => (int) $review['id'],
            'user_name'  => $review['user_name'],
            'rating'     => (int) $review['rating'],
            'comment'    => $review['comment'],
            'created_at' => $review['created_at'],
        ];
    }

    foreach ($accommodations as &$accommodation) {
        $accommodation['id']    = (int) $accommodation['id'];
        $accommodation['stars'] = (int) $accommodation['stars'];
        $accommodation['reviews'] = $reviewsByAccommodation[$accommodation['id']] ?? [];
    }

    echo json_encode(['success' => true, 'data' => $accommodations], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
