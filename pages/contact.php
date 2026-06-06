<?php
$pageTitle = 'Contact';
include __DIR__ . '/../includes/header.php';

/**
 * pages/contact.php
 * Contact page with inquiry form
 * In production, connect to db.php and/or use PHPMailer for email delivery
 */

$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Basic sanitisation & validation
  $name    = trim(htmlspecialchars($_POST['name']    ?? ''));
  $email   = trim(htmlspecialchars($_POST['email']   ?? ''));
  $phone   = trim(htmlspecialchars($_POST['phone']   ?? ''));
  $type    = trim(htmlspecialchars($_POST['triptype'] ?? ''));
  $guests  = (int)($_POST['guests'] ?? 1);
  $dates   = trim(htmlspecialchars($_POST['dates']   ?? ''));
  $message = trim(htmlspecialchars($_POST['message'] ?? ''));

  if (empty($name))                      $errors[] = 'Name is required.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
  if (empty($message))                   $errors[] = 'Please write a message.';

  if (empty($errors)) {
    /*
     * TODO: Save to database or send email:
     *
     * require_once __DIR__ . '/../config/db.php';
     * $stmt = $pdo->prepare(
     *   'INSERT INTO inquiries (name,email,phone,trip_type,guests,preferred_dates,message,created_at)
     *    VALUES (?,?,?,?,?,?,?,NOW())'
     * );
     * $stmt->execute([$name,$email,$phone,$type,$guests,$dates,$message]);
     *
     * // Or send via PHPMailer / wp_mail / sendmail
     */
    $success = true;
  }
}
?>

<div style="height:72px"></div><!-- nav offset -->

<!-- ╔══════════════════════════════════════════════════════════╗
     ║  CONTACT LAYOUT                                         ║
     ╚══════════════════════════════════════════════════════════╝ -->
<main class="contact-section" aria-label="Contact and inquiry form">

  <!-- ── LEFT SIDEBAR ──────────────────────────────────────── -->
  <aside class="contact-sidebar">
    <p class="section-label">Get In Touch</p>
    <h2 class="section-title">Plan Your<br><em>Zambales Trip</em></h2>
    <p>
      Whether you're dreaming of a beach weekend, a Pinatubo adventure, or a full
      cultural immersion — we're here to help you craft the perfect itinerary.
    </p>

    <div class="contact-info-item">
      <div class="ci-icon">📍</div>
      <div>
        <div class="ci-label">Location</div>
        <div class="ci-val">Provincial Capitol, Iba<br>Zambales 2201, Philippines</div>
      </div>
    </div>

    <div class="contact-info-item">
      <div class="ci-icon">📞</div>
      <div>
        <div class="ci-label">Phone</div>
        <div class="ci-val">+63 47 000 0000<br>+63 912 345 6789</div>
      </div>
    </div>

    <div class="contact-info-item">
      <div class="ci-icon">✉️</div>
      <div>
        <div class="ci-label">Email</div>
        <div class="ci-val">info@zambales-tourism.ph<br>inquiries@zambales-tourism.ph</div>
      </div>
    </div>

    <div class="contact-info-item">
      <div class="ci-icon">🕘</div>
      <div>
        <div class="ci-label">Office Hours</div>
        <div class="ci-val">Monday – Friday<br>8:00 AM – 5:00 PM (PHT)</div>
      </div>
    </div>
  </aside>

  <!-- ── FORM ──────────────────────────────────────────────── -->
  <div class="contact-form-wrap">

    <?php if ($success): ?>
    <!-- Success state -->
    <div style="text-align:center;padding:4rem 0">
      <div style="font-size:3.5rem;margin-bottom:1.2rem">🌊</div>
      <h2 style="font-family:var(--ff-display);font-size:2.2rem;color:var(--ocean);margin-bottom:0.8rem">
        Your message is on its way!
      </h2>
      <p style="color:var(--stone);margin-bottom:2rem;font-size:0.95rem;line-height:1.7">
        Thanks for reaching out, <strong><?= htmlspecialchars($name) ?></strong>!<br>
        We'll get back to you within 24–48 hours with your personalised itinerary.
      </p>
      <a href="../index.php" class="btn btn-primary" style="display:inline-flex">← Back to Home</a>
    </div>

    <?php else: ?>

    <h2>Start Your<br>Adventure</h2>
    <p>Fill in the form below and we'll reply within 24–48 hours.</p>

    <?php if (!empty($errors)): ?>
    <div style="background:#fef0ec;border:1.5px solid var(--coral);border-radius:6px;padding:1rem 1.2rem;margin-bottom:1.5rem">
      <p style="font-size:0.85rem;font-weight:600;color:var(--coral);margin-bottom:0.4rem">Please fix the following:</p>
      <ul style="list-style:disc inside;font-size:0.83rem;color:var(--dusk)">
        <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <form id="contact-form" method="POST" action="contact.php" novalidate>

      <div class="form-row">
        <div class="form-group">
          <label for="name">Full Name <span style="color:var(--coral)">*</span></label>
          <input type="text" id="name" name="name" placeholder="Juan dela Cruz"
                 value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required />
        </div>
        <div class="form-group">
          <label for="email">Email Address <span style="color:var(--coral)">*</span></label>
          <input type="email" id="email" name="email" placeholder="juan@email.com"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" placeholder="+63 9XX XXX XXXX"
                 value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" />
        </div>
        <div class="form-group">
          <label for="guests">Number of Guests</label>
          <input type="number" id="guests" name="guests" min="1" max="50"
                 placeholder="2" value="<?= (int)($_POST['guests'] ?? 2) ?>" />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="triptype">Trip Type</label>
          <select id="triptype" name="triptype">
            <option value="">Select type…</option>
            <option value="beach"     <?= ($_POST['triptype'] ?? '') === 'beach'     ? 'selected' : '' ?>>🏖 Beach & Island Hopping</option>
            <option value="adventure" <?= ($_POST['triptype'] ?? '') === 'adventure' ? 'selected' : '' ?>>⛰ Adventure & Trekking</option>
            <option value="culture"   <?= ($_POST['triptype'] ?? '') === 'culture'   ? 'selected' : '' ?>>🎋 Cultural Immersion</option>
            <option value="family"    <?= ($_POST['triptype'] ?? '') === 'family'    ? 'selected' : '' ?>>👨‍👩‍👧 Family Holiday</option>
            <option value="romantic"  <?= ($_POST['triptype'] ?? '') === 'romantic'  ? 'selected' : '' ?>>💑 Romantic Getaway</option>
            <option value="custom"    <?= ($_POST['triptype'] ?? '') === 'custom'    ? 'selected' : '' ?>>✏️ Custom Itinerary</option>
          </select>
        </div>
        <div class="form-group">
          <label for="dates">Preferred Dates</label>
          <input type="text" id="dates" name="dates" placeholder="e.g. Dec 20–24"
                 value="<?= htmlspecialchars($_POST['dates'] ?? '') ?>" />
        </div>
      </div>

      <div class="form-group">
        <label for="message">Your Message <span style="color:var(--coral)">*</span></label>
        <textarea id="message" name="message" placeholder="Tell us your dream Zambales experience…" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
      </div>

      <button type="submit" class="form-submit">Send Inquiry →</button>
      <p class="form-note">We respect your privacy. Your details are never shared.</p>

    </form>
    <?php endif; ?>
  </div>
</main>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  MAP / LOCATION STRIP                                   ║
     ╚══════════════════════════════════════════════════════════╝ -->
<div style="background:var(--ocean);padding:3rem 4rem;display:flex;align-items:center;justify-content:space-between;gap:2rem;flex-wrap:wrap">
  <div>
    <p style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--sand);margin-bottom:0.5rem">Finding Us</p>
    <p style="font-family:var(--ff-display);font-size:1.5rem;color:var(--cream);font-weight:300">
      Zambales is <em>3–4 hours.</em> from Manila via NLEX/SCTEX
    </p>
  </div>
  <a href="https://maps.google.com/?q=Iba,Zambales,Philippines" target="_blank" rel="noopener noreferrer"
     class="btn btn-outline" style="border-color:rgba(253,248,240,0.4);color:var(--cream)">
    Open in Google Maps ↗
  </a>
</div>


<?php include __DIR__ . '/../includes/footer.php'; ?>