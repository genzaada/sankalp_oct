/**
 * Animated Number Counters Module
 * Replaces Framer Motion AnimatedCounter component
 * Step duration: 30ms, total duration: 1200ms
 */

function initAnimatedCounters() {
  const counterElements = document.querySelectorAll('.counter-value');
  if (!counterElements.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  counterElements.forEach(el => observer.observe(el));
}

function animateCounter(el) {
  const originalVal = el.getAttribute('data-value') || el.textContent.trim();
  const numericMatch = originalVal.match(/(\d+)/);
  if (!numericMatch) return;

  const targetNumber = parseInt(numericMatch[0], 10);
  const suffix = originalVal.replace(/\d+/g, '');

  let current = 0;
  const duration = 1200;
  const stepTime = 30;
  const steps = duration / stepTime;
  const increment = targetNumber / steps;

  const timer = setInterval(() => {
    current += increment;
    if (current >= targetNumber) {
      el.textContent = targetNumber + suffix;
      clearInterval(timer);
    } else {
      el.textContent = Math.floor(current) + suffix;
    }
  }, stepTime);
}

window.initAnimatedCounters = initAnimatedCounters;
