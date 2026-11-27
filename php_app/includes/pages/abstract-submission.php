<?php
/**
 * Abstract Submission Page View Template
 * ICAIESF 2027 — Abstract & Paper Submission Guidelines
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'abstract-submission' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Abstract Submission Header -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 4.5rem; padding-bottom: 4.5rem; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <div class="pill-badge reveal-up" style="margin-bottom: 1.25rem;">Abstract Submission</div>
      <h1 class="font-display font-bold reveal-up delay-1" style="font-size: clamp(1.85rem, 4vw, 2.75rem); margin-bottom: 1rem; color: #fff;">
        Abstract Submission
      </h1>
      <p class="reveal-up delay-2" style="font-size: 0.9375rem; max-width: 42rem; margin: 0 auto; color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
        <?= e($config['app_name']) ?> — <?= e($config['app_subtitle']) ?>
      </p>
    </div>
  </section>

  <!-- Abstract Submission Content -->
  <section class="section-light" style="padding-top: 4rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 52rem;">
      <div class="reveal-up" style="border-radius: 1rem; padding: 2.5rem; display: flex; flex-direction: column; gap: 1.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #ffffff; box-shadow: 0 12px 32px rgba(10, 74, 71, 0.14);">
        <div style="position: absolute; right: -2rem; bottom: -2rem; width: 12rem; height: 12rem; border-radius: 50%; opacity: 0.1; background: #ffffff; filter: blur(40px); pointer-events: none;"></div>

        <div style="position: relative; z-index: 10;">
          <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.25); font-size: 10px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 1rem; color: rgba(255,255,255,0.85);">
            Abstract Last Date Submission: 20th December 2026
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
