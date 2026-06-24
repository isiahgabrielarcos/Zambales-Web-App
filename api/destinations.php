<?php
/**
 * api/destinations.php
 * GET endpoint — returns all Zambales tourist destinations as JSON.
 *
 * Usage:   GET /api/destinations.php
 * Returns: { "success": true, "data": [ {name, location, category, ...}, ... ] }
 *
 * Later this array can be replaced with a database query, e.g.:
 *   require_once __DIR__ . '/config/db.php';
 *   $destinations = $pdo->query('SELECT * FROM destinations')->fetchAll();
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed. Use GET.']);
    exit;
}

$destinations = [
  [
    'name'     => 'Anawangin Cove',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => 'Cove',
    'desc'     => 'A surreal volcanic ash beach framed by ancient agoho pine trees — accessible only by boat from Pundaquit. Camp overnight under the stars for the full experience.',
    'chips'    => ['Camping', 'Boat Trip', 'Photography', 'Swimming'],
    'img'      => 'https://images.unsplash.com/photo-1473116763249-2faaef81ccda?w=700&q=80',
    'alt'      => 'Anawangin Cove with pine trees and calm water',
  ],
  [
    'name'     => 'Nagsasa Cove',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => 'Cove',
    'desc'     => 'A longer, wilder companion to Anawangin — with a freshwater lagoon perfect for swimming and a backdrop of volcanic peaks draped in greenery.',
    'chips'    => ['Camping', 'Boat Trip', 'Snorkelling', 'Lagoon'],
    'img'      => 'https://images.unsplash.com/photo-1540202404-a2f29564651e?w=700&q=80',
    'alt'      => 'Nagsasa Cove white sand and turquoise water',
  ],
  [
    'name'     => 'Mt. Pinatubo',
    'location' => 'Botolan / Capas',
    'category' => 'adventure',
    'tag'      => 'Volcano',
    'desc'     => 'Trek through dramatic lahar canyons and emerald forests to reach one of the world\'s most beautiful crater lakes — a turquoise wonder born from the 1991 eruption.',
    'chips'    => ['Trekking', 'Crater Lake', '4x4 Jeep', 'Photography'],
    'img'      => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=700&q=80',
    'alt'      => 'Mt. Pinatubo crater lake turquoise water aerial view',
  ],
  [
    'name'     => 'Camara Island',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => 'Island',
    'desc'     => 'A pristine uninhabited island with brilliant white sand and crystalline waters. One of the most rewarding boat trips from San Antonio.',
    'chips'    => ['Island Hopping', 'Snorkelling', 'Swimming', 'Picnic'],
    'img'      => 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?w=700&q=80',
    'alt'      => 'Pristine island with clear blue water',
  ],
  [
    'name'     => 'Iba Beach',
    'location' => 'Iba',
    'category' => 'beach',
    'tag'      => 'Town Beach',
    'desc'     => 'The grey-sand shoreline of the provincial capital is famous for stunning sunsets that paint the West Philippine Sea in shades of gold, orange, and violet.',
    'chips'    => ['Sunset Watching', 'Seafood', 'Swimming', 'Family-Friendly'],
    'img'      => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=700&q=80',
    'alt'      => 'Dramatic sunset over Iba Beach Zambales',
  ],
  [
    'name'     => 'Aeta Cultural Village',
    'location' => 'Subic / Botolan',
    'category' => 'culture',
    'tag'      => 'Indigenous Culture',
    'desc'     => 'Visit a living Aeta community and learn about the Philippines\' original inhabitants — their forest wisdom, traditional crafts, and centuries of resilience.',
    'chips'    => ['Cultural Tour', 'Guided Walk', 'Traditional Crafts', 'Community'],
    'img'      => 'https://images.unsplash.com/photo-1502920514313-52581002a659?w=700&q=80',
    'alt'      => 'Lush highland forest near Aeta community Zambales',
  ],
  [
    'name'     => 'San Narciso Surfing Beach',
    'location' => 'San Narciso',
    'category' => 'adventure',
    'tag'      => 'Surf Spot',
    'desc'     => 'One of the best surfing destinations in the province. Regular swells from October to March make this a favourite for beginners and seasoned surfers alike.',
    'chips'    => ['Surfing', 'Lessons', 'Rentals', 'Beach Camping'],
    'img'      => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=700&q=80',
    'alt'      => 'Surfing at San Narciso Beach Zambales',
  ],
  [
    'name'     => 'Subic Bay Freeport',
    'location' => 'Olongapo / Subic',
    'category' => 'adventure',
    'tag'      => 'Freeport Zone',
    'desc'     => 'Former US naval base turned eco-adventure hub — explore WWII dive wrecks, ziplines through old-growth forest, and world-class yacht facilities.',
    'chips'    => ['Scuba Diving', 'Zipline', 'Wrecks', 'Duty-Free'],
    'img'      => 'https://images.unsplash.com/photo-1502920514313-52581002a659?w=800&q=80',
    'alt'      => 'Subic Bay Freeport Zone aerial view',
  ],
  [
    'name'     => 'Zambales Mango Farm',
    'location' => 'Iba / Palauig',
    'category' => 'culture',
    'tag'      => 'Agri-Tourism',
    'desc'     => 'Tour the famous carabao mango orchards of Zambales — taste the sweetest mangoes in the Philippines straight from the tree and bring home dried mango pasalubong.',
    'chips'    => ['Farm Tour', 'Mango Picking', 'Pasalubong', 'Family'],
    'img'      => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=700&q=80',
    'alt'      => 'Mango orchard in Zambales Philippines',
  ],
];

echo json_encode(
    ['success' => true, 'data' => $destinations],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
);
