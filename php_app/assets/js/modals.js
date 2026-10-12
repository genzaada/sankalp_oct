/**
 * Modals & Dialogs Module
 * Controls Registration & Abstract Submission Modals
 */

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }
}

function openRegistrationModal(category = 'Students', type = 'early_bird') {
  const catSelect = document.getElementById('reg-category');
  const typeSelect = document.getElementById('reg-type');
  if (catSelect && category) catSelect.value = category;
  if (typeSelect && type) typeSelect.value = type;
  openModal('modal-registration');
}

function openSubmissionModal(trackId = 1) {
  const trackSelect = document.getElementById('sub-track');
  if (trackSelect && trackId) trackSelect.value = trackId;
  openModal('modal-submission');
}

// Close on backdrop click or ESC
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay.open').forEach(m => {
      m.classList.remove('open');
    });
    document.body.style.overflow = '';
  }
});

window.openModal = openModal;
window.closeModal = closeModal;
window.openRegistrationModal = openRegistrationModal;
window.openSubmissionModal = openSubmissionModal;
