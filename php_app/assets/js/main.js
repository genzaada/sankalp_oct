/**
 * SANKALP 2027 Main Orchestration Script
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Initialize Navigation
  if (typeof initNavigation === 'function') {
    initNavigation();
  }

  // 2. Initialize Live Countdown
  const cdWrapper = document.getElementById('countdown-widget');
  if (cdWrapper && typeof initCountdown === 'function') {
    const target = cdWrapper.getAttribute('data-target') || '2027-02-15T00:00:00Z';
    initCountdown(target);
  }

  // 3. Initialize Step Counters
  if (typeof initAnimatedCounters === 'function') {
    initAnimatedCounters();
  }

  // 4. Initialize AJAX Forms
  if (typeof initForms === 'function') {
    initForms();
  }

  // 5. Initialize Viewport Intersection Reveal
  initViewportReveals();

  // 6. Initialize Sponsor Scroller Controls
  initSponsorScroller();

  // 7. Initialize Speakers Mobile Carousel Dots
  initSpeakerCarousel();
});

/**
 * Scroll reveal animations via IntersectionObserver
 */
function initViewportReveals() {
  const revealElements = document.querySelectorAll('.reveal-up');
  if (!revealElements.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  revealElements.forEach(el => observer.observe(el));
}

/**
 * Sponsor Scroller manual buttons
 */
function initSponsorScroller() {
  const track = document.getElementById('sponsor-track');
  const prevBtn = document.getElementById('sponsor-prev');
  const nextBtn = document.getElementById('sponsor-next');

  if (track && prevBtn && nextBtn) {
    prevBtn.addEventListener('click', () => {
      track.scrollBy({ left: -220, behavior: 'smooth' });
    });
    nextBtn.addEventListener('click', () => {
      track.scrollBy({ left: 220, behavior: 'smooth' });
    });
  }
}

/**
 * Speaker Mobile Snap Slider Dots
 */
function initSpeakerCarousel() {
  const slider = document.getElementById('speaker-mobile-slider');
  const dots = document.querySelectorAll('.speaker-dot');

  if (slider && dots.length) {
    slider.addEventListener('scroll', () => {
      const scrollPos = slider.scrollLeft;
      const cardWidth = slider.querySelector('.speaker-mobile-card')?.offsetWidth || 220;
      const activeIndex = Math.min(Math.round(scrollPos / cardWidth), dots.length - 1);
      
      dots.forEach((dot, idx) => {
        if (idx === activeIndex) {
          dot.style.width = '20px';
          dot.style.background = 'var(--color-primary-700)';
        } else {
          dot.style.width = '8px';
          dot.style.background = 'var(--color-border)';
        }
      });
    }, { passive: true });

    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => {
        const cards = slider.querySelectorAll('.speaker-mobile-card');
        if (cards[idx]) {
          cards[idx].scrollIntoView({ behavior: 'smooth', inline: 'center' });
        }
      });
    });
  }
}

/**
 * Simulated PDF download helper
 */
function downloadFile(filename) {
  const link = document.createElement('a');
  link.href = '#';
  link.setAttribute('download', filename);
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
window.downloadFile = downloadFile;
