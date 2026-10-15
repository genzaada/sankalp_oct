<?php
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';

// Find deadline from conference data if available
$subDeadline = '30 Sept, 2026';
if (!empty($conferenceData['dates'])) {
    foreach ($conferenceData['dates'] as $d) {
        if (stripos($d['label'], 'submission') !== false) {
            $subDeadline = $d['date'];
            break;
        }
    }
}
?>
<!-- Call for Papers / Abstract Submission Modal (To Be Announced State) -->
<div id="modal-submission" class="modal-overlay">
  <div class="modal-window" style="max-width: 520px; text-align: center; padding: 2.75rem 2.25rem;">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-submission')" aria-label="Close Announcement Dialog">
      <?= render_icon('x') ?>
    </button>

    <!-- Top Badge / Announcement Icon -->
    <div style="width: 4.5rem; height: 4.5rem; margin: 0 auto 1.25rem; border-radius: 50%; background: rgba(242, 183, 5, 0.15); border: 2px solid rgba(242, 183, 5, 0.4); display: flex; align-items: center; justify-content: center; font-size: 2rem; box-shadow: 0 10px 25px rgba(242, 183, 5, 0.15);">
      📢
    </div>

    <!-- Eyebrow Tag -->
    <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.35rem 0.85rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.1); border: 1px solid rgba(18, 124, 111, 0.2); margin-bottom: 0.85rem;">
      <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber); display: inline-block;"></span>
      <span class="font-mono uppercase font-bold text-xs" style="font-size: 11px; letter-spacing: 0.08em; color: var(--color-primary-700);">
        Call for Papers
      </span>
    </div>

    <!-- Main Heading -->
    <h3 class="font-display font-bold" style="font-size: 2rem; color: var(--color-primary-900); margin-bottom: 0.75rem; letter-spacing: -0.01em;">
      To Be Announced
    </h3>

    <!-- Description -->
    <p style="font-size: 0.9375rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 1.75rem; max-width: 26rem; margin-left: auto; margin-right: auto;">
      The official paper submission portal, manuscript formatting guidelines, and review timeline for <strong><?= e($config['app_name']) ?></strong> will be announced shortly.
    </p>

    <!-- Key Milestone Highlight Box -->
    <div style="background: var(--color-bg-light); border: 1px solid var(--color-border); border-radius: 12px; padding: 1.25rem; margin-bottom: 1.75rem; text-align: left;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; padding-bottom: 0.75rem; border-bottom: 1px solid rgba(0,0,0,0.06);">
        <span style="font-size: 0.8125rem; color: var(--color-text-body); font-weight: 500;">Expected Submission Deadline</span>
        <span class="font-mono font-bold" style="font-size: 0.8125rem; color: var(--color-primary-700);"><?= e($subDeadline) ?></span>
      </div>
      <div style="display: flex; align-items: center; justify-content: space-between;">
        <span style="font-size: 0.8125rem; color: var(--color-text-body); font-weight: 500;">Conference Presentation Dates</span>
        <span class="font-mono font-bold" style="font-size: 0.8125rem; color: var(--color-primary-700);"><?= e($config['app_dates']) ?></span>
      </div>
    </div>

    <!-- Action Buttons -->
    <div style="display: flex; flex-direction: column; gap: 0.75rem; max-width: 18rem; margin: 0 auto;">
      <button type="button" class="btn-primary" style="padding: 0.75rem 1.75rem; font-size: 0.8125rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; width: 100%;" onclick="closeModal('modal-submission')">
        Close Window
      </button>
      <a href="mailto:<?= e($config['contact_email']) ?>" style="font-size: 0.75rem; color: var(--color-primary-500); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 0.35rem;">
        Questions? Contact <?= e($config['contact_email']) ?>
      </a>
    </div>

  </div>
</div>
