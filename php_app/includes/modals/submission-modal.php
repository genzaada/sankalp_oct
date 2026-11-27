<?php
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$subTracks = $conferenceData['tracks'] ?? [];
$cmtUrl = $config['cmt_submission_url'] ?? '';
?>
<!-- Official Microsoft CMT Submission Information & Redirection Modal -->
<div id="modal-submission" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-submission-title">
  <div class="modal-window" style="max-width: 580px; padding: 2.25rem 2rem;">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-submission')" aria-label="Close Submission Dialog" title="Close Submission Dialog">
      <?= render_icon('x') ?>
      <span class="sr-only">Close Submission Dialog</span>
    </button>

    <!-- Top Badge -->
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
      <span style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.1); border: 1px solid rgba(18, 124, 111, 0.25); font-family: var(--font-mono); font-size: 10px; font-weight: 700; text-transform: uppercase; color: var(--color-primary-700);">
        Microsoft CMT &bull; Official Peer Review Portal
      </span>
    </div>

    <!-- Main Heading -->
    <h3 id="modal-submission-title" class="font-display font-bold text-2xl" style="color: var(--color-primary-700); font-size: 1.45rem; margin-bottom: 0.5rem;">
      Paper Submission via Microsoft CMT
    </h3>
    <p style="font-size: 0.875rem; color: var(--color-text-body); line-height: 1.6; margin-bottom: 1.25rem;">
      All research manuscripts, case studies, and review papers for <strong><?= e($config['app_name']) ?></strong> must be submitted directly through the Microsoft Conference Management Toolkit (CMT).
    </p>

    <!-- Target Track Indicator (Dynamic) -->
    <div id="cmt-selected-track-box" style="display: none; padding: 0.75rem 1rem; border-radius: 0.75rem; background: rgba(18, 124, 111, 0.06); border: 1px solid rgba(18, 124, 111, 0.18); margin-bottom: 1.25rem;">
      <span class="font-mono uppercase font-bold" style="font-size: 10px; color: var(--color-primary-700); display: block; margin-bottom: 0.25rem;">Selected Track</span>
      <p id="cmt-selected-track-name" class="font-semibold" style="font-size: 0.8125rem; color: var(--color-text-heading); margin: 0;"></p>
    </div>

    <!-- Key Submission Requirements Highlights (Provisional) -->
    <div style="background: var(--color-bg-light); border: 1px solid var(--color-border); border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; font-size: 0.8125rem;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem;">
        <h4 class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-primary-700); margin: 0;">
          Submission Guidelines (Provisional)
        </h4>
        <span style="font-size: 9px; font-family: var(--font-mono); color: #92400e; background: #fffbeb; border: 1px solid #fef3c7; padding: 0.125rem 0.375rem; border-radius: 4px;">
          Subject to Confirmation
        </span>
      </div>
      <ul style="margin: 0; padding-left: 1.25rem; color: var(--color-text-body); line-height: 1.55; display: flex; flex-direction: column; gap: 0.35rem;">
        <li><strong>Peer Review Process (Provisional):</strong> Submissions will undergo an expert peer-review evaluation. Specific review protocols and manuscript preparation instructions will accompany the official CFP notification.</li>
        <li><strong>Manuscript Formatting (Provisional):</strong> Standard academic two-column conference format. Official templates, specifications, and page constraints will accompany formal CFP activation.</li>
        <li><strong>Originality &amp; Academic Integrity:</strong> Submissions must represent original, unpublished research adhering to academic ethics and free from plagiarism or duplicate submission.</li>
        <li><strong>Electronic Submission:</strong> Electronic manuscripts must be submitted in PDF format (.pdf) through Microsoft CMT.</li>
      </ul>
    </div>

    <!-- Status / Action Area -->
    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
      <?php if (!empty($cmtUrl)): ?>
        <a href="<?= e($cmtUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn-amber"
          style="padding: 0.875rem 1.5rem; font-size: 0.8125rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; text-decoration: none;">
          Go to Microsoft CMT Portal <?= render_icon('arrow-right') ?>
        </a>
      <?php else: ?>
        <div style="padding: 0.875rem 1rem; border-radius: 0.75rem; background: #fffbeb; border: 1px solid #fef3c7; display: flex; align-items: flex-start; gap: 0.625rem;">
          <span style="font-size: 1.15rem; line-height: 1.2;">📢</span>
          <div>
            <p style="font-size: 0.8125rem; font-weight: 700; color: #92400e; margin: 0 0 0.25rem 0;">
              CMT Portal Opening Soon
            </p>
            <p style="font-size: 0.75rem; color: #78350f; margin: 0; line-height: 1.45;">
              The official Microsoft CMT submission portal for <?= e($config['app_name']) ?> is currently being configured and awaits formal activation. Submissions are not currently open. The dedicated portal link will be activated here in accordance with the conference schedule.
            </p>
          </div>
        </div>
        <button type="button" disabled class="btn-amber"
          style="padding: 0.875rem 1.5rem; font-size: 0.8125rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; opacity: 0.65; cursor: not-allowed;">
          Submission Portal Opening Soon
        </button>
      <?php endif; ?>

      <div style="display: flex; gap: 0.75rem; justify-content: flex-end; margin-top: 0.5rem;">
        <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" class="btn-outline-teal"
          style="padding: 0.625rem 1.25rem; font-size: 0.75rem; font-weight: 600;">
          <?= render_icon('download') ?> Download Guidelines (PDF)
        </button>
        <button type="button" class="btn-primary" style="padding: 0.625rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;" onclick="closeModal('modal-submission')">
          Close
        </button>
      </div>
    </div>

  </div>
</div>
