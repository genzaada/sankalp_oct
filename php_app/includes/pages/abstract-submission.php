<?php
/**
 * Abstract Submission Page View Template
 * ICAIESF 2027 — Abstract & Paper Submission Guidelines
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';

$paperDeadline = 'January 15, 2027';
if (!empty($conferenceData['dates'])) {
    foreach ($conferenceData['dates'] as $d) {
        if ($d['label'] === 'Paper Submission Deadline') {
            $paperDeadline = $d['date'];
            break;
        }
    }
}
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'abstract-submission' ? 'display:block;' : 'display:none;' ?> min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <?php require __DIR__ . '/../sections/hero.php'; ?>

  <?php require __DIR__ . '/../sections/cfp-fees.php'; ?>

  <!-- Explore Tracks Callout -->
  <section class="section-light" style="padding-top: 0; padding-bottom: 2.5rem;">
    <div class="container" style="max-width: 52rem;">
      <div class="card reveal-up" style="padding: 1.5rem 2rem; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem;">
        <div style="text-align: left;">
          <p class="eyebrow" style="margin-bottom: 0.25rem;">Conference Tracks</p>
          <p style="font-size: 0.9375rem; color: var(--color-text-heading); font-weight: 500; margin: 0;">
            Click on <strong>View Tracks</strong> to explore all six official conference tracks before submitting your abstract.
          </p>
        </div>
        <button type="button" onclick="goToSection('tracks', 'home', 'Tracks')" class="btn-primary"
          style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; white-space: nowrap; flex-shrink: 0;">
          View Tracks <?= render_icon('arrow-right') ?>
        </button>
      </div>
    </div>
  </section>

  <!-- Abstract Submission Content -->
  <section class="section-light" style="padding-top: 0; padding-bottom: 5rem;">
    <div class="container" style="max-width: 52rem;">
      <div class="reveal-up" style="border-radius: 1rem; padding: 2.5rem; display: flex; flex-direction: column; gap: 1.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #ffffff; box-shadow: 0 12px 32px rgba(10, 74, 71, 0.14);">
        <div style="position: absolute; right: -2rem; bottom: -2rem; width: 12rem; height: 12rem; border-radius: 50%; opacity: 0.1; background: #ffffff; filter: blur(40px); pointer-events: none;"></div>

        <div style="position: relative; z-index: 10;">
          <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.25); font-size: 10px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 1rem; color: rgba(255,255,255,0.85);">
            Paper Submission Deadline: <?= e($paperDeadline) ?>
          </div>
          <h2 class="font-display font-bold uppercase tracking-wide" style="font-size: 1.5rem; margin-bottom: 0.75rem; color: #ffffff;">
            Submit Your Abstract
          </h2>
          <p style="font-size: 0.9375rem; line-height: 1.65; color: rgba(255,255,255,0.88); margin: 0;">
            We invite original research papers, case studies, and comprehensive review papers addressing one of the six official conference tracks in intelligent engineering and sustainable systems. All submitted manuscripts will undergo a rigorous peer-review evaluation, with accepted and presented papers intended for publication in peer-reviewed conference proceedings, subject to formal publisher agreements and institutional approval.
          </p>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; position: relative; z-index: 10;">
          <button type="button" onclick="openSubmissionModal()" class="btn-amber"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            Submission Guidelines <?= render_icon('arrow-right') ?>
          </button>

          <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" class="btn-outline-white"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            <?= render_icon('download') ?> Author Guidelines (PDF)
          </button>

          <a href="index.php" class="btn-outline-white"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; text-decoration: none;">
            Back to Home <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
