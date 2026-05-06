<?php
/**
 * includes/header.php
 * Reusable navigation bar for Zambales Tourism
 *
 * Usage: include __DIR__ . '/../includes/header.php';
 *        $pageTitle = 'Page Name'; // Set before including
 */

$currentPage = basename($_SERVER['PHP_SELF']);
function navActive(string $page, string $current): string {
    return $page === $current ? ' active' : '';
}

// Determine the correct asset path based on depth
$isSubPage = strpos($_SERVER['PHP_SELF'], '/pages/') !== false;
$assetPath = $isSubPage ? '../assets/' : 'assets/';
$rootPath  = $isSubPage ? '../' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Discover the unspoiled shores, rich culture, and breathtaking landscapes of Zambales, Philippines." />
  <meta property="og:title"       content="<?= htmlspecialchars($pageTitle ?? 'Zambales Tourism') ?>" />
  <meta property="og:description" content="Explore Zambales — white sand beaches, Aeta culture, and adventure awaits." />
  <meta property="og:type"        content="website" />

  <title><?= htmlspecialchars($pageTitle ?? 'Zambales Tourism') ?> | Zambales, Philippines</title>

  <!-- Favicon placeholder -->
  <link rel="icon" href="<?= $rootPath ?>assets/images/favicon.ico" type="image/x-icon" />

  <!-- Main stylesheet -->
  <link rel="stylesheet" href="<?= $assetPath ?>css/style.css" />
</head>
<body>

<!-- ── MOBILE MENU ────────────────────────────────────── -->
<div class="mobile-menu" id="mobile-menu">
  <span class="mobile-close" id="mobile-close" aria-label="Close menu">✕</span>
  <a href="<?= $rootPath ?>index.php">Home</a>
  <a href="<?= $rootPath ?>pages/destinations.php">Destinations</a>
  <a href="<?= $rootPath ?>index.php#experiences">Experiences</a>
  <a href="<?= $rootPath ?>index.php#about">About</a>
  <a href="<?= $rootPath ?>pages/contact.php">Contact</a>
</div>

<!-- ── NAVIGATION ─────────────────────────────────────── -->
<nav class="nav" id="main-nav" role="navigation" aria-label="Main navigation">
  <a href="<?= $rootPath ?>index.php" class="nav-logo" aria-label="Zambales Tourism Home">
    ⛵ Zam<span>bales</span>
  </a>

  <ul class="nav-links" role="list">
    <li><a href="<?= $rootPath ?>index.php"
           class="<?= navActive('index.php', $currentPage) ?>">Home</a></li>
    <li><a href="<?= $rootPath ?>pages/destinations.php"
           class="<?= navActive('destinations.php', $currentPage) ?>">Destinations</a></li>
    <li><a href="<?= $rootPath ?>index.php#experiences">Experiences</a></li>
    <li><a href="<?= $rootPath ?>index.php#about">About</a></li>
    <li><a href="<?= $rootPath ?>pages/contact.php"
           class="nav-cta <?= navActive('contact.php', $currentPage) ?>">Plan Your Trip</a></li>
  </ul>

  <button class="nav-hamburger" id="nav-hamburger"
          aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
    <span></span><span></span><span></span>
  </button>
</nav>