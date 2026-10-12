<?php
/**
 * About Highlight Section (Homepage)
 */
?>
<section class="section-white" style="padding-top: 6rem; padding-bottom: 6rem; overflow: hidden;">
  <div class="container" style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;">
    <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="lg:grid-cols-2">

      <!-- Left Column -->
      <div class="reveal-up" style="text-align: left;">
        <h2 class="font-display font-bold leading-tight" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 1.25rem;">
          Shaping the Future Through<br>
          <span style="color: var(--color-primary-500);">Innovation &amp; Collaboration</span>
        </h2>
        <span class="heading-underline" style="margin-bottom: 1.5rem;"></span>

        <p style="font-size: 0.9375rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 2rem;">
          An International Conference that will provide a global platform for knowledge exchange, research dissemination, industry interaction, and collaborative innovation in sustainability-focused engineering and technology domains.
        </p>

        <p class="font-mono text-[11px] uppercase tracking-widest font-semibold" style="font-size: 11px; color: var(--color-primary-500); margin-bottom: 1rem;">
          Key Highlights
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 0.75rem; margin-bottom: 2rem;">
          <?php
          $highlights = [
              'High-quality paper presentations',
              'Keynote talks from global experts',
              'Workshops & technical sessions',
              'Peer-reviewed conference proceedings'
          ];
          foreach ($highlights as $hl):
          ?>
            <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem; border-radius: 1rem; border: 1px solid var(--color-border); background: var(--color-bg-light); transition: transform 0.15s;">
              <div style="width: 1.5rem; height: 1.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
                <?= render_icon('check') ?>
              </div>
              <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-text-heading);">
                <?= e($hl) ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>

        <button type="button" onclick="navigateTo('about')" class="btn-primary" style="padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
          Know More <?= render_icon('arrow-right') ?>
        </button>
      </div>

      <!-- Right Column: Campus Architectural Photo -->
      <div class="reveal-up delay-2" style="position: relative; display: flex; align-items: center; justify-content: center;">
        <!-- Dot-grid decorative background -->
        <div style="position: absolute; top: -1rem; right: -1rem; width: 6rem; height: 6rem; opacity: 0.25; pointer-events: none; z-index: 0;">
          <svg style="width: 100%; height: 100%; color: #0d9488;" fill="currentColor" viewBox="0 0 100 100">
            <pattern id="dot-grid-about" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
              <circle cx="2" cy="2" r="2"></circle>
            </pattern>
            <rect width="100" height="100" fill="url(#dot-grid-about)"></rect>
          </svg>
        </div>

        <div style="position: relative; border-radius: 1rem; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); width: 100%; min-height: 350px; border: 1px solid var(--color-border); z-index: 10;">
          <img src="<?= asset_url('assets/images/AdminBulding.jpeg') ?>" alt="Admin Building MGM University"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.7s ease;"
            onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        </div>
      </div>

    </div>
  </div>
</section>
