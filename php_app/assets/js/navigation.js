/**
 * Navigation, Smooth Scroll & View Routing Module
 * Faithfully reproduces React navigation state and page switching
 */

const NAVBAR_HEIGHT = 85;

function initNavigation() {
  const navbar = document.querySelector('.site-nav');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileDrawer = document.getElementById('mobile-drawer');

  // Sticky nav shadow toggle on scroll
  function handleNavScroll() {
    if (!navbar) return;
    if (window.scrollY > 30) {
      navbar.classList.add('nav-scrolled');
    } else {
      navbar.classList.remove('nav-scrolled');
    }
  }
  window.addEventListener('scroll', handleNavScroll, { passive: true });
  handleNavScroll();

  // Mobile menu toggle
  if (mobileMenuBtn && mobileDrawer) {
    mobileMenuBtn.addEventListener('click', () => {
      const isOpen = mobileDrawer.classList.toggle('open');
      const iconMenu = mobileMenuBtn.querySelector('.icon-menu');
      const iconX = mobileMenuBtn.querySelector('.icon-x');
      if (iconMenu && iconX) {
        iconMenu.style.display = isOpen ? 'none' : 'block';
        iconX.style.display = isOpen ? 'block' : 'none';
      }
    });
  }

  // Scroll spy for active section highlight
  initScrollSpy();

  // Check URL hash or pending section on load
  const hash = window.location.hash.replace('#', '');
  if (hash) {
    setTimeout(() => {
      scrollToTarget(hash);
    }, 150);
  }
}

/**
 * Scroll smoothly with 85px navbar offset
 */
function scrollToTarget(targetId) {
  const el = document.getElementById(targetId);
  if (el) {
    const elementPosition = el.getBoundingClientRect().top + window.pageYOffset;
    const offsetPosition = Math.max(0, elementPosition - NAVBAR_HEIGHT);
    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
    return true;
  }
  return false;
}

/**
 * Switch page view (supports legacy navigateTo calls as in-page scroll)
 */
function navigateTo(page) {
  closeMobileMenu();
  if (page === 'home' || page === 'top') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    setActiveNav('Home');
  } else if (page === 'about') {
    scrollToTarget('about');
    setActiveNav('About');
  } else {
    scrollToTarget(page);
  }
}

/**
 * Navigate directly to any section on the single-page layout
 */
function goToSection(targetId, targetPage, navLabel) {
  closeMobileMenu();
  if (navLabel) setActiveNav(navLabel);

  if (targetId === 'top') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } else {
    scrollToTarget(targetId);
  }
}

function setActiveNav(label) {
  document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
    if (link.getAttribute('data-nav') === label) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

function closeMobileMenu() {
  const mobileDrawer = document.getElementById('mobile-drawer');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  if (mobileDrawer) mobileDrawer.classList.remove('open');
  if (mobileMenuBtn) {
    const iconMenu = mobileMenuBtn.querySelector('.icon-menu');
    const iconX = mobileMenuBtn.querySelector('.icon-x');
    if (iconMenu && iconX) {
      iconMenu.style.display = 'block';
      iconX.style.display = 'none';
    }
  }
}

function initScrollSpy() {
  const sections = [
    { id: 'about', label: 'About' },
    { id: 'overview', label: 'About' },
    { id: 'committee', label: 'Committee' },
    { id: 'tracks', label: 'Tracks' },
    { id: 'dates', label: 'Schedule' },
    { id: 'speakers', label: 'Speakers' },
    { id: 'cfp', label: 'Call for Papers' },
    { id: 'fees', label: 'Registration' },
    { id: 'venue', label: 'Venue' },
    { id: 'contact-section', label: 'Contact' }
  ];

  let ticking = false;

  function updateActiveNav() {
    // 1. If at or near top of page, highlight Home
    if (window.scrollY < 200) {
      setActiveNav('Home');
      return;
    }

    // 2. If near bottom of document, highlight Contact
    if ((window.innerHeight + window.scrollY) >= (document.documentElement.scrollHeight - 80)) {
      setActiveNav('Contact');
      return;
    }

    // 3. Inspect sections in reading line zone (85px navbar + 35px threshold)
    const readLine = NAVBAR_HEIGHT + 35;
    const intersecting = [];

    for (const s of sections) {
      const el = document.getElementById(s.id);
      if (!el) continue;
      const r = el.getBoundingClientRect();
      if (r.top <= readLine && r.bottom >= readLine) {
        intersecting.push({ s, r });
      }
    }

    if (!intersecting.length) return;

    // Disambiguate nested/sibling elements (e.g. child #cfp inside parent #fees):
    // Prioritize the more specific child container (smaller height)
    intersecting.sort((a, b) => a.r.height - b.r.height);
    setActiveNav(intersecting[0].s.label);
  }

  // Throttle scroll events via requestAnimationFrame for smooth 60fps tracking
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        updateActiveNav();
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });

  // Initial synchronization
  updateActiveNav();
}

window.initNavigation = initNavigation;
window.scrollToTarget = scrollToTarget;
window.navigateTo = navigateTo;
window.goToSection = goToSection;
