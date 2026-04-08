/**
 * La Poste Sénégal — Global JS
 * Mobile nav, skip link, scroll reveal for inner pages
 */
(function () {
  'use strict';

  /* ---- Mobile Nav ---- */
  const burger = document.querySelector('.lp-nav__burger');
  if (burger) {
    let open = false;
    const overlay = buildMobileOverlay();
    document.body.appendChild(overlay);

    burger.addEventListener('click', () => {
      open = !open;
      burger.setAttribute('aria-expanded', String(open));
      overlay.classList.toggle('is-open', open);
      document.body.style.overflow = open ? 'hidden' : '';
      morphBurger(open);
    });
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) closeMobileNav();
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && open) closeMobileNav();
    });

    function closeMobileNav() {
      open = false;
      burger.setAttribute('aria-expanded', 'false');
      overlay.classList.remove('is-open');
      document.body.style.overflow = '';
      morphBurger(false);
    }

    function morphBurger(isOpen) {
      const spans = burger.querySelectorAll('span');
      if (spans.length < 2) return;
      if (isOpen) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.transform = 'rotate(-45deg)';
      } else {
        spans[0].style.transform = '';
        spans[1].style.transform = '';
      }
    }

    function buildMobileOverlay() {
      const div = document.createElement('div');
      div.id = 'mobile-menu';
      div.setAttribute('role', 'dialog');
      div.setAttribute('aria-label', 'Menu mobile');

      // Clone nav links
      const navLinks = document.querySelector('.lp-nav__links');
      if (navLinks) {
        const links = Array.from(navLinks.querySelectorAll('a'));
        const nav = document.createElement('nav');
        nav.className = 'lp-mobile-menu__nav';
        links.forEach((a, i) => {
          const link = document.createElement('a');
          link.href = a.href;
          link.textContent = a.textContent;
          link.className = 'lp-mobile-menu__link';
          link.style.setProperty('--i', i);
          nav.appendChild(link);
        });
        div.appendChild(nav);
      }

      const style = document.createElement('style');
      style.textContent = `
        #mobile-menu {
          position:fixed;inset:0;z-index:200;
          background:rgba(0,32,91,0.97);
          backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
          display:flex;align-items:center;justify-content:center;
          opacity:0;pointer-events:none;
          transition:opacity .3s cubic-bezier(.16,1,.3,1);
        }
        #mobile-menu.is-open{opacity:1;pointer-events:auto;}
        .lp-mobile-menu__nav{display:flex;flex-direction:column;align-items:center;gap:.5rem;}
        .lp-mobile-menu__link{
          font-size:clamp(1.75rem,6vw,2.5rem);font-weight:700;letter-spacing:-.03em;
          color:rgba(255,255,255,.7);padding:.5rem 1rem;
          opacity:0;transform:translateY(16px);
          transition:opacity .4s cubic-bezier(.16,1,.3,1),
                      transform .4s cubic-bezier(.16,1,.3,1),color .15s;
          transition-delay:calc(var(--i)*55ms);
        }
        .lp-mobile-menu__link:hover{color:#fff;}
        #mobile-menu.is-open .lp-mobile-menu__link{opacity:1;transform:translateY(0);}
      `;
      document.head.appendChild(style);
      return div;
    }
  }

  /* ---- Scroll Reveal (pages intérieures) ---- */
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      (entries) => entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } }),
      { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );
    document.querySelectorAll('.lp-reveal').forEach((el) => io.observe(el));
  }

  /* ---- Tracking widget redirect ---- */
  document.querySelectorAll('.lp-track-widget').forEach((widget) => {
    const input = widget.querySelector('input');
    const btn   = widget.querySelector('button');
    if (!input || !btn) return;

    const doTrack = () => {
      const val = input.value.trim();
      if (!val) { input.focus(); return; }
      const base = (typeof laposteData !== 'undefined') ? laposteData.trackingUrl : '/suivi-colis/';
      window.location.href = base + '?numero=' + encodeURIComponent(val);
    };
    btn.addEventListener('click', doTrack);
    input.addEventListener('keydown', (e) => { if (e.key === 'Enter') doTrack(); });
  });

})();
