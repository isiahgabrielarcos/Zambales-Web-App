<?php
$pageTitle = 'Home';
include __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="assets/css/style.css">

<!-- ╔══════════════════════════════════════════════════════════╗
     ║  HERO SECTION                                           ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="hero" aria-label="Hero — Zambales coast at sunrise">
  <div class="hero-bg" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1800&q=85')"></div>
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <p class="hero-eyebrow">Province of Zambales, Philippines</p>
    <h1 class="hero-title">
      Where the sea<br>meets the <em>soul</em>
    </h1>
    <p class="hero-subtitle">
      White sand shores, Aeta heritage, volcanic peaks, and crystal waters —
      Zambales is the Philippines' hidden coastal jewel waiting to be discovered.
    </p>
    <div class="hero-actions">
      <a href="pages/destinations.php" class="btn btn-primary">Explore Destinations ↗</a>
      <a href="#about" class="btn btn-outline">Our Story</a>
    </div>
  </div>

  <!-- Floating Stats -->
  <aside class="hero-stats" aria-label="Quick facts">
    <div class="stat-card">
      <div class="stat-num" data-count="13" data-suffix="+">13+</div>
      <div class="stat-label">Pristine Beaches</div>
    </div>
    <div class="stat-card">
      <div class="stat-num" data-count="5" data-suffix=" Municipalities">5 Municipalities</div>
      <div class="stat-label">to Explore</div>
    </div>
    <div class="stat-card">
      <div class="stat-num" data-count="523" data-suffix=" km²">523 km²</div>
      <div class="stat-label">Land Area</div>
    </div>
  </aside>

  <div class="hero-scroll" aria-hidden="true">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  INTRO STRIP                                            ║
     ╚══════════════════════════════════════════════════════════╝ -->
<div class="intro-strip">
  <p class="intro-text">
    <strong>"Zambales"</strong> — from the Kapampangan word <em>zambali</em>,
    meaning a place teeming with rich land and generous shores. Every visit is a story.
  </p>
  <div class="intro-divider"></div>
  <p style="font-size:0.82rem;color:rgba(253,248,240,0.5);white-space:nowrap;font-family:var(--ff-body)">
    3–4 hrs from Manila
  </p>
</div>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  FEATURED DESTINATIONS                                  ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="destinations-section" id="destinations">
  <div class="dest-header">
    <div class="dest-header-left reveal">
      <p class="section-label">Top Picks</p>
      <h2 class="section-title">Must-Visit <em>Places</em></h2>
      <p>
        From the powdery shores of Iba to the hidden lagoons of San Antonio,
        Zambales rewards every kind of traveller with quiet wonders.
      </p>
    </div>
    <a href="pages/destinations.php" class="see-all reveal">View All →</a>
  </div>

  <div class="dest-grid">

    <!-- Featured Large Card -->
    <article class="dest-card reveal">
      <img src="https://images.unsplash.com/photo-1473116763249-2faaef81ccda?w=900&q=80"
           alt="Crystal clear waters of Anawangin Cove, Zambales" loading="lazy" />
      <div class="dest-overlay"></div>
      <div class="dest-info">
        <p class="dest-tag">🏝 Cove · San Antonio</p>
        <h3 class="dest-name">Anawangin Cove</h3>
        <p class="dest-desc">
          A volcanic ash beach surrounded by agoho pines — one of the most photographed
          coves in the Philippines. Reachable only by boat.
        </p>
      </div>
      <div class="dest-arrow" aria-hidden="true">↗</div>
    </article>

    <!-- Card 2 -->
    <article class="dest-card reveal reveal-delay-1">
      <img src="https://images.unsplash.com/photo-1540202404-a2f29564651e?w=700&q=80"
           alt="Nagsasa Cove white sand beach" loading="lazy" />
      <div class="dest-overlay"></div>
      <div class="dest-info">
        <p class="dest-tag">🌊 Beach · San Antonio</p>
        <h3 class="dest-name">Nagsasa Cove</h3>
        <p class="dest-desc">Off-grid paradise with a freshwater lagoon.</p>
      </div>
      <div class="dest-arrow" aria-hidden="true">↗</div>
    </article>

    <!-- Card 3 -->
    <article class="dest-card reveal reveal-delay-2">
      <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=700&q=80"
           alt="Mt. Pinatubo crater lake" loading="lazy" />
      <div class="dest-overlay"></div>
      <div class="dest-info">
        <p class="dest-tag">🌋 Volcano · Capas</p>
        <h3 class="dest-name">Mt. Pinatubo</h3>
        <p class="dest-desc">Trek to the turquoise crater lake of a living legend.</p>
      </div>
      <div class="dest-arrow" aria-hidden="true">↗</div>
    </article>

    <!-- Card 4 -->
    <article class="dest-card reveal reveal-delay-3">
      <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?w=700&q=80"
           alt="Iba beach sunset Zambales" loading="lazy" />
      <div class="dest-overlay"></div>
      <div class="dest-info">
        <p class="dest-tag">🌅 Town Beach · Iba</p>
        <h3 class="dest-name">Iba Beach</h3>
        <p class="dest-desc">Long grey-sand shore famous for its dramatic sunsets.</p>
      </div>
      <div class="dest-arrow" aria-hidden="true">↗</div>
    </article>

  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  EXPERIENCES                                            ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="experiences-section" id="experiences">
  <div class="exp-header reveal">
    <p class="section-label">What To Do</p>
    <h2 class="section-title">Unforgettable <em>Experiences</em></h2>
    <p>Every type of adventure is waiting for you along Zambales' shores and highlands.</p>
  </div>

  <div class="exp-grid">
    <div class="exp-card reveal">
      <div class="exp-icon">🤿</div>
      <h3 class="exp-name">Diving & Snorkelling</h3>
      <p class="exp-desc">
        Explore vibrant coral gardens and WWII shipwrecks in the warm waters of Subic Bay and beyond.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-1">
      <div class="exp-icon">🥾</div>
      <h3 class="exp-name">Volcano Trekking</h3>
      <p class="exp-desc">
        Hike through lahar fields and lush forest to reach the emerald crater lake of Mt. Pinatubo.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-2">
      <div class="exp-icon">⛵</div>
      <h3 class="exp-name">Island Hopping</h3>
      <p class="exp-desc">
        Charter a pumpboat and drift between secluded coves — Anawangin, Nagsasa, Camara Island.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-3">
      <div class="exp-icon">🏄</div>
      <h3 class="exp-name">Surfing & Watersports</h3>
      <p class="exp-desc">
        Ride the waves at San Narciso or Iba, or try kayaking, paddleboarding, and kitesurfing.
      </p>
    </div>
    <div class="exp-card reveal">
      <div class="exp-icon">🎋</div>
      <h3 class="exp-name">Aeta Cultural Tours</h3>
      <p class="exp-desc">
        Visit indigenous Aeta communities, learn traditional fire-making, and taste authentic forest cuisine.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-1">
      <div class="exp-icon">🍤</div>
      <h3 class="exp-name">Seafood & Local Cuisine</h3>
      <p class="exp-desc">
        Feast on grilled bangus, fresh kinilaw, and the famed Zambales mangoes — sweetest in the Philippines.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-2">
      <div class="exp-icon">📸</div>
      <h3 class="exp-name">Sunset Photography</h3>
      <p class="exp-desc">
        Iba and Palauig face the West Philippine Sea — golden-hour skies here are simply extraordinary.
      </p>
    </div>
    <div class="exp-card reveal reveal-delay-3">
      <div class="exp-icon">🌿</div>
      <h3 class="exp-name">Eco-Camping</h3>
      <p class="exp-desc">
        Sleep under the stars at Anawangin or Nagsasa cove, lulled by waves with no electricity — pure bliss.
      </p>
    </div>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  ABOUT SECTION                                          ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="about-section" id="about" aria-label="About Zambales">
  <div class="about-visual">
    <img src="https://images.unsplash.com/photo-1502920514313-52581002a659?w=900&q=80"
         alt="Lush green Zambales mountainside meeting the sea" loading="lazy" />
    <div class="about-visual-badge">Est. 1572</div>
  </div>
  <div class="about-content">
    <p class="section-label">About the Province</p>
    <h2 class="section-title">Land of <em>Resilience</em><br>& Natural Bounty</h2>
    <p>
      Zambales is a first-class province on the western coast of Luzon, bordered by
      the Zambales Mountains to the east and the shimmering West Philippine Sea to the west.
      Its history is as layered as its landscape — from pre-colonial Aeta communities
      to Spanish galleon routes to the eruption of Mt. Pinatubo in 1991, which reshaped
      the very face of the province.
    </p>
    <p>
      Today Zambales stands as a testament to renewal. Former lahar plains bloom with
      mangoes, the coastal towns thrive with fishing and tourism, and the indigenous
      heritage of the Aeta people is celebrated and preserved alongside modern progress.
    </p>
    <div class="about-facts">
      <div>
        <div class="fact-num" data-count="13" data-suffix="+">13+</div>
        <div class="fact-label">Municipalities</div>
      </div>
      <div>
        <div class="fact-num" data-count="620000" data-suffix="+">620,000+</div>
        <div class="fact-label">Population</div>
      </div>
      <div>
        <div class="fact-num" data-count="36" data-suffix=" km">36 km</div>
        <div class="fact-label">Longest Coastline</div>
      </div>
    </div>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  PHOTO GALLERY                                          ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="gallery-section" id="gallery">
  <div class="gallery-header reveal">
    <p class="section-label">Visual Stories</p>
    <h2 class="section-title" style="color:var(--cream)">Through the <em>Lens</em></h2>
  </div>

  <div class="gallery-strip" role="list" aria-label="Photo gallery of Zambales">
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1473116763249-2faaef81ccda?w=600&q=80"
           alt="Anawangin Cove reflection" loading="lazy" />
      <div class="gallery-caption">Anawangin Cove</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600&q=80"
           alt="Mt. Pinatubo crater lake" loading="lazy" />
      <div class="gallery-caption">Mt. Pinatubo</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80"
           alt="Tropical beach at dusk" loading="lazy" />
      <div class="gallery-caption">West Philippine Sea</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1540202404-a2f29564651e?w=600&q=80"
           alt="White sand cove" loading="lazy" />
      <div class="gallery-caption">Nagsasa Cove</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?w=600&q=80"
           alt="Sunset over Zambales mountain" loading="lazy" />
      <div class="gallery-caption">Zambales Highland</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?w=600&q=80"
           alt="Clear blue ocean water" loading="lazy" />
      <div class="gallery-caption">Camara Island</div>
    </div>
    <div class="gallery-item" role="listitem">
      <img src="https://images.unsplash.com/photo-1502920514313-52581002a659?w=600&q=80"
           alt="Lush green mountain" loading="lazy" />
      <div class="gallery-caption">Zambales Mountains</div>
    </div>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  TRAVEL TIPS                                            ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="tips-section" id="tips">
  <div class="reveal" style="max-width:500px">
    <p class="section-label">Before You Go</p>
    <h2 class="section-title">Essential <em>Travel Tips</em></h2>
  </div>

  <div class="tips-grid">
    <div class="tip-card reveal">
      <div class="tip-num">01</div>
      <h3 class="tip-title">Best Time to Visit</h3>
      <p class="tip-text">
        November to May is the dry season — ideal for beach trips, island hopping, and
        the Pinatubo trek. June to October brings rain, but also lush greenery and fewer crowds.
      </p>
    </div>
    <div class="tip-card reveal reveal-delay-1">
      <div class="tip-num">02</div>
      <h3 class="tip-title">Getting There</h3>
      <p class="tip-text">
        From Manila, take the NLEX/SCTEX to Olongapo (around 3 hours by car).
        Victory Liner and other bus companies service the route from Cubao and Pasay daily.
      </p>
    </div>
    <div class="tip-card reveal reveal-delay-2">
      <div class="tip-num">03</div>
      <h3 class="tip-title">Island Hopping Boats</h3>
      <p class="tip-text">
        Charter boats at Pundaquit Beach in San Antonio for Anawangin and Nagsasa.
        Book early during Holy Week and long weekends — these coves fill up fast.
      </p>
    </div>
    <div class="tip-card reveal">
      <div class="tip-num">04</div>
      <h3 class="tip-title">Leave No Trace</h3>
      <p class="tip-text">
        Zambales' ecosystems are fragile and precious. Pack out your trash,
        avoid touching corals, and respect the indigenous communities you visit.
      </p>
    </div>
    <div class="tip-card reveal reveal-delay-1">
      <div class="tip-num">05</div>
      <h3 class="tip-title">Local Currency</h3>
      <p class="tip-text">
        Bring sufficient cash — ATMs are sparse outside Olongapo and Iba.
        Most beachside cottages, boat operators, and small eateries don't accept cards.
      </p>
    </div>
    <div class="tip-card reveal reveal-delay-2">
      <div class="tip-num">06</div>
      <h3 class="tip-title">Try the Mangoes!</h3>
      <p class="tip-text">
        Zambales mangoes are legendary in the Philippines. Pick up fresh or dried mangoes
        from roadside stalls along the national highway — a delicious take-home treat.
      </p>
    </div>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗
     ║  CTA BANNER                                             ║
     ╚══════════════════════════════════════════════════════════╝ -->
<section class="cta-section" aria-label="Call to action">
  <p class="section-label" style="color:rgba(253,248,240,0.7)">Your Adventure Awaits</p>
  <h2 class="section-title">Ready to Explore <em>Zambales?</em></h2>
  <p>Tell us your dream itinerary and we'll help you make it happen.</p>
  <div class="hero-actions" style="justify-content:center">
    <a href="pages/contact.php" class="btn btn-primary">Plan My Trip</a>
    <a href="pages/destinations.php" class="btn btn-outline">Browse Destinations</a>
  </div>
</section>


<?php include __DIR__ . '/includes/footer.php'; ?>