/**
 * Modals & Dialogs Module
 * Controls Registration, Submission & Brochure Modals
 * Features: ARIA attributes, Keyboard focus trap, ESC dismissal, and focus restoration
 */

// Track the element that triggered the modal for focus restoration
let previousActiveElement = null;

const FOCUSABLE_SELECTORS = 'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (!modal) return;

  // Remember trigger element
  previousActiveElement = document.activeElement;

  modal.classList.add('open');
  document.body.style.overflow = 'hidden';

  // Set focus to the first focusable element or the close button
  const focusables = modal.querySelectorAll(FOCUSABLE_SELECTORS);
  if (focusables.length > 0) {
    // Focus the first focusable element after a brief tick to ensure visibility
    setTimeout(() => {
      focusables[0].focus();
    }, 50);
  }
}

function closeModal(modalId) {
  const modal = typeof modalId === 'string' ? document.getElementById(modalId) : modalId;
  if (!modal) return;

  modal.classList.remove('open');

  // Check if any other modal is still open
  const openModals = document.querySelectorAll('.modal-overlay.open');
  if (openModals.length === 0) {
    document.body.style.overflow = '';
  }

  // Restore focus to previous triggering element
  if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
    setTimeout(() => {
      previousActiveElement.focus();
      previousActiveElement = null;
    }, 50);
  }
}

function openRegistrationModal(category = 'Students', type = 'early_bird') {
  const catSelect = document.getElementById('reg-category');
  const typeSelect = document.getElementById('reg-type');
  if (catSelect && category) catSelect.value = category;
  if (typeSelect && type) typeSelect.value = type;
  openModal('modal-registration');
}

function openSubmissionModal(trackId, trackTitle) {
  const trackBox = document.getElementById('cmt-selected-track-box');
  const trackName = document.getElementById('cmt-selected-track-name');

  if (trackBox && trackName) {
    if (trackTitle) {
      trackName.textContent = trackTitle;
      trackBox.style.display = 'block';
    } else {
      trackBox.style.display = 'none';
    }
  }

  openModal('modal-submission');
}

function showBrochureNotice() {
  openModal('modal-brochure');
}

// Trap focus inside open modal and support Escape key
document.addEventListener('keydown', (e) => {
  const activeModal = document.querySelector('.modal-overlay.open');
  if (!activeModal) return;

  if (e.key === 'Escape') {
    closeModal(activeModal);
    return;
  }

  if (e.key === 'Tab') {
    const focusables = Array.from(activeModal.querySelectorAll(FOCUSABLE_SELECTORS)).filter(
      el => el.offsetWidth > 0 || el.offsetHeight > 0 || el === document.activeElement
    );

    if (focusables.length === 0) {
      e.preventDefault();
      return;
    }

    const firstElement = focusables[0];
    const lastElement = focusables[focusables.length - 1];

    if (e.shiftKey) {
      // Shift + Tab: if on first element, wrap to last
      if (document.activeElement === firstElement || !activeModal.contains(document.activeElement)) {
        e.preventDefault();
        lastElement.focus();
      }
    } else {
      // Tab: if on last element, wrap to first
      if (document.activeElement === lastElement || !activeModal.contains(document.activeElement)) {
        e.preventDefault();
        firstElement.focus();
      }
    }
  }
});

// Close modal when clicking directly on the backdrop (outside modal-window)
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('modal-overlay') && e.target.classList.contains('open')) {
    closeModal(e.target);
  }
});

window.openModal = openModal;
window.closeModal = closeModal;
window.openRegistrationModal = openRegistrationModal;
window.openSubmissionModal = openSubmissionModal;
window.showBrochureNotice = showBrochureNotice;
