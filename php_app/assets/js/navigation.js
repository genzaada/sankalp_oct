/**
 * Navigation, Smooth Scroll & View Routing Module
 * Faithfully reproduces React navigation state and page switching
 */

const NAVBAR_HEIGHT_DEFAULT = 85;

// Mapping of section IDs to official navigation labels
const TARGET_LABEL_MAP = {
  'top': 'Home',
  'about': 'About',
  'committee': 'Committee',
  'tracks': 'Tracks',
  'speakers': 'Speakers',
  'fees': 'Registration',
  'sponsor': 'Sponsor',
  'terms-and-conditions': 'Terms & Conditions',
  'venue': 'Venue',
  'contact-section': 'Contact'
};

// Programmatic scroll lock state to prevent race conditions during smooth scrolling (DEF-002)
let isProgrammaticScroll = false;
let lockedTargetLabel = null;
let scrollLockSafetyTimer = null;
let scrollLockDebounceTimer = null;

// Body scroll lock state for mobile drawer (DEF-003)
let isBodyScrollLocked = false;
let savedBodyScrollY = 0;

function getNavbarHeight() {
  const navbar = document.querySelector('.site-nav');
  return navbar ? navbar.offsetHeight : NAVBAR_HEIGHT_DEFAULT;
}

/**
 * Background body scroll lock to prevent underlying page scroll while mobile drawer is open (DEF-003)
 */
function lockBodyScroll() {
  if (isBodyScrollLocked) return;
  savedBodyScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || 0;
  isBodyScrollLocked = true;
  document.body.style.overflow = 'hidden';
  document.documentElement.style.overflow = 'hidden';
}

/**
 * Restore background body scroll and preserve exact scroll position without jumps
 */
function unlockBodyScroll() {
  if (!isBodyScrollLocked) return;
  isBodyScrollLocked = false;
  document.body.style.overflow = '';
  document.documentElement.style.overflow = '';
  window.scrollTo(0, savedBodyScrollY);
}

/**
 * Open mobile navigation drawer with background lock and accessibility state
 */
function openMobileMenu() {
  const mobileDrawer = document.getElementById('mobile-drawer');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const backdrop = document.getElementById('mobile-drawer-backdrop');

  if (mobileDrawer) {
    mobileDrawer.classList.add('open');
    mobileDrawer.setAttribute('aria-hidden', 'false');
  }
  if (backdrop) {
    backdrop.classList.add('open');
  }
  if (mobileMenuBtn) {
    mobileMenuBtn.setAttribute('aria-expanded', 'true');
    mobileMenuBtn.setAttribute('aria-label', 'Close Navigation Menu');
    const iconMenu = mobileMenuBtn.querySelector('.icon-menu');
    const iconX = mobileMenuBtn.querySelector('.icon-x');
    if (iconMenu && iconX) {
      iconMenu.style.display = 'none';
      iconX.style.display = 'block';
    }
  }
  lockBodyScroll();
}

/**
 * Close mobile navigation drawer, release scroll lock, and optionally restore focus
 */
function closeMobileMenu(returnFocus = false) {
  const mobileDrawer = document.getElementById('mobile-drawer');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const backdrop = document.getElementById('mobile-drawer-backdrop');

  if (mobileDrawer) {
    mobileDrawer.classList.remove('open');
    mobileDrawer.setAttribute('aria-hidden', 'true');
  }
  if (backdrop) {
    backdrop.classList.remove('open');
  }
  if (mobileMenuBtn) {
    mobileMenuBtn.setAttribute('aria-expanded', 'false');
    mobileMenuBtn.setAttribute('aria-label', 'Toggle Navigation Menu');
    const iconMenu = mobileMenuBtn.querySelector('.icon-menu');
    const iconX = mobileMenuBtn.querySelector('.icon-x');
    if (iconMenu && iconX) {
      iconMenu.style.display = 'block';
      iconX.style.display = 'none';
    }
    if (returnFocus) {
      mobileMenuBtn.focus();
    }
  }
  unlockBodyScroll();
}

/**
 * Toggle mobile drawer open/closed
 */
function toggleMobileMenu() {
  const mobileDrawer = document.getElementById('mobile-drawer');
  if (mobileDrawer && mobileDrawer.classList.contains('open')) {
    closeMobileMenu(true);
  } else {
    openMobileMenu();
  }
}

/**
 * Lock active indicator to the selected item during smooth scrolling
 */
function lockNavScroll(targetLabel) {
  isProgrammaticScroll = true;
  lockedTargetLabel = targetLabel;
  if (targetLabel) {
    setActiveNav(targetLabel);
  }

  // Clear existing timers
  if (scrollLockSafetyTimer) {
    clearTimeout(scrollLockSafetyTimer);
    scrollLockSafetyTimer = null;
  }
  if (scrollLockDebounceTimer) {
    clearTimeout(scrollLockDebounceTimer);
    scrollLockDebounceTimer = null;
  }

  const unlock = () => {
    if (!isProgrammaticScroll) return;
    isProgrammaticScroll = false;
    if (scrollLockSafetyTimer) {
      clearTimeout(scrollLockSafetyTimer);
      scrollLockSafetyTimer = null;
    }
    if (scrollLockDebounceTimer) {
      clearTimeout(scrollLockDebounceTimer);
      scrollLockDebounceTimer = null;
    }
    window.removeEventListener('scrollend', unlock);
    // When smooth scroll reaches destination, ensure user's selected section remains active
    if (lockedTargetLabel) {
      setActiveNav(lockedTargetLabel);
    }
  };

  // Modern browsers fire scrollend when smooth scrolling concludes
  window.addEventListener('scrollend', unlock, { once: true });

  // Debounced unlock: as long as scroll events keep arriving, stay locked.
  // When scroll frames stop for 200ms, unlock.
  const onScrollEvent = () => {
    if (!isProgrammaticScroll) {
      window.removeEventListener('scroll', onScrollEvent);
      return;
    }
    if (scrollLockDebounceTimer) clearTimeout(scrollLockDebounceTimer);
    scrollLockDebounceTimer = setTimeout(() => {
      window.removeEventListener('scroll', onScrollEvent);
      unlock();
    }, 200);
  };
  window.addEventListener('scroll', onScrollEvent, { passive: true });

  // Fallback safety timeout for browsers with no scroll events/support (max 3000ms)
  scrollLockSafetyTimer = setTimeout(() => {
    window.removeEventListener('scroll', onScrollEvent);
    unlock();
  }, 3000);
}

/**
 * Unlock programmatic lock on manual user scroll/interaction
 */
function unlockNavScroll() {
  lockedTargetLabel = null;
  if (isProgrammaticScroll) {
    isProgrammaticScroll = false;
    if (scrollLockSafetyTimer) {
      clearTimeout(scrollLockSafetyTimer);
      scrollLockSafetyTimer = null;
    }
    if (scrollLockDebounceTimer) {
      clearTimeout(scrollLockDebounceTimer);
      scrollLockDebounceTimer = null;
    }
  }
  if (typeof window.__updateActiveNav === 'function') {
    window.__updateActiveNav();
  }
}

// User-initiated scrolling immediately releases the programmatic lock
window.addEventListener('wheel', unlockNavScroll, { passive: true });
window.addEventListener('touchstart', unlockNavScroll, { passive: true });
window.addEventListener('keydown', (e) => {
  // DEF-004: Escape key closes the mobile drawer and restores focus to hamburger button
  if (e.key === 'Escape' || e.keyCode === 27) {
    const mobileDrawer = document.getElementById('mobile-drawer');
    if (mobileDrawer && mobileDrawer.classList.contains('open')) {
      e.preventDefault();
      e.stopPropagation();
      closeMobileMenu(true);
      return;
    }
  }

  // Arrow keys, PageUp/Down, Home/End, Space release programmatic smooth-scroll lock
  if ([32, 33, 34, 35, 36, 38, 40].includes(e.keyCode)) {
    unlockNavScroll();
  }
});

function initNavigation() {
  const navbar = document.querySelector('.site-nav');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const backdrop = document.getElementById('mobile-drawer-backdrop');

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

  // Mobile menu button click handler
  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleMobileMenu();
    });
  }

  // Backdrop click closes mobile drawer
  if (backdrop) {
    backdrop.addEventListener('click', () => {
      closeMobileMenu(true);
    });
  }

  // Prevent accidental closure when clicking inside the mobile drawer content
  if (mobileDrawer) {
    mobileDrawer.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  }

  // Close mobile drawer on desktop resize (>= 1024px)
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 1024) {
      const drawer = document.getElementById('mobile-drawer');
      if (drawer && drawer.classList.contains('open')) {
        closeMobileMenu(false);
      }
    }
  }, { passive: true });

  // Scroll spy for active section highlight
  initScrollSpy();

  // Skip to main content keyboard focus transfer (DEF-006)
  const skipLink = document.querySelector('.skip-to-content');
  if (skipLink) {
    skipLink.addEventListener('click', () => {
      const target = document.getElementById('main-content');
      if (target) {
        target.focus();
      }
    });
  }

  // Check URL hash or pending section on load
  const hash = window.location.hash.replace('#', '');
  if (hash) {
    const label = TARGET_LABEL_MAP[hash];
    if (label) {
      setActiveNav(label);
    }
    const doScroll = () => {
      if (label) lockNavScroll(label);
      scrollToTarget(hash);
    };
    if (document.readyState === 'complete') {
      setTimeout(doScroll, 80);
    } else {
      window.addEventListener('load', () => setTimeout(doScroll, 80), { once: true });
    }
  }
}

/**
 * Scroll smoothly with dynamic navbar offset
 */
function scrollToTarget(targetId) {
  const el = document.getElementById(targetId);
  if (el) {
    const navHeight = getNavbarHeight();
    const elementPosition = el.getBoundingClientRect().top + window.pageYOffset;
    const offsetPosition = Math.max(0, Math.round(elementPosition - navHeight));
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
  const isAboutPage = window.location.search.includes('page=about');
  const isHomePage = window.location.search.includes('page=home');
  if (page === 'home' || page === 'top') {
    if (!isHomePage) {
      window.location.href = 'index.php?page=home';
    } else {
      lockNavScroll('Home');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  } else if (page === 'about') {
    if (isAboutPage) {
      lockNavScroll('About');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
      goToSection('about', 'home', 'About');
    }
  } else {
    if (!isHomePage) {
      window.location.href = 'index.php?page=home#' + page;
    } else {
      goToSection(page, 'home');
    }
  }
}

/**
 * Navigate directly to any section on the single-page layout
 */
function goToSection(targetId, targetPage, navLabel) {
  closeMobileMenu();
  const label = navLabel || TARGET_LABEL_MAP[targetId];

  if (targetPage && targetPage !== 'home') {
    const isDefaultAbstract = targetPage === 'abstract-submission' && !window.location.search.includes('page=');
    if ((window.location.search.includes('page=' + targetPage) || isDefaultAbstract) && targetId && document.getElementById(targetId)) {
      if (label) lockNavScroll(label);
      scrollToTarget(targetId);
      return;
    }
    const hash = (targetId && targetId !== targetPage) ? '#' + encodeURIComponent(targetId) : '';
    window.location.href = 'index.php?page=' + encodeURIComponent(targetPage) + hash;
    return;
  }

  const isHomePage = window.location.search.includes('page=home');
  if (!isHomePage) {
    if (targetId === 'top') {
      window.location.href = 'index.php?page=home';
    } else {
      window.location.href = 'index.php?page=home#' + targetId;
    }
    return;
  }

  // Lock active indicator during programmatic smooth scroll
  if (label) {
    lockNavScroll(label);
  }

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

function initScrollSpy() {
  const params = new URLSearchParams(window.location.search);
  const currentPageParam = (params.get('page') || 'abstract-submission').toLowerCase();

  const homeSections = [
    { id: 'about', label: 'About' },
    { id: 'tracks', label: 'Tracks' },
    { id: 'committee', label: 'Committee' },
    { id: 'speakers', label: 'Speakers' },
    { id: 'venue', label: 'Venue' }
  ];

  let ticking = false;

  function updateActiveNav() {
    // If programmatic smooth scroll is animating, keep user's chosen section active
    if (isProgrammaticScroll) {
      return;
    }

    if (currentPageParam === 'sponsor') {
      setActiveNav('Sponsor');
      return;
    }

    if (currentPageParam === 'terms-and-conditions') {
      setActiveNav('Terms & Conditions');
      return;
    }

    if (currentPageParam === 'about') {
      setActiveNav('About');
      return;
    }

    if (currentPageParam === 'conference-acknowledgement') {
      setActiveNav('');
      return;
    }

    const navHeight = getNavbarHeight();
    const readLine = Math.max(navHeight + 45, Math.min(window.innerHeight * 0.35, navHeight + 160));

    if (currentPageParam === 'abstract-submission') {
      if (window.scrollY < 200) {
        setActiveNav('Abstract Submission');
        return;
      }
      const feesEl = document.getElementById('fees');
      if (feesEl) {
        const r = feesEl.getBoundingClientRect();
        if (r.top <= readLine && r.bottom > readLine) {
          setActiveNav('Registration');
          return;
        }
      }
      setActiveNav('Abstract Submission');
      return;
    }

    // Home page scroll spy
    // 1. If at or near top of page, highlight Home
    if (window.scrollY < 200) {
      setActiveNav('Home');
      return;
    }

    // 2. Inspect sections in reading line zone (navbar height + reading offset)
    const intersecting = [];

    for (const s of homeSections) {
      const el = document.getElementById(s.id);
      if (!el) continue;
      const r = el.getBoundingClientRect();
      if (r.top <= readLine && r.bottom > readLine) {
        intersecting.push({ s, r });
      }
    }

    if (intersecting.length) {
      intersecting.sort((a, b) => a.r.height - b.r.height);
      setActiveNav(intersecting[0].s.label);
      return;
    }

    // 3. If near bottom of document, keep Venue highlighted
    if ((window.innerHeight + window.scrollY) >= (document.documentElement.scrollHeight - 60)) {
      setActiveNav('Venue');
    }
  }

  // Export internal update for programmatic release
  window.__updateActiveNav = updateActiveNav;

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
window.setActiveNav = setActiveNav;
window.openMobileMenu = openMobileMenu;
window.closeMobileMenu = closeMobileMenu;
window.toggleMobileMenu = toggleMobileMenu;
