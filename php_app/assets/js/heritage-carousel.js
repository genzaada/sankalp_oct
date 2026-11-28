/**
 * Heritage Showcase Carousel & Lightbox Controller
 * ICAIESF 2027 — School of Engineering & Technology, MGM University
 * 
 * Features:
 * - Fluid horizontal sliding track with active slide centering
 * - Touch swipe gestures with velocity threshold
 * - Autoplay timer (5.5s) with pause on hover/touch/focus
 * - Fullscreen responsive editorial Lightbox with keyboard navigation (Esc, ArrowLeft, ArrowRight)
 * - WAI-ARIA live region accessibility updates
 */

(function () {
  'use strict';

  let currentIdx = 0;
  let autoplayTimer = null;
  const AUTOPLAY_DELAY = 5500;
  let isLightboxOpen = false;
  let lightboxCurrentIdx = 0;

  // Touch gesture state
  let touchStartX = 0;
  let touchStartY = 0;
  let touchEndX = 0;
  let isSwiping = false;

  function initHeritageCarousel() {
    const track = document.getElementById('heritage-slider-track');
    const wrapper = document.querySelector('.heritage-carousel-wrapper');
    const slides = document.querySelectorAll('.heritage-slide');
    if (!track || !slides || slides.length === 0) return;

    const totalSlides = slides.length;
    const prevBtns = document.querySelectorAll('.heritage-prev-btn');
    const nextBtns = document.querySelectorAll('.heritage-next-btn');
    const dots = document.querySelectorAll('.heritage-dot');
    const counterDisplay = document.getElementById('heritage-current-idx');

    function updateCarousel(newIdx, instant = false) {
      if (newIdx < 0) {
        newIdx = totalSlides - 1;
      } else if (newIdx >= totalSlides) {
        newIdx = 0;
      }

      currentIdx = newIdx;

      // Calculate track translation
      const slide = slides[currentIdx];
      const wrapperWidth = wrapper.offsetWidth;
      const slideWidth = slide.offsetWidth;
      const slideOffsetLeft = slide.offsetLeft;

      // Position active slide with balanced margin
      let targetX = 0;
      if (wrapperWidth > slideWidth) {
        // Desktop / Tablet: center the active card in the viewport
        targetX = slideOffsetLeft - (wrapperWidth - slideWidth) / 2;
      } else {
        // Mobile: align to left with a small margin
        targetX = slideOffsetLeft;
      }

      // Bound within track bounds
      const maxScroll = track.scrollWidth - wrapperWidth;
      if (targetX < 0) targetX = 0;
      if (maxScroll > 0 && targetX > maxScroll) targetX = maxScroll;

      if (instant) {
        track.style.transition = 'none';
      } else {
        track.style.transition = 'transform 0.55s cubic-bezier(0.22, 1, 0.36, 1)';
      }
      track.style.transform = `translateX(-${targetX}px)`;

      // Update active slide class
      slides.forEach((s, i) => {
        if (i === currentIdx) {
          s.classList.add('is-active');
          s.setAttribute('aria-hidden', 'false');
        } else {
          s.classList.remove('is-active');
          s.setAttribute('aria-hidden', 'true');
        }
      });

      // Update dots if present
      if (dots && dots.length > 0) {
        dots.forEach((dot, i) => {
          const isActive = i === currentIdx;
          dot.classList.toggle('is-active', isActive);
          dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });
      }

      // Update numeric counter
      if (counterDisplay) {
        counterDisplay.textContent = String(currentIdx + 1).padStart(2, '0');
      }
    }

    // Navigation triggers
    prevBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        stopAutoplay();
        updateCarousel(currentIdx - 1);
        startAutoplay();
      });
    });

    nextBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        stopAutoplay();
        updateCarousel(currentIdx + 1);
        startAutoplay();
      });
    });

    if (dots && dots.length > 0) {
      dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
          stopAutoplay();
          updateCarousel(i);
          startAutoplay();
        });
      });
    }

    // Autoplay routines
    function startAutoplay() {
      stopAutoplay();
      autoplayTimer = setInterval(() => {
        if (!isLightboxOpen && document.visibilityState === 'visible') {
          updateCarousel(currentIdx + 1);
        }
      }, AUTOPLAY_DELAY);
    }

    function stopAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    // Pause autoplay on mouse hover, focus, or touch
    if (wrapper) {
      wrapper.addEventListener('mouseenter', stopAutoplay);
      wrapper.addEventListener('mouseleave', startAutoplay);
      wrapper.addEventListener('focusin', stopAutoplay);
      wrapper.addEventListener('focusout', startAutoplay);

      // Keyboard arrow keys when carousel is focused
      wrapper.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
          e.preventDefault();
          stopAutoplay();
          updateCarousel(currentIdx - 1);
          startAutoplay();
        } else if (e.key === 'ArrowRight') {
          e.preventDefault();
          stopAutoplay();
          updateCarousel(currentIdx + 1);
          startAutoplay();
        }
      });

      // Touch & Swipe gestures
      wrapper.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
          touchStartX = e.touches[0].clientX;
          touchStartY = e.touches[0].clientY;
          isSwiping = true;
          stopAutoplay();
        }
      }, { passive: true });

      wrapper.addEventListener('touchmove', (e) => {
        if (!isSwiping || e.touches.length !== 1) return;
        touchEndX = e.touches[0].clientX;
      }, { passive: true });

      wrapper.addEventListener('touchend', () => {
        if (!isSwiping) return;
        isSwiping = false;
        const deltaX = touchStartX - touchEndX;
        if (Math.abs(deltaX) > 45 && touchEndX !== 0) {
          if (deltaX > 0) {
            updateCarousel(currentIdx + 1);
          } else {
            updateCarousel(currentIdx - 1);
          }
        }
        touchStartX = 0;
        touchEndX = 0;
        startAutoplay();
      });
    }

    // Responsive window resize re-alignment
    let resizeTimer = null;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        updateCarousel(currentIdx, true);
      }, 100);
    });

    // Initial setup
    updateCarousel(0, true);
    startAutoplay();
  }

  // Lightbox Implementation
  window.openHeritageLightbox = function (idx) {
    const lightbox = document.getElementById('heritage-lightbox');
    const slides = document.querySelectorAll('.heritage-slide');
    if (!lightbox || !slides || !slides[idx]) return;

    lightboxCurrentIdx = idx;
    isLightboxOpen = true;

    populateLightboxData(lightboxCurrentIdx);
    lightbox.classList.add('is-open');
    lightbox.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Focus close button
    const closeBtn = lightbox.querySelector('.heritage-lightbox-close');
    if (closeBtn) {
      setTimeout(() => closeBtn.focus(), 100);
    }
  };

  window.closeHeritageLightbox = function () {
    const lightbox = document.getElementById('heritage-lightbox');
    if (!lightbox) return;

    lightbox.classList.remove('is-open');
    lightbox.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    isLightboxOpen = false;
  };

  window.stepHeritageLightbox = function (step) {
    const slides = document.querySelectorAll('.heritage-slide');
    if (!slides || slides.length === 0) return;

    let nextIdx = lightboxCurrentIdx + step;
    if (nextIdx < 0) nextIdx = slides.length - 1;
    if (nextIdx >= slides.length) nextIdx = 0;

    lightboxCurrentIdx = nextIdx;
    populateLightboxData(lightboxCurrentIdx);

    // Keep background carousel synchronized
    const track = document.getElementById('heritage-slider-track');
    if (track) {
      const dot = document.querySelector(`.heritage-dot[data-slide-to="${lightboxCurrentIdx}"]`);
      if (dot) dot.click();
    }
  };

  function populateLightboxData(idx) {
    const slides = document.querySelectorAll('.heritage-slide');
    const slide = slides[idx];
    if (!slide) return;

    const img = document.getElementById('heritage-lightbox-img');
    const title = document.getElementById('heritage-lightbox-title');
    const badge = document.getElementById('heritage-lightbox-badge');
    const counter = document.getElementById('heritage-lightbox-counter');
    const loc = document.getElementById('heritage-lightbox-location');
    const desc = document.getElementById('heritage-lightbox-desc');

    if (img) {
      img.src = slide.dataset.image || '';
      img.alt = slide.dataset.title || '';
    }
    if (title) title.textContent = slide.dataset.title || '';
    if (badge) badge.textContent = slide.dataset.badge || '';
    if (counter) counter.textContent = `${String(idx + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
    if (loc) loc.textContent = `${slide.dataset.location || ''} • ${slide.dataset.era || ''}`;
    if (desc) desc.textContent = slide.dataset.details || slide.dataset.caption || '';
  }

  // Keyboard navigation for Lightbox
  document.addEventListener('keydown', (e) => {
    if (!isLightboxOpen) return;

    if (e.key === 'Escape') {
      e.preventDefault();
      closeHeritageLightbox();
    } else if (e.key === 'ArrowLeft') {
      e.preventDefault();
      stepHeritageLightbox(-1);
    } else if (e.key === 'ArrowRight') {
      e.preventDefault();
      stepHeritageLightbox(1);
    }
  });

  // DOMContentLoaded bootstrap
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeritageCarousel);
  } else {
    initHeritageCarousel();
  }
})();
