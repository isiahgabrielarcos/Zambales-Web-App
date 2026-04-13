<?php
$pageTitle = 'Destinations';
include __DIR__ . '/../includes/header.php';

/**
 * pages/destinations.php
 * Lists all Zambales tourist destinations with category filter
 */

$destinations = [
  [
    'name'     => 'Anawangin Cove',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => '🏝 Cove',
    'desc'     => 'A surreal volcanic ash beach framed by ancient agoho pine trees — accessible only by boat from Pundaquit. Camp overnight under the stars for the full experience.',
    'chips'    => ['Camping', 'Boat Trip', 'Photography', 'Swimming'],
    'img'      => 'https://images.unsplash.com/photo-1473116763249-2faaef81ccda?w=700&q=80',
    'alt'      => 'Anawangin Cove with pine trees and calm water',
  ],
  [
    'name'     => 'Nagsasa Cove',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => '🌊 Cove',
    'desc'     => 'A longer, wilder companion to Anawangin — with a freshwater lagoon perfect for swimming and a backdrop of volcanic peaks draped in greenery.',
    'chips'    => ['Camping', 'Boat Trip', 'Snorkelling', 'Lagoon'],
    'img'      => 'https://images.unsplash.com/photo-1540202404-a2f29564651e?w=700&q=80',
    'alt'      => 'Nagsasa Cove white sand and turquoise water',
  ],
  [
    'name'     => 'Mt. Pinatubo',
    'location' => 'Botolan / Capas',
    'category' => 'adventure',
    'tag'      => '🌋 Volcano',
    'desc'     => 'Trek through dramatic lahar canyons and emerald forests to reach one of the world\'s most beautiful crater lakes — a turquoise wonder born from the 1991 eruption.',
    'chips'    => ['Trekking', 'Crater Lake', '4x4 Jeep', 'Photography'],
    'img'      => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=700&q=80',
    'alt'      => 'Mt. Pinatubo crater lake turquoise water aerial view',
  ],
  [
    'name'     => 'Camara Island',
    'location' => 'San Antonio',
    'category' => 'beach',
    'tag'      => '🌴 Island',
    'desc'     => 'A pristine uninhabited island with brilliant white sand and crystalline waters. One of the most rewarding boat trips from San Antonio.',
    'chips'    => ['Island Hopping', 'Snorkelling', 'Swimming', 'Picnic'],
    'img'      => 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?w=700&q=80',
    'alt'      => 'Pristine island with clear blue water',
  ],
  [
    'name'     => 'Iba Beach',
    'location' => 'Iba',
    'category' => 'beach',
    'tag'      => '🌅 Town Beach',
    'desc'     => 'The grey-sand shoreline of the provincial capital is famous for stunning sunsets that paint the West Philippine Sea in shades of gold, orange, and violet.',
    'chips'    => ['Sunset Watching', 'Seafood', 'Swimming', 'Family-Friendly'],
    'img'      => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=700&q=80',
    'alt'      => 'Dramatic sunset over Iba Beach Zambales',
  ],
  [
    'name'     => 'Aeta Cultural Village',
    'location' => 'Subic / Botolan',
    'category' => 'culture',
    'tag'      => '🎋 Indigenous Culture',
    'desc'     => 'Visit a living Aeta community and learn about the Philippines\' original inhabitants — their forest wisdom, traditional crafts, and centuries of resilience.',
    'chips'    => ['Cultural Tour', 'Guided Walk', 'Traditional Crafts', 'Community'],
    'img'      => 'https://images.unsplash.com/photo-1502920514313-52581002a659?w=700&q=80',
    'alt'      => 'Lush highland forest near Aeta community Zambales',
  ],
  [
    'name'     => 'San Narciso Surfing Beach',
    'location' => 'San Narciso',
    'category' => 'adventure',
    'tag'      => '🏄 Surf Spot',
    'desc'     => 'One of the best surfing destinations in the province. Regular swells from October to March make this a favourite for beginners and seasoned surfers alike.',
    'chips'    => ['Surfing', 'Lessons', 'Rentals', 'Beach Camping'],
    'img'      => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=700&q=80',
    'alt'      => 'Surfing at San Narciso Beach Zambales',
  ],
  [
    'name'     => 'Subic Bay Freeport',
    'location' => 'Olongapo / Subic',
    'category' => 'adventure',
    'tag'      => '⚓ Freeport Zone',
    'desc'     => 'Former US naval base turned eco-adventure hub — explore WWII dive wrecks, ziplines through old-growth forest, and world-class yacht facilities.',
    'chips'    => ['Scuba Diving', 'Zipline', 'Wrecks', 'Duty-Free'],
    'img'      => 'https://images.unsplash.com/photo-1502920514313-52581002a659?w=800&q=80',
    'alt'      => 'Subic Bay Freeport Zone aerial view',
  ],
  [
    'name'     => 'Zambales Mango Farm',
    'location' => 'Iba / Palauig',
    'category' => 'culture',
    'tag'      => '🥭 Agri-Tourism',
    'desc'     => 'Tour the famous carabao mango orchards of Zambales — taste the sweetest mangoes in the Philippines straight from the tree and bring home dried mango pasalubong.',
    'chips'    => ['Farm Tour', 'Mango Picking', 'Pasalubong', 'Family'],
    'img'      => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=700&q=80',
    'alt'      => 'Mango orchard in Zambales Philippines',
  ],
];
?>

<!-- ╔══════════════════════════════════════════════════════════╗
     ║  PAGE HERO                                              ║
     ╚══════════════════════════════════════════════════════════╝ -->
<div class="page-hero" role="banner" aria-label="Destinations page hero">
  <div class="page-hero-content">
    <p class="section-label">Discover Zambales</p>
    <h1>All <em style="font-family:var(--ff-display);font-style:italic;color:var(--sand)">Destinations</em></h1>
  </div>
</div>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  FILTER BAR                                             ║
     ╚══════════════════════════════════════════════════════════╝ -->
<div class="filter-bar" role="navigation" aria-label="Category filter">
  <button class="filter-btn active" data-filter="all">All</button>
  <button class="filter-btn" data-filter="beach">🏖 Beaches & Coves</button>
  <button class="filter-btn" data-filter="adventure">⛰ Adventure</button>
  <button class="filter-btn" data-filter="culture">🎋 Culture & Heritage</button>
</div>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  DESTINATIONS GRID                                      ║
     ╚══════════════════════════════════════════════════════════╝ -->
<main class="destinations-grid" aria-label="List of destinations">
  <?php foreach ($destinations as $i => $d): ?>
  <article class="dest-full-card reveal reveal-delay-<?= $i % 3 ?>"
           data-category="<?= htmlspecialchars($d['category']) ?>">
    <div class="img-wrap">
      <img src="<?= htmlspecialchars($d['img']) ?>"
           alt="<?= htmlspecialchars($d['alt']) ?>"
           loading="lazy" />
    </div>
    <div class="dest-full-info">
      <p class="dest-tag"><?= $d['tag'] ?> &bull; <?= htmlspecialchars($d['location']) ?></p>
      <h3><?= htmlspecialchars($d['name']) ?></h3>
      <p><?= htmlspecialchars($d['desc']) ?></p>
      <div class="dest-chips">
        <?php foreach ($d['chips'] as $chip): ?>
        <span class="chip"><?= htmlspecialchars($chip) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </article>
  <?php endforeach; ?>
</main>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  CTA BANNER                                             ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="cta-section" aria-label="Plan your trip">
  <p class="section-label" style="color:rgba(253,248,240,0.7)">Ready?</p>
  <h2 class="section-title" style="font-size:clamp(2rem,4vw,3.5rem)">Let's Plan Your <em>Itinerary</em></h2>
  <p>Tell us where you want to go and we'll take care of the rest.</p>
  <div class="hero-actions" style="justify-content:center;margin-top:0.5rem">
    <a href="contact.php" class="btn btn-primary">Get In Touch</a>
  </div>
</section>


<?php include __DIR__ . '/../includes/footer.php'; ?>