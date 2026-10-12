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
  const sections = ['tracks', 'dates', 'speakers', 'cfp', 'fees', 'contact-section', 'venue', 'committee', 'about'];
  window.addEventListener('scroll', () => {
    const scrollPos = window.scrollY + NAVBAR_HEIGHT + 100;
    for (const id of sections) {
      const el = document.getElementById(id);
      if (el) {
        const top = el.offsetTop;
        const height = el.offsetHeight;
        if (scrollPos >= top && scrollPos < top + height) {
          const map = {
            'about': 'About',
            'tracks': 'Tracks',
            'dates': 'Schedule',
            'speakers': 'Speakers',
            'cfp': 'Call for Papers',
            'fees': 'Registration',
            'contact-section': 'Contact',
            'venue': 'Venue',
            'committee': 'Committee'
          };
          if (map[id]) setActiveNav(map[id]);
          break;
        }
      }
    }
  }, { passive: true });
}

window.initNavigation = initNavigation;
window.scrollToTarget = scrollToTarget;
window.navigateTo = navigateTo;
window.goToSection = goToSection;
