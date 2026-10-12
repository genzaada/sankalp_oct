<!-- Registration Modal Component -->
<div id="modal-registration" class="modal-overlay">
  <div class="modal-window">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-registration')" aria-label="Close Registration Dialog">
      <?= render_icon('x') ?>
    </button>

    <div style="text-align: center; padding: 2rem 1rem 1rem 1rem;">
      <div style="width: 4rem; height: 4rem; border-radius: 50%; margin: 0 auto 1.5rem auto; background: rgba(242, 183, 5, 0.15); border: 2px solid var(--color-accent-amber); display: flex; align-items: center; justify-content: center; font-size: 1.75rem; color: var(--color-primary-700);">
        ⏳
      </div>

      <span class="eyebrow" style="margin-bottom: 0.5rem;">SANKALP 2027</span>
      <h3 class="font-display font-bold text-2xl" style="color: var(--color-primary-700); font-size: 1.75rem; margin-bottom: 0.75rem;">
        Registration Coming Soon!
      </h3>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 26rem; margin: 0 auto 1.75rem auto; line-height: 1.6;">
        Online delegate registrations and payment gateway will open shortly. Stay tuned for early bird registration announcements!
      </p>

      <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1.25rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); border: 1px solid rgba(18, 124, 111, 0.2); font-family: var(--font-mono); font-size: 0.8125rem; font-weight: 600; color: var(--color-primary-700); margin-bottom: 2rem;">
        <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber);"></span>
        Phase: Early Bird Opening Soon
      </div>

      <div>
        <button type="button" class="btn-primary" style="padding: 0.75rem 2rem; font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.05em;" onclick="closeModal('modal-registration')">
          Got It
        </button>
      </div>
    </div>
  </div>
</div>
