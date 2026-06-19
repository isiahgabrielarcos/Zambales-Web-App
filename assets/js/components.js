/* ============================================================
   ZAMBALES TOURISM — components.js
   Injects shared nav, footer, and sign-in modal on every page.
   Import ONCE per page; root path is computed automatically.
   ============================================================ */

(function () {
  'use strict';

  /* ── ROOT PATH ──────────────────────────────────────────── */
  const R = window.location.pathname.includes('/pages/') ? '../' : '';

  /* ── SVG CONSTANTS ──────────────────────────────────────── */
  const SEARCH_ICON = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
    stroke-linecap="round" stroke-linejoin="round" width="17" height="17">
    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
  </svg>`;

  const SOCIAL = [
    ['Facebook', `<svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>`],
    ['X (Twitter)', `<svg viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>`],
    ['Instagram', `<svg viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>`],
    ['LinkedIn', `<svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>`],
    ['Discord', `<svg viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057.1 18.082.114 18.105.134 18.12a19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>`],
    ['TikTok', `<svg viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>`],
    ['GitHub', `<svg viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>`],
  ];

  /* ── SESSION HELPERS ────────────────────────────────────── */
  function getUser() {
    try { return JSON.parse(localStorage.getItem('zam_user') || 'null'); } catch { return null; }
  }
  function logOut() {
    localStorage.removeItem('zam_user');
    window.location.reload();
  }

  /* ── BUILD NAV ──────────────────────────────────────────── */
  function buildNav() {
    const user = getUser();
    const authBtn = user
      ? `<div class="nav-profile" id="nav-profile">
           <button class="nav-profile-btn" id="profile-btn" aria-label="User menu" aria-expanded="false">
             ${user.name ? user.name[0].toUpperCase() : 'U'}
           </button>
           <div class="nav-profile-dropdown" id="profile-dropdown" aria-hidden="true">
             <div class="npd-name">${user.name || 'User'}</div>
             <div class="npd-email">${user.email || ''}</div>
             <div class="npd-divider"></div>
             <a href="${R}pages/account.html" class="npd-item">My Account</a>
             <div class="npd-divider"></div>
             <button class="npd-item npd-logout" id="btn-logout">Log Out</button>
           </div>
         </div>`
      : `<a href="${R}pages/signin.html" class="nav-signin" id="open-signin">SIGN IN</a>`;
    return `
<nav class="nav" id="main-nav" role="navigation" aria-label="Main navigation">
  <div class="nav-left">
    <a href="${R}index.html" class="nav-logo" aria-label="Zambales Tourism Home">ZambaLesGo!</a>
    <div class="nav-search">
      ${SEARCH_ICON}
      <input type="search" placeholder="Search destinations…" aria-label="Search destinations" />
    </div>
  </div>
  <div class="nav-right">
    <ul class="nav-links" role="list">
      <li><a href="${R}index.html">HOME</a></li>
      <li class="nav-has-dropdown">
        <a href="${R}pages/explore.html" class="nav-explore-link">EXPLORE <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown" role="menu" aria-label="Explore categories">
          <div class="nav-dropdown-header">Explore Zambales</div>
          <a href="${R}pages/culture.html"        class="nav-dropdown-item" role="menuitem"><strong>Culture</strong><small>Heritage, festivals &amp; traditions</small></a>
          <a href="${R}pages/landscapes.html"     class="nav-dropdown-item" role="menuitem"><strong>Landscapes</strong><small>Peaks, trails &amp; lahar canyons</small></a>
          <a href="${R}pages/aquascapes.html"     class="nav-dropdown-item" role="menuitem"><strong>Aquascapes</strong><small>Coves, reefs &amp; surf breaks</small></a>
          <a href="${R}pages/food.html"           class="nav-dropdown-item" role="menuitem"><strong>Food</strong><small>Local dishes &amp; food courts</small></a>
          <div class="nav-dropdown-divider"></div>
          <a href="${R}pages/news.html"           class="nav-dropdown-item" role="menuitem"><strong>News</strong><small>Latest updates &amp; announcements</small></a>
          <a href="${R}pages/tips.html"           class="nav-dropdown-item" role="menuitem"><strong>Tips &amp; Guides</strong><small>Plan your trip the right way</small></a>
          <a href="${R}pages/accommodations.html" class="nav-dropdown-item" role="menuitem"><strong>Accommodations</strong><small>Hotels, resorts &amp; inns</small></a>
        </div>
      </li>
      <li><a href="${R}pages/about.html">ABOUT US</a></li>
      <li><a href="${R}pages/contact.html">CONTACT</a></li>
    </ul>
    ${authBtn}
  </div>
  <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <button class="mobile-close" id="mobile-close" aria-label="Close menu">✕</button>
  <a href="${R}index.html">Home</a>
  <a href="${R}pages/explore.html">Explore</a>
  <a href="${R}pages/about.html">About Us</a>
  <a href="${R}pages/contact.html">Contact</a>
  <button class="mobile-menu-signin" id="mobile-signin">Sign In</button>
</div>`;
  }

  /* ── BUILD FOOTER ───────────────────────────────────────── */
  function buildFooter() {
    const socials = SOCIAL.map(([label, icon]) =>
      `<a href="#" class="social-btn" aria-label="${label}">${icon}</a>`
    ).join('');

    return `
<footer role="contentinfo">
  <svg class="footer-blob" viewBox="0 0 170 405" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <path d="M55 0 C 18 60, 4 140, 24 215 C 42 278, 105 335, 152 405 L 170 405 L 170 0 Z" />
  </svg>

  <div class="footer-links">
    <div class="footer-links-left">
      <div class="footer-link-col">
        <h4>Quick Links</h4>
        <a href="${R}index.html">Home</a>
        <a href="${R}index.html#destinations">Spotlight</a>
        <a href="${R}pages/explore.html">Explore</a>
        <a href="${R}pages/contact.html">Contact</a>
        <a href="${R}pages/about.html">About Us</a>
      </div>
      <div class="footer-link-col">
        <h4>Experience</h4>
        <a href="${R}pages/aquascapes.html">Water Activities</a>
        <a href="${R}pages/landscapes.html">Land Activities</a>
        <a href="${R}pages/food.html">Food Trips</a>
        <a href="${R}pages/culture.html">Culture</a>
        <a href="${R}pages/accommodations.html">Accommodations</a>
      </div>
      <div class="footer-link-col">
        <h4>Resources</h4>
        <a href="${R}pages/tips.html">Travel Guide</a>
        <a href="${R}pages/contact.html">Emergency Contacts</a>
        <a href="${R}pages/tips.html">Commute Schedules</a>
      </div>
    </div>
    <div class="footer-links-right">
      <div class="footer-link-col">
        <h4>About</h4>
        <a href="${R}pages/about.html">About Us</a>
        <a href="${R}pages/about.html">Our Focus</a>
        <a href="${R}pages/about.html">Social Impact</a>
      </div>
      <div class="footer-link-col">
        <h4>Support</h4>
        <a href="${R}pages/contact.html">Forum Support</a>
        <a href="${R}pages/contact.html">Help Center</a>
        <a href="${R}pages/contact.html">Security</a>
        <a href="${R}pages/contact.html">Governments</a>
      </div>
    </div>
  </div>

  <hr class="footer-divider" />

  <div class="footer-contact-row">
    <div class="footer-contact">
      <p>Tel: <a href="tel:+63471234567">(047) 123-4567</a></p>
      <p>Email: <a href="mailto:Group4@gmail.com">Group4@gmail.com</a></p>
    </div>
    <div class="footer-socials">
      <span>Follow us!</span>
      ${socials}
    </div>
  </div>

  <div class="footer-note-row">
    <p class="footer-gov-note">This is not an official Philippine Government Website.</p>
    <p class="footer-tagline">A Symphony of Sea, Sand, and Mountain Peaks</p>
  </div>

  <div class="footer-bottom">
    <p>&copy; <span data-year>${new Date().getFullYear()}</span> Group. All rights reserved.</p>
    <div class="footer-legal">
      <a href="${R}pages/contact.html">Contact Us</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms and Conditions</a>
      <a href="#">Copyright Statements</a>
    </div>
  </div>
</footer>`;
  }

  /* ── BUILD SIGN-IN MODAL ────────────────────────────────── */
  function buildModal() {
    return `
<div id="signin-modal" class="signin-overlay" aria-modal="true" role="dialog" aria-hidden="true">
  <div class="signin-panel">
    <button class="signin-close" id="signin-close" aria-label="Close">&#x2715;</button>

    <!-- Step 1: choose auth method -->
    <div id="signin-step-1" class="signin-step">
      <div class="signin-logo-mark">ZambaLesGo!</div>
      <h2 class="signin-heading">WELCOME BACK!</h2>
      <p class="signin-sub">Sign in to book and explore the wonderful Zambales.</p>

      <button class="signin-provider-btn" id="btn-email">Continue with Email</button>

      <div id="signin-step1">
        <button class="signin-provider-btn" id="btn-google">
          <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
          </svg>
          Continue with Google
        </button>

      <p class="signin-legal">
        By proceeding, you agree and have read our
        <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
      </p>
    </div>

    <!-- Step 2: email entry -->
    <div id="signin-step-2" class="signin-step" hidden>
      <button class="signin-back" id="signin-back" aria-label="Back">&#8592; Back</button>
      <label class="signin-field-label" for="signin-email-input">E-mail address</label>
      <input type="email" id="signin-email-input" class="signin-email-input"
             placeholder="" autocomplete="email" />
      <button class="signin-next-btn" id="signin-next">Next</button>
      <div class="signin-remember-row">
        <label><input type="checkbox" /> Remember me</label>
        <a href="#">Need Help?</a>
      </div>


    <div class="signin-footer-link">
      Or <a href="${R}pages/signup.html">click here</a> to create your free account.
    </div>
  </div>
</div>`;
  }

  /* ── INJECT ─────────────────────────────────────────────── */
  function inject() {
    const navPh = document.getElementById('nav-placeholder');
    if (navPh) navPh.outerHTML = buildNav();

    const footerPh = document.getElementById('footer-placeholder');
    if (footerPh) footerPh.outerHTML = buildFooter();

    document.body.insertAdjacentHTML('beforeend', buildModal());

    setupNavEvents();
    setupModalEvents();
  }

  /* ── NAV EVENTS ─────────────────────────────────────────── */
  function setupNavEvents() {
    const nav = document.getElementById('main-nav');
    if (nav) {
      const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 60);
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    }

    const hamburger   = document.getElementById('nav-hamburger');
    const mobileMenu  = document.getElementById('mobile-menu');
    const mobileClose = document.getElementById('mobile-close');

    if (hamburger && mobileMenu) {
      const openMenu = () => {
        mobileMenu.classList.add('open');
        mobileMenu.setAttribute('aria-hidden', 'false');
        hamburger.setAttribute('aria-expanded', 'true');
      };
      const closeMenu = () => {
        mobileMenu.classList.remove('open');
        mobileMenu.setAttribute('aria-hidden', 'true');
        hamburger.setAttribute('aria-expanded', 'false');
      };
      hamburger.addEventListener('click', openMenu);
      mobileClose?.addEventListener('click', closeMenu);
      mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));
    }

    /* profile dropdown */
    const profileBtn      = document.getElementById('profile-btn');
    const profileDropdown = document.getElementById('profile-dropdown');
    if (profileBtn && profileDropdown) {
      profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = profileDropdown.classList.toggle('open');
        profileBtn.setAttribute('aria-expanded', isOpen);
        profileDropdown.setAttribute('aria-hidden', !isOpen);
      });
      document.addEventListener('click', () => {
        profileDropdown.classList.remove('open');
        profileBtn?.setAttribute('aria-expanded', 'false');
      });
    }
    document.getElementById('btn-logout')?.addEventListener('click', logOut);
  }

  /* ── MODAL EVENTS ───────────────────────────────────────── */
  function setupModalEvents() {
    const modal = document.getElementById('signin-modal');
    const step1 = document.getElementById('signin-step-1');
    const step2 = document.getElementById('signin-step-2');
    if (!modal) return;

    const openModal = () => {
      modal.classList.add('open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    };
    const closeModal = () => {
      modal.classList.remove('open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      setTimeout(() => { step1.hidden = false; step2.hidden = true; }, 300);
    };

    /* open triggers */

    /* Google Sign-In & Log-Out Simulation Trick (Fixed Clean Version) */
    document.getElementById('btn-google')?.addEventListener('click', () => {
      alert('🌊 ZambaLesGo! Authentication:\nConnecting safely to Google Services...');
      closeModal();
      
      // Patakbuhin ang ating ligtas at malinis na login state management
      handleFakeLogin();
    });

    function handleFakeLogin() {
      let desktopBtn = document.getElementById('open-signin');
      let mobileBtn = document.getElementById('mobile-signin');
      
      // PRO-TRICK: I-clone natin ang mga buttons para permanenteng mabura 
      // ang nakasapaw na lumang "openModal" listeners mula sa itaas ng file.
      if (desktopBtn) {
        const newDesktopBtn = desktopBtn.cloneNode(true);
        desktopBtn.parentNode.replaceChild(newDesktopBtn, desktopBtn);
        desktopBtn = newDesktopBtn; // Palitan natin ang reference sa bago
      }
      if (mobileBtn) {
        const newMobileBtn = mobileBtn.cloneNode(true);
        mobileBtn.parentNode.replaceChild(newMobileBtn, mobileBtn);
        mobileBtn = newMobileBtn;
      }
      
      // Palitan ang disenyo at teksto ng mga bagong malinis na buttons
      desktopBtn.innerHTML = `👋 Hello! [name] (Logout)`;
      mobileBtn.innerHTML = `👋 Hello! [name] (Logout)`;
      
      // Gagawa tayo ng malinis na action para sa pag-logout
      const logoutAction = (e) => {
        e.preventDefault();
        
        if (confirm('Gusto mo ba mag-log out sa ZambaLesGo!?')) {
          alert('Successfully logged out!');
          
          // I-clone natin ulit para burahin naman ang logout action 
          // at ibalik sa orihinal na "Sign In" state ang website
          const resetDesktop = desktopBtn.cloneNode(true);
          resetDesktop.innerHTML = 'Sign In';
          desktopBtn.parentNode.replaceChild(resetDesktop, desktopBtn);
          
          const resetMobile = mobileBtn.cloneNode(true);
          resetMobile.innerHTML = 'Sign In';
          mobileBtn.parentNode.replaceChild(resetMobile, mobileBtn);
          
          // Muling ibalik ang orihinal na utos na magbubukas ng login modal kapag kinlik muli
          resetDesktop.addEventListener('click', (evt) => { evt.preventDefault(); openModal(); });
          resetMobile.addEventListener('click', (evt) => { evt.preventDefault(); openModal(); });
        }
      };
      
      // Isaksak ang malinis na logout triggers nang walang kasunod na popup
      desktopBtn.addEventListener('click', logoutAction);
      mobileBtn.addEventListener('click', logoutAction);
    }
    
    // -------------------------------

    document.getElementById('open-signin')?.addEventListener('click', (e) => {
      e.preventDefault(); openModal();
    });
    document.getElementById('mobile-signin')?.addEventListener('click', (e) => {
      e.preventDefault();
      document.getElementById('mobile-menu')?.classList.remove('open');
      openModal();
    });
    /* any element with data-open-signin on the page */
    document.querySelectorAll('[data-open-signin]').forEach(el =>
      el.addEventListener('click', (e) => { e.preventDefault(); openModal(); })
    );

    /* close triggers */
    document.getElementById('signin-close')?.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
    });

    /* step navigation */
    document.getElementById('btn-email')?.addEventListener('click', () => {
      step1.hidden = true; step2.hidden = false;
      document.getElementById('signin-email-input')?.focus();
    });
    document.getElementById('signin-back')?.addEventListener('click', () => {
      step1.hidden = false; step2.hidden = true;
    });

    /* "Next" → simulate login with entered email */
    document.getElementById('signin-next')?.addEventListener('click', () => {
      const email = document.getElementById('signin-email-input')?.value.trim();
      if (!email) return;
      const name = email.split('@')[0].replace(/[._]/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
      localStorage.setItem('zam_user', JSON.stringify({ name, email, phone: '' }));
      closeModal();
      window.location.reload();
    });

    /* auto-open on pages that request it (e.g. signin.html) */
    if (document.body.classList.contains('auto-signin')) {
      setTimeout(openModal, 200);
    }
  }

  /* ── RUN ────────────────────────────────────────────────── */
  inject();
})();
