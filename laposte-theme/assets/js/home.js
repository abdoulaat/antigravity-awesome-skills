/**
 * La Poste Sénégal — Homepage JS
 * taste-skill: MOTION_INTENSITY:6 — CSS cubic-bezier + IntersectionObserver
 * NO window.scroll listeners | Animate only transform + opacity
 */

/* ---- Scroll Reveal ---- */
(function initReveal() {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
  );

  document.querySelectorAll('.lp-reveal').forEach((el) => observer.observe(el));
})();

/* ---- Mobile Nav ---- */
(function initNav() {
  const burger = document.querySelector('.lp-nav__burger');
  const nav    = document.querySelector('.lp-nav');
  if (!burger) return;

  let open = false;
  const mobileMenu = createMobileMenu();
  document.body.appendChild(mobileMenu);

  burger.addEventListener('click', () => {
    open = !open;
    burger.setAttribute('aria-expanded', String(open));
    mobileMenu.classList.toggle('is-open', open);
    document.body.style.overflow = open ? 'hidden' : '';
    animateBurger(burger, open);
  });

  // Close on overlay click
  mobileMenu.addEventListener('click', (e) => {
    if (e.target === mobileMenu) {
      open = false;
      burger.setAttribute('aria-expanded', 'false');
      mobileMenu.classList.remove('is-open');
      document.body.style.overflow = '';
      animateBurger(burger, false);
    }
  });

  function createMobileMenu() {
    const overlay = document.createElement('div');
    overlay.className = 'lp-mobile-menu';
    overlay.setAttribute('role', 'dialog');
    overlay.setAttribute('aria-label', 'Menu mobile');

    const links = [
      { href: '/courrier', label: 'Courrier' },
      { href: '/colis', label: 'Colis' },
      { href: '/services-financiers', label: 'Services Financiers' },
      { href: '/numerique', label: 'Numérique' },
      { href: '/agences', label: 'Agences' },
    ];

    overlay.innerHTML = `
      <nav class="lp-mobile-menu__nav" aria-label="Navigation mobile">
        ${links.map((l, i) => `
          <a href="${l.href}"
             class="lp-mobile-menu__link"
             style="--i:${i}"
          >${l.label}</a>
        `).join('')}
        <div class="lp-mobile-menu__ctas">
          <a href="/suivi" class="lp-btn lp-btn--ghost">Suivre un colis</a>
          <a href="/espace-client" class="lp-btn lp-btn--primary">Mon espace</a>
        </div>
      </nav>
    `;

    // Inject mobile menu styles
    const style = document.createElement('style');
    style.textContent = `
      .lp-mobile-menu {
        position: fixed; inset: 0; z-index: 200;
        background: rgba(248,246,241,0.96);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        display: flex; align-items: center; justify-content: center;
        opacity: 0; pointer-events: none;
        transition: opacity 0.3s cubic-bezier(0.16,1,0.3,1);
      }
      .lp-mobile-menu.is-open { opacity: 1; pointer-events: auto; }
      .lp-mobile-menu__nav {
        display: flex; flex-direction: column; align-items: center; gap: 0.25rem;
        text-align: center;
      }
      .lp-mobile-menu__link {
        font-size: clamp(1.75rem, 6vw, 2.5rem);
        font-weight: 700;
        letter-spacing: -0.03em;
        color: #1A1714;
        padding: 0.5rem 1rem;
        opacity: 0;
        transform: translateY(16px);
        transition: opacity 0.4s cubic-bezier(0.16,1,0.3,1),
                    transform 0.4s cubic-bezier(0.16,1,0.3,1),
                    color 0.15s;
        transition-delay: calc(var(--i) * 60ms);
      }
      .lp-mobile-menu__link:hover { color: #C8821A; }
      .lp-mobile-menu.is-open .lp-mobile-menu__link {
        opacity: 1; transform: translateY(0);
      }
      .lp-mobile-menu__ctas {
        display: flex; gap: 0.75rem; margin-top: 2rem;
        flex-wrap: wrap; justify-content: center;
        opacity: 0; transform: translateY(12px);
        transition: opacity 0.4s 0.35s cubic-bezier(0.16,1,0.3,1),
                    transform 0.4s 0.35s cubic-bezier(0.16,1,0.3,1);
      }
      .lp-mobile-menu.is-open .lp-mobile-menu__ctas { opacity: 1; transform: translateY(0); }
    `;
    document.head.appendChild(style);

    return overlay;
  }

  function animateBurger(btn, isOpen) {
    const [top, btm] = btn.querySelectorAll('span');
    if (isOpen) {
      top.style.transform = 'translateY(7px) rotate(45deg)';
      btm.style.transform = 'translateY(-0px) rotate(-45deg)';
    } else {
      top.style.transform = '';
      btm.style.transform = '';
    }
  }
})();

/* ---- Tracking form (hero widget + full form) ---- */
(function initTracking() {
  const forms = document.querySelectorAll('.lp-track-form, .lp-track-widget');
  forms.forEach((form) => {
    const input = form.querySelector('input[type="text"]');
    if (!input) return;

    // Format input as SN 000 000 000 SN automatically
    input.addEventListener('input', () => {
      let v = input.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
      // Just clean for now — real formatting depends on backend
      input.value = v;
    });
  });
})();

/* ---- Agencies search progressive enhancement ---- */
(function initAgencySearch() {
  const input = document.getElementById('agency-search');
  if (!input) return;

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      const q = encodeURIComponent(input.value.trim());
      if (q) window.location.href = `/agences?q=${q}`;
    }
  });
})();
