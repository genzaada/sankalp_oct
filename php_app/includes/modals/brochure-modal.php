<?php $config = $config ?? require __DIR__ . '/../../config/app.php'; ?>
<!-- Conference Brochure Notice Modal Component -->
<div id="modal-brochure" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-brochure-title">
  <div class="modal-window" style="max-width: 520px; text-align: center; padding: 2.5rem 2rem;">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-brochure')" aria-label="Close Brochure Dialog">
      <?= render_icon('x') ?>
    </button>

    <div style="width: 4rem; height: 4rem; border-radius: 50%; margin: 0 auto 1.25rem auto; background: rgba(18, 124, 111, 0.1); border: 2px solid var(--color-primary-500); display: flex; align-items: center; justify-content: center; font-size: 1.75rem; color: var(--color-primary-700);">
      <?= render_icon('file-text') ?>
    </div>

    <span class="eyebrow" style="margin-bottom: 0.5rem;"><?= e($config['app_name']) ?></span>
    <h3 id="modal-brochure-title" class="font-display font-bold text-2xl" style="color: var(--color-primary-700); font-size: 1.5rem; margin-bottom: 0.75rem;">
      Conference Brochure Coming Soon
    </h3>
    <p style="font-size: 0.875rem; color: var(--color-text-body); max-width: 26rem; margin: 0 auto 1.5rem auto; line-height: 1.6;">
      The official <?= e($config['app_name']) ?> conference brochure, detailed track outlines, and delegate information are currently in preparation. It will be released prior to the early bird registration deadline.
    </p>

    <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1.25rem; border-radius: 9999px; background: rgba(242, 183, 5, 0.1); border: 1px solid rgba(242, 183, 5, 0.3); font-family: var(--font-mono); font-size: 0.8125rem; font-weight: 600; color: var(--color-primary-900); margin-bottom: 1.75rem;">
      <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber);"></span>
      Status: In Editorial Preparation
    </div>

    <div style="display: flex; justify-content: center; gap: 0.75rem;">
      <button type="button" class="btn-primary" style="padding: 0.75rem 2rem; font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.05em;" onclick="closeModal('modal-brochure')">
        Understood
      </button>
    </div>
  </div>
</div>
