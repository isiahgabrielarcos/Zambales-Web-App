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
    'img'      => 'https://lakbaypinas.com/wp-content/uploads/2025/03/Snapins.ai_420179236_1096035378260191_7599257405318052700_n_1080-1024x537.jpg',
    'alt'      => 'Anawangin Cove with pine trees and calm water',
  ],
  [
    'name'     => 'Nagsasa Cove',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => 'Cove',
    'desc'     => 'A longer, wilder companion to Anawangin — with a freshwater lagoon perfect for swimming and a backdrop of volcanic peaks draped in greenery.',
    'chips'    => ['Camping', 'Boat Trip', 'Snorkelling', 'Lagoon'],
    'img'      => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhNevsbzDhilbMWVkQUI_gZsvDOI0nxQABeieOOX26HxPAP3bPrLq0Ql3NEjmoUVhKKhItmjq3HVSkvoDtNYyrt6nkrnAoSv3oD1OXHHGDCIJBg55IRIIpZjYhxK7aSANrAKpiV-dhR2fU2s3M7bGCzpts_S3uKeoDTXhoiI-Ku0uqAu7zoIE1EHEmd/s2999/1685152721475.jpg',
    'alt'      => 'Nagsasa Cove white sand and turquoise water',
  ],
  [
    'name'     => 'Mt. Pinatubo',
    'location' => 'Botolan / Capas',
    'category' => 'adventure',
    'tag'      => 'Volcano',
    'desc'     => 'Trek through dramatic lahar canyons and emerald forests to reach one of the world\'s most beautiful crater lakes — a turquoise wonder born from the 1991 eruption.',
    'chips'    => ['Trekking', 'Crater Lake', '4x4 Jeep', 'Photography'],
    'img'      => 'https://www.trekkingpinatubo.com/wp-content/uploads/2018/07/1.jpg',
    'alt'      => 'Mt. Pinatubo crater lake turquoise water aerial view',
  ],
  [
    'name'     => 'Camara Island',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => 'Island',
    'desc'     => 'A pristine uninhabited island with brilliant white sand and crystalline waters. One of the most rewarding boat trips from San Antonio.',
    'chips'    => ['Island Hopping', 'Snorkelling', 'Swimming', 'Picnic'],
    'img'      => 'https://upload.wikimedia.org/wikipedia/commons/0/0f/Potipot_Island.jpg',
    'alt'      => 'Pristine island with clear blue water',
  ],
  [
    'name'     => 'Iba Beach',
    'location' => 'Iba',
    'category' => 'beach',
    'tag'      => 'Town Beach',
    'desc'     => 'The grey-sand shoreline of the provincial capital is famous for stunning sunsets that paint the West Philippine Sea in shades of gold, orange, and violet.',
    'chips'    => ['Sunset Watching', 'Seafood', 'Swimming', 'Family-Friendly'],
    'img'      => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/86/ae/35/20160605-125511-hdr-largejpg.jpg?w=900&h=-1&s=1',
    'alt'      => 'Dramatic sunset over Iba Beach Zambales',
  ],
  [
    'name'     => 'Aeta Cultural Village',
    'location' => 'Subic / Botolan',
    'category' => 'culture',
    'tag'      => 'Indigenous Culture',
    'desc'     => 'Visit a living Aeta community and learn about the Philippines\' original inhabitants — their forest wisdom, traditional crafts, and centuries of resilience.',
    'chips'    => ['Cultural Tour', 'Guided Walk', 'Traditional Crafts', 'Community'],
    'img'      => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Aeta_mother_and_child_from_Zambales_in_2024.jpg/960px-Aeta_mother_and_child_from_Zambales_in_2024.jpg',
    'alt'      => 'Lush highland forest near Aeta community Zambales',
  ],
  [
    'name'     => 'San Narciso Surfing Beach',
    'location' => 'San Narciso',
    'category' => 'adventure',
    'tag'      => 'Surf Spot',
    'desc'     => 'One of the best surfing destinations in the province. Regular swells from October to March make this a favourite for beginners and seasoned surfers alike.',
    'chips'    => ['Surfing', 'Lessons', 'Rentals', 'Beach Camping'],
    'img'      => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Beach_San_Felipe_Zambales.jpg',
    'alt'      => 'Surfing at San Narciso Beach Zambales',
  ],
  [
    'name'     => 'Subic Bay Freeport',
    'location' => 'Olongapo / Subic',
    'category' => 'adventure',
    'tag'      => 'Freeport Zone',
    'desc'     => 'Former US naval base turned eco-adventure hub — explore WWII dive wrecks, ziplines through old-growth forest, and world-class yacht facilities.',
    'chips'    => ['Scuba Diving', 'Zipline', 'Wrecks', 'Duty-Free'],
    'img'      => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/SBMA_Beach_in_Subic_Bay%2C_Zambales.jpg',
    'alt'      => 'Subic Bay Freeport Zone aerial view',
  ],
  [
    'name'     => 'Zambales Mango Farm',
    'location' => 'Iba / Palauig',
    'category' => 'culture',
    'tag'      => 'Agri-Tourism',
    'desc'     => 'Tour the famous carabao mango orchards of Zambales — taste the sweetest mangoes in the Philippines straight from the tree and bring home dried mango pasalubong.',
    'chips'    => ['Farm Tour', 'Mango Picking', 'Pasalubong', 'Family'],
    'img'      => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Mango_Carabao_Asit_fs8.jpg/960px-Mango_Carabao_Asit_fs8.jpg',
    'alt'      => 'Mango orchard in Zambales Philippines',
  ],
];

echo json_encode(
    ['success' => true, 'data' => $destinations],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
);
