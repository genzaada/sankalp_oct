<?php
/**
 * Conference Acknowledgement Page View Template
 * ICAIESF 2027 — Microsoft CMT Acknowledgement & Call to Participate
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'conference-acknowledgement' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Conference Acknowledgement Header -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 4.5rem; padding-bottom: 4.5rem; text-align: left; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <h1 class="font-display font-bold uppercase reveal-up" style="font-size: clamp(1.85rem, 4vw, 2.75rem); letter-spacing: 0.03em; color: var(--color-accent-amber); margin: 0 0 1rem 0;">
        CONFERENCE ACKNOWLEDGEMENT
      </h1>
      <p class="reveal-up delay-1" style="font-size: 0.9375rem; max-width: 42rem; margin: 0; color: rgba(255, 255, 255, 0.85); line-height: 1.6;">
        <?= e($config['app_name']) ?> — <?= e($config['app_subtitle']) ?>
      </p>
    </div>
  </section>

  <!-- Acknowledgement & Invitation Content -->
  <section class="section-white" style="padding-top: 3.5rem; padding-bottom: 4.5rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left; display: flex; flex-direction: column; gap: 2.5rem;">

        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
              Conference Acknowledgement
            </h2>
          </div>
          <p style="font-size: 1rem; line-height: 1.68; color: #111827; margin: 0;">
            The <strong style="color: var(--color-primary-700);">Microsoft CMT</strong> service is being used to manage the peer-review process for <strong style="color: var(--color-primary-700);">ICAIESF 2027</strong>. This service is provided free of charge by Microsoft, which bears all expenses, including Azure cloud services, software development, and support.
          </p>
        </div>

        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
              Submit Your Research and Join Us
            </h2>
          </div>
          <p style="font-size: 1rem; line-height: 1.68; color: #111827; margin: 0 0 2rem 0;">
            We look forward to receiving your valuable research contributions and welcoming you to ICAIESF 2027. Your participation will help foster meaningful academic-industry collaborations, facilitate the exchange of innovative ideas, and advance intelligent engineering solutions for a sustainable future.
          </p>

          <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center;">
            <a href="index.php?page=abstract-submission" class="btn-amber" style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
              Abstract Submission <?= render_icon('arrow-right') ?>
            </a>
            <a href="index.php?page=home" class="btn-outline-primary" style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid var(--color-primary-700); color: var(--color-primary-700);">
              Back to Home <?= render_icon('arrow-right') ?>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>
