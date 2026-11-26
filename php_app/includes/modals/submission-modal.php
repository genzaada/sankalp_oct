<?php
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$subTracks = $conferenceData['tracks'] ?? [];
$cmtUrl = $config['cmt_submission_url'] ?? '';
?>
<!-- Official Microsoft CMT Submission Information & Redirection Modal -->
<div id="modal-submission" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-submission-title">
  <div class="modal-window" style="max-width: 580px; padding: 2.25rem 2rem;">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-submission')" aria-label="Close Submission Dialog">
      <?= render_icon('x') ?>
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

    <!-- Key Submission Requirements Highlights -->
    <div style="background: var(--color-bg-light); border: 1px solid var(--color-border); border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; font-size: 0.8125rem;">
      <h4 class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-primary-700); margin-bottom: 0.5rem;">
        Key Submission Guidelines
      </h4>
      <ul style="margin: 0; padding-left: 1.25rem; color: var(--color-text-body); line-height: 1.55; display: flex; flex-direction: column; gap: 0.35rem;">
        <li><strong>Double-Blind Review:</strong> Manuscript must be anonymized with no author names or institutional affiliations.</li>
        <li><strong>Manuscript Length:</strong> Full papers should typically be 6 to 8 pages in standard two-column format.</li>
        <li><strong>Originality:</strong> Submissions must be original with similarity index strictly below 15–20%.</li>
        <li><strong>Format:</strong> Only PDF manuscripts (.pdf) are accepted for peer review.</li>
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
        <div style="padding: 0.75rem 1rem; border-radius: 0.75rem; background: #fffbeb; border: 1px solid #fef3c7; display: flex; align-items: center; gap: 0.625rem;">
          <span style="font-size: 1.15rem;">📢</span>
          <p style="font-size: 0.75rem; color: #92400e; margin: 0; line-height: 1.4;">
            <strong>CMT Portal Opening Soon:</strong> The official Microsoft CMT submission link for <?= e($config['app_name']) ?> will be activated here in accordance with the conference schedule.
          </p>
        </div>
      <?php endif; ?>

      <div style="display: flex; gap: 0.75rem; justify-content: flex-end; margin-top: 0.5rem;">
        <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" class="btn-outline-teal"
          style="padding: 0.625rem 1.25rem; font-size: 0.75rem; font-weight: 600;">
          <?= render_icon('download') ?> Download Guidelines
        </button>
        <button type="button" class="btn-primary" style="padding: 0.625rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;" onclick="closeModal('modal-submission')">
          Close
        </button>
      </div>
    </div>

  </div>
</div>
