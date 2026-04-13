<?php
/**
 * includes/footer.php
 * Reusable footer for Zambales Tourism
 */

$isSubPage = strpos($_SERVER['PHP_SELF'], '/pages/') !== false;
$assetPath = $isSubPage ? '../assets/' : 'assets/';
$rootPath  = $isSubPage ? '../' : '';
$currentYear = date('Y');
?>

<!-- ── FOOTER ──────────────────────────────────────────────── -->
<footer role="contentinfo">
  <div class="footer-top">

    <!-- Brand -->
    <div class="footer-brand">
      <div class="nav-logo">⛵ Zam<span style="color:var(--coral)">bales</span></div>
      <p>
        Discover the unspoiled beauty of Zambales — a province where rugged mountains
        meet pristine shores, and Aeta heritage echoes through every hillside.
      </p>
      <div class="footer-socials" style="margin-top:1.5rem">
        <a href="#" class="social-btn" aria-label="Facebook">f</a>
        <a href="#" class="social-btn" aria-label="Instagram">in</a>
        <a href="#" class="social-btn" aria-label="Twitter / X">𝕏</a>
        <a href="#" class="social-btn" aria-label="YouTube">▶</a>
      </div>
    </div>

    <!-- Explore -->
    <div class="footer-col">
      <h4>Explore</h4>
      <a href="<?= $rootPath ?>pages/destinations.php">All Destinations</a>
      <a href="<?= $rootPath ?>index.php#experiences">Experiences</a>
      <a href="<?= $rootPath ?>index.php#about">About Zambales</a>
      <a href="<?= $rootPath ?>index.php#gallery">Gallery</a>
    </div>

    <!-- Travel Info -->
    <div class="footer-col">
      <h4>Travel Info</h4>
      <a href="<?= $rootPath ?>index.php#tips">Travel Tips</a>
      <a href="<?= $rootPath ?>pages/destinations.php?filter=beach">Beaches</a>
      <a href="<?= $rootPath ?>pages/destinations.php?filter=adventure">Adventure</a>
      <a href="<?= $rootPath ?>pages/destinations.php?filter=culture">Culture</a>
    </div>

    <!-- Contact -->
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="<?= $rootPath ?>pages/contact.php">Get in Touch</a>
      <a href="mailto:info@zambales-tourism.ph">info@zambales-tourism.ph</a>
      <a href="tel:+6347000000">+63 47 000 0000</a>
      <a href="#">Tourism Office</a>
    </div>

  </div><!-- /.footer-top -->

  <div class="footer-bottom">
    <p>
      &copy; <?= $currentYear ?> Zambales Tourism &mdash; Province of Zambales, Philippines.
      All rights reserved.
    </p>
    <p style="color:rgba(253,248,240,0.2); font-size:0.72rem;">
      Built with ♡ for Zambaleños and travellers alike.
    </p>
  </div>
</footer>

<!-- ── SCRIPTS ─────────────────────────────────────────────── -->
<script src="<?= $assetPath ?>js/main.js" defer></script>
</body>
</html>