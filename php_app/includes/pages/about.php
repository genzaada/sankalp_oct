<?php
/**
 * About Page View Template — Host Institution Profile
 * Converted from Figma (SANKALP 2027 · Institution) to website design system
 * School of Engineering and Technology (SOET), MGM University
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
?>
<main id="main-content" tabindex="-1" class="page-view sankalp-institution-page" style="<?= ($currentPage ?? 'home') === 'about' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 100vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Editorial Institution Layout (Converted from Figma Template) -->
  <section class="institution-editorial-section">
    <div class="container">
      <div class="institution-editorial-card reveal-up">

        <!-- Row 1: About the Host Institution + Campus Photograph -->
        <div class="inst-top-grid">
          <!-- Left Column: Introduction & Institutional Details -->
          <div class="inst-intro-col">
            <p class="eyebrow" style="margin-bottom: 0.75rem;">Host &amp; Organizing Institution</p>
            <h1 class="inst-display-heading">
              About the Host<br>Institution
            </h1>

            <div class="inst-copy-stack">
              <p>
                The School of Engineering and Technology (SOET), MGM University, Chhatrapati Sambhajinagar, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement across emerging engineering domains.
              </p>
              <p>
                Established under the MGM University Act, 2019 and promoted by the Mahatma Gandhi Mission Trust with over four decades of legacy, the University proudly hosts <?= e($config['app_name']) ?>—uniting researchers, academicians, and practitioners for meaningful dialogue and global sustainable development.
              </p>
              <a href="https://mgmu.ac.in" target="_blank" rel="noopener noreferrer" class="inst-website-link">
                www.mgmu.ac.in
              </a>
            </div>
          </div>

          <!-- Vertical 1px Divider -->
          <div class="inst-vdivider" aria-hidden="true"></div>

          <!-- Right Column: Campus Photograph -->
          <div class="inst-media-col">
            <div class="inst-photo-frame">
              <img src="<?= asset_url('assets/images/mgm_university.png') ?>" alt="MGM University Campus — Host Institution">
            </div>
          </div>
        </div>

        <!-- Horizontal 1px Section Divider -->
        <div class="inst-hdivider" aria-hidden="true"></div>

        <!-- Row 2: Campus and Infrastructure -->
        <div class="inst-bottom-grid">
          <div class="inst-infra-heading-col">
            <h2 class="inst-display-heading">
              Campus and<br>Infrastructure
            </h2>
          </div>
          <div class="inst-infra-copy-col">
            <p>
              MGM University's campus brings together spaces for learning, research, and exchange. Modern laboratories, specialized research centers, incubation facilities, and a central library support academic life, while collaborative venues create opportunities for interdisciplinary conversation and international partnership.
            </p>
          </div>
        </div>

        <!-- Horizontal 1px Section Divider -->
        <div class="inst-hdivider" aria-hidden="true"></div>

        <!-- Row 3: Quick Institutional Facts & Navigation -->
        <div class="inst-footer-strip">
          <div class="inst-facts-row">
            <div class="inst-fact-item">
              <span class="inst-fact-label">Establishment</span>
              <span class="inst-fact-value">MGM University Act, 2019</span>
            </div>
            <div class="inst-fact-item">
              <span class="inst-fact-label">Organizing School</span>
              <span class="inst-fact-value">School of Engineering &amp; Technology (SOET)</span>
            </div>
            <div class="inst-fact-item">
              <span class="inst-fact-label">Location</span>
              <span class="inst-fact-value"><?= e($config['app_venue']) ?></span>
            </div>
          </div>

          <div class="inst-actions-row">
            <a href="index.php" class="btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none;">
              Back to Conference Home <?= render_icon('arrow-right') ?>
            </a>
            <a href="mailto:<?= e($config['contact_email']) ?>" class="btn-outline-primary" style="padding: 0.75rem 1.25rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid var(--color-primary-700); color: var(--color-primary-700);">
              <?= render_icon('mail') ?> Email Secretariat
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>
