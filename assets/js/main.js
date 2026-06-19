/* ============================================================
   ZAMBALES TOURISM — main.js
   Frontend behaviour + calls to the PHP backend in /api
   ============================================================ */

document.addEventListener("DOMContentLoaded", () => {
  /* ── HERO BG ZOOM ────────────────────────────────────────── */
  const heroBg = document.querySelector(".hero-bg");
  if (heroBg) {
    const img = new Image();
    img.onload = () => heroBg.classList.add("loaded");
    img.src =
      heroBg.style.backgroundImage?.match(/url\(['"]?(.+?)['"]?\)/)?.[1] || "";
    setTimeout(() => heroBg.classList.add("loaded"), 100);
  }

  /* ── SCROLL REVEAL ───────────────────────────────────────── */
  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: "0px 0px -40px 0px" },
  );

  document
    .querySelectorAll(".reveal")
    .forEach((el) => revealObserver.observe(el));

  /* ── FAQ ACCORDION ──────────────────────────────────────── */
  document.querySelectorAll(".faq-question").forEach((btn) => {
    btn.addEventListener("click", () => {
      const item = btn.closest(".faq-item");
      const wasOpen = item.classList.contains("open");
      document
        .querySelectorAll(".faq-item.open")
        .forEach((i) => i.classList.remove("open"));
      if (!wasOpen) item.classList.add("open");
    });
  });
  // Hey
  /* ── FOOTER YEAR ─────────────────────────────────────────── */
  document.querySelectorAll("[data-year]").forEach((el) => {
    el.textContent = new Date().getFullYear();
  });

  /* ── DESTINATIONS (fetched from api/destinations.php) ────── */
  const destGrid = document.getElementById("destinations-grid");

  const esc = (s) =>
    String(s)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");

  const renderDestinations = (items) => {
    destGrid.innerHTML = items
      .map(
        (d, i) => `
      <article class="dest-full-card reveal reveal-delay-${i % 3}"
               data-category="${esc(d.category)}">
        <div class="img-wrap">
          <img src="${esc(d.img)}" alt="${esc(d.alt)}" loading="lazy" />
        </div>
        <div class="dest-full-info">
          <p class="dest-tag">${esc(d.tag)} &bull; ${esc(d.location)}</p>
          <h3>${esc(d.name)}</h3>
          <p>${esc(d.desc)}</p>
          <div class="dest-chips">
            ${d.chips.map((chip) => `<span class="chip">${esc(chip)}</span>`).join("")}
          </div>
        </div>
      </article>
    `,
      )
      .join("");

    destGrid
      .querySelectorAll(".reveal")
      .forEach((el) => revealObserver.observe(el));
  };

  if (destGrid && destGrid.dataset.src) {
    fetch(destGrid.dataset.src)
      .then((res) => res.json())
      .then((json) => {
        renderDestinations(json.data || []);

        // Apply ?filter=beach|adventure|culture from the URL (footer links)
        const wanted = new URLSearchParams(window.location.search).get(
          "filter",
        );
        const btn =
          wanted &&
          document.querySelector(`.filter-btn[data-filter="${wanted}"]`);
        if (btn) btn.click();
      })
      .catch(() => {
        destGrid.innerHTML =
          '<p style="grid-column:1/-1;text-align:center;padding:3rem 1rem">' +
          "Could not load destinations. Make sure the PHP server is running and try again.</p>";
      });
  }

  /* ── DESTINATION FILTER ──────────────────────────────────── */
  const filterBtns = document.querySelectorAll(".filter-btn");

  filterBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      filterBtns.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");

      const filter = btn.dataset.filter;
      // Query at click time — cards are rendered after the API responds
      document.querySelectorAll(".dest-full-card").forEach((card) => {
        const cat = card.dataset.category;
        if (filter === "all" || cat === filter) {
          card.style.display = "";
          setTimeout(() => (card.style.opacity = "1"), 50);
        } else {
          card.style.opacity = "0";
          setTimeout(() => (card.style.display = "none"), 300);
        }
      });
    });
  });

  /* ── CONTACT FORM (posts to api/contact.php) ─────────────── */
  const form = document.getElementById("contact-form");
  if (form) {
    const errorBox = document.getElementById("form-errors");
    const errorList = document.getElementById("form-errors-list");
    const formWrap = document.getElementById("form-wrap");
    const successBox = document.getElementById("form-success");

    const showErrors = (errors) => {
      errorList.innerHTML = "";
      errors.forEach((msg) => {
        const li = document.createElement("li");
        li.textContent = msg;
        errorList.appendChild(li);
      });
      errorBox.hidden = false;
      errorBox.scrollIntoView({ behavior: "smooth", block: "center" });
    };

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const btn = form.querySelector(".form-submit");
      const original = btn.textContent;
      btn.textContent = "Sending…";
      btn.disabled = true;
      errorBox.hidden = true;

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
        });
        const data = await res.json();

        if (data.success) {
          document.getElementById("form-success-name").textContent =
            data.name || "friend";
          formWrap.hidden = true;
          successBox.hidden = false;
          successBox.scrollIntoView({ behavior: "smooth", block: "center" });
        } else {
          showErrors(
            data.errors || ["Something went wrong. Please try again."],
          );
        }
      } catch {
        showErrors([
          "Could not reach the server. Make sure the PHP server is running.",
        ]);
      } finally {
        btn.textContent = original;
        btn.disabled = false;
      }
    });
  }

  /* ── PARALLAX HERO ───────────────────────────────────────── */
  const heroSection = document.querySelector(".hero");
  if (heroSection) {
    window.addEventListener(
      "scroll",
      () => {
        const scrolled = window.scrollY;
        const heroBg = heroSection.querySelector(".hero-bg");
        if (heroBg && scrolled < window.innerHeight) {
          heroBg.style.transform = `scale(1) translateY(${scrolled * 0.3}px)`;
        }
      },
      { passive: true },
    );
  }

  /* ── GALLERY DRAG SCROLL ─────────────────────────────────── */
  const galleryStrip = document.querySelector(".gallery-strip");
  if (galleryStrip) {
    let isDown = false,
      startX,
      scrollLeft;

    galleryStrip.addEventListener("mousedown", (e) => {
      isDown = true;
      startX = e.pageX - galleryStrip.offsetLeft;
      scrollLeft = galleryStrip.scrollLeft;
      galleryStrip.style.cursor = "grabbing";
    });
    galleryStrip.addEventListener("mouseleave", () => {
      isDown = false;
      galleryStrip.style.cursor = "";
    });
    galleryStrip.addEventListener("mouseup", () => {
      isDown = false;
      galleryStrip.style.cursor = "";
    });
    galleryStrip.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - galleryStrip.offsetLeft;
      const walk = (x - startX) * 1.6;
      galleryStrip.scrollLeft = scrollLeft - walk;
    });
  }

  /* ── COUNTER ANIMATION ───────────────────────────────────── */
  const statNums = document.querySelectorAll(".stat-num, .fact-num");
  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseFloat(
          el.dataset.count || el.textContent.replace(/[^\d.]/g, ""),
        );
        const suffix = el.dataset.suffix || "";
        const prefix = el.dataset.prefix || "";
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
    },
    { threshold: 0.5 },
  );

  statNums.forEach((el) => {
    el.dataset.count = el.textContent.replace(/[^\d.]/g, "");
    counterObserver.observe(el);
  });
});

/* Signup Page Google Feature Simulation */
  document.getElementById('google-signup')?.addEventListener('click', () => {
    alert('🌊 ZambaLesGo! Community Hub:\nSuccessfully imported your Google Profile data! Redirecting...');
    window.location.href = '../index.html';
  });