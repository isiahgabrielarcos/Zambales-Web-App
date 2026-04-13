/* ============================================================
   ZAMBALES TOURISM — main.js
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

  /* ── CUSTOM CURSOR ───────────────────────────────────────── */
  const cursor     = document.querySelector('.cursor');
  const cursorRing = document.querySelector('.cursor-ring');

  if (cursor && cursorRing) {
    let mouseX = 0, mouseY = 0;
    let ringX  = 0, ringY  = 0;

    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      cursor.style.left = mouseX + 'px';
      cursor.style.top  = mouseY + 'px';
    });

    // Lag the ring
    (function animateRing() {
      ringX += (mouseX - ringX) * 0.12;
      ringY += (mouseY - ringY) * 0.12;
      cursorRing.style.left = ringX + 'px';
      cursorRing.style.top  = ringY + 'px';
      requestAnimationFrame(animateRing);
    })();

    // Cursor states
    document.querySelectorAll('a, button, .dest-card, .exp-card, .dest-full-card').forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursor.style.width  = '20px';
        cursor.style.height = '20px';
        cursorRing.style.width  = '56px';
        cursorRing.style.height = '56px';
      });
      el.addEventListener('mouseleave', () => {
        cursor.style.width  = '12px';
        cursor.style.height = '12px';
        cursorRing.style.width  = '36px';
        cursorRing.style.height = '36px';
      });
    });
  }

  /* ── NAV SCROLL STATE ────────────────────────────────────── */
  const nav = document.querySelector('.nav');
  if (nav) {
    const updateNav = () => {
      nav.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', updateNav, { passive: true });
    updateNav();
  }

  /* ── HERO BG ZOOM ────────────────────────────────────────── */
  const heroBg = document.querySelector('.hero-bg');
  if (heroBg) {
    const img = new Image();
    img.onload = () => heroBg.classList.add('loaded');
    img.src = heroBg.style.backgroundImage?.match(/url\(['"]?(.+?)['"]?\)/)?.[1] || '';
    setTimeout(() => heroBg.classList.add('loaded'), 100);
  }

  /* ── MOBILE MENU ─────────────────────────────────────────── */
  const hamburger  = document.querySelector('.nav-hamburger');
  const mobileMenu = document.querySelector('.mobile-menu');
  const mobileClose = document.querySelector('.mobile-close');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => mobileMenu.classList.add('open'));
    mobileClose?.addEventListener('click', () => mobileMenu.classList.remove('open'));
    mobileMenu.querySelectorAll('a').forEach(a =>
      a.addEventListener('click', () => mobileMenu.classList.remove('open'))
    );
  }

  /* ── SCROLL REVEAL ───────────────────────────────────────── */
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
  );

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  /* ── ACTIVE NAV LINK ─────────────────────────────────────── */
  const currentPath = window.location.pathname;
  document.querySelectorAll('.nav-links a').forEach(a => {
    if (a.getAttribute('href') === currentPath ||
        (currentPath.includes(a.getAttribute('href')) && a.getAttribute('href') !== '/')) {
      a.classList.add('active');
    }
  });

  /* ── DESTINATION FILTER ──────────────────────────────────── */
  const filterBtns = document.querySelectorAll('.filter-btn');
  const destCards  = document.querySelectorAll('.dest-full-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      destCards.forEach(card => {
        const cat = card.dataset.category;
        if (filter === 'all' || cat === filter) {
          card.style.display = '';
          setTimeout(() => card.style.opacity = '1', 50);
        } else {
          card.style.opacity = '0';
          setTimeout(() => card.style.display = 'none', 300);
        }
      });
    });
  });

  /* ── CONTACT FORM ────────────────────────────────────────── */
  const form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = form.querySelector('.form-submit');
      const original = btn.textContent;
      btn.textContent = 'Sending…';
      btn.disabled = true;

      setTimeout(() => {
        btn.textContent = '✓ Message Sent!';
        btn.style.background = '#2a7d52';
        form.reset();
        setTimeout(() => {
          btn.textContent = original;
          btn.style.background = '';
          btn.disabled = false;
        }, 3500);
      }, 1600);
    });
  }

  /* ── PARALLAX HERO ───────────────────────────────────────── */
  const heroSection = document.querySelector('.hero');
  if (heroSection) {
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;
      const heroBg = heroSection.querySelector('.hero-bg');
      if (heroBg && scrolled < window.innerHeight) {
        heroBg.style.transform = `scale(1) translateY(${scrolled * 0.3}px)`;
      }
    }, { passive: true });
  }

  /* ── GALLERY DRAG SCROLL ─────────────────────────────────── */
  const galleryStrip = document.querySelector('.gallery-strip');
  if (galleryStrip) {
    let isDown = false, startX, scrollLeft;

    galleryStrip.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX - galleryStrip.offsetLeft;
      scrollLeft = galleryStrip.scrollLeft;
      galleryStrip.style.cursor = 'grabbing';
    });
    galleryStrip.addEventListener('mouseleave', () => { isDown = false; galleryStrip.style.cursor = ''; });
    galleryStrip.addEventListener('mouseup', () => { isDown = false; galleryStrip.style.cursor = ''; });
    galleryStrip.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x    = e.pageX - galleryStrip.offsetLeft;
      const walk = (x - startX) * 1.6;
      galleryStrip.scrollLeft = scrollLeft - walk;
    });
  }

  /* ── COUNTER ANIMATION ───────────────────────────────────── */
  const statNums = document.querySelectorAll('.stat-num, .fact-num');
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const target = parseFloat(el.dataset.count || el.textContent.replace(/[^\d.]/g, ''));
      const suffix = el.dataset.suffix || '';
      const prefix = el.dataset.prefix || '';
      let start = 0;
      const duration = 1600;
      const startTime = performance.now();

      const tick = (now) => {
        const elapsed = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.round(eased * target);
        el.textContent = prefix + current + suffix;
        if (progress < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
      counterObserver.unobserve(el);
    });
  }, { threshold: 0.5 });

  statNums.forEach(el => {
    el.dataset.count = el.textContent.replace(/[^\d.]/g, '');
    counterObserver.observe(el);
  });

});