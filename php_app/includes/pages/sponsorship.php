<?php
/**
 * Sponsorship Page View Template
 * ICAIESF 2027 — Partnership & Collaboration
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$contactEmail = $config['contact_email'] ?? 'directorsoet@mgmu.ac.in';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'sponsorship' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Sponsorship Page Header -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 4.5rem; padding-bottom: 4.5rem; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <div class="pill-badge reveal-up" style="margin-bottom: 1.25rem;">Partnership &amp; Collaboration</div>
      <h1 class="font-display font-bold reveal-up delay-1" style="font-size: clamp(1.85rem, 4vw, 2.75rem); margin-bottom: 1rem; color: #fff;">
        Sponsorship Opportunities
      </h1>
      <p class="reveal-up delay-2" style="font-size: 0.9375rem; max-width: 40rem; margin: 0 auto; color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
        <?= e($config['app_name']) ?> — <?= e($config['app_subtitle']) ?>
      </p>
    </div>
  </section>

  <!-- Sponsorship Content Placeholder -->
  <section class="section-light" style="padding-top: 4rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 48rem;">
      <div class="card reveal-up" style="padding: 2.5rem; text-align: center;">
        <p class="eyebrow" style="margin-bottom: 0.75rem;">Sponsorship Details</p>
        <h2 class="font-display font-bold" style="font-size: 1.5rem; color: var(--color-text-heading); margin-bottom: 1rem;">
          Sponsorship Information Coming Soon
        </h2>
        <p style="font-size: 0.9375rem; line-height: 1.65; color: var(--color-text-body); margin-bottom: 2rem;">
          Sponsorship packages and collaboration guidelines are currently being finalized. For partnership inquiries, please reach out to the Conference Secretariat.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center;">
          <a href="mailto:<?= e($contactEmail) ?>?subject=<?= rawurlencode($config['app_name'] . ' Sponsorship Enquiry') ?>" class="btn-amber" style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
            <?= render_icon('mail') ?> Contact Secretariat
          </a>
          <a href="index.php" class="btn-outline-primary" style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid var(--color-primary-700); color: var(--color-primary-700);">
            Back to Home <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
