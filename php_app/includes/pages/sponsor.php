<?php
/**
 * Sponsor Page View Template
 * ICAIESF 2027 — Conference Organizers, Supporting Institutions & Sponsors
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$contactEmail = $config['contact_email'] ?? 'directorsoet@mgmu.ac.in';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'sponsor' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Sponsor Page Header -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 4.5rem; padding-bottom: 4.5rem; text-align: left; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <h1 class="font-display font-bold uppercase reveal-up" style="font-size: clamp(1.85rem, 4vw, 2.75rem); letter-spacing: 0.03em; color: var(--color-accent-amber); margin: 0 0 1rem 0;">
        PARTNERSHIP &amp; COLLABORATION
      </h1>
      <p class="reveal-up delay-2" style="font-size: 0.9375rem; max-width: 40rem; margin: 0; color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
        <?= e($config['app_name']) ?> — <?= e($config['app_subtitle']) ?>
      </p>
    </div>
  </section>

  <!-- Conference Organizers and Supporting Institutions -->
  <section class="section-white" style="padding-top: 3rem; padding-bottom: 3rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
          <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
            Conference Organizers and Supporting Institutions
          </h2>
        </div>

        <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0 0 1.25rem 0;">
          The conference is organized by the School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra, India.
        </p>

        <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: #111827; margin: 0 0 0.875rem 0;">
          Supported by:
        </h3>

        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.875rem;">
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; font-weight: 500; color: #111827;">
              SAEINDIA Chhatrapati Sambhajinagar Division
            </span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; font-weight: 500; color: #111827;">
              ASHRAE Pune Chapter
            </span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; font-weight: 500; color: #111827;">
              ISHRAE Chhatrapati Sambhajinagar Chapter
            </span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Sponsor Content Placeholder -->
  <section class="section-light" style="padding-top: 3rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 48rem;">
      <div class="card reveal-up" style="padding: 2.5rem; text-align: center;">
        <p class="eyebrow" style="margin-bottom: 0.75rem;">Sponsor Details</p>
        <h2 class="font-display font-bold" style="font-size: 1.5rem; color: var(--color-text-heading); margin-bottom: 1rem;">
          Sponsorship Information Coming Soon
        </h2>
        <p style="font-size: 0.9375rem; line-height: 1.65; color: var(--color-text-body); margin-bottom: 2rem;">
          Sponsorship packages and collaboration guidelines are currently being finalized. For partnership inquiries, please reach out to the Conference Secretariat.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center;">
          <a href="mailto:<?= e($contactEmail) ?>?subject=<?= rawurlencode($config['app_name'] . ' Sponsor Enquiry') ?>" class="btn-amber" style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
            <?= render_icon('mail') ?> Contact Secretariat
          </a>
          <a href="index.php?page=home" class="btn-outline-primary" style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid var(--color-primary-700); color: var(--color-primary-700);">
            Back to Home <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
