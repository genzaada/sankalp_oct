<?php
/**
 * Publication Partners & Sponsors Component
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$sponsors = $conferenceData['sponsors'];
?>
<section class="section-white" style="padding-top: 4rem; padding-bottom: 4rem; overflow: hidden;">
  <div class="container text-center" style="text-align: center;">

    <p class="font-display font-bold uppercase tracking-widest text-xs" style="font-size: 0.75rem; color: var(--color-text-heading); margin-bottom: 2rem;">
      Publication Partners &amp; Sponsors
    </p>

    <!-- Infinite Scrolling Marquee Track with edge fade masks -->
    <div style="position: relative; width: 100%; overflow: hidden; mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);">
      <div class="marquee-track" style="gap: 1.5rem;">
        <!-- Set 1 -->
        <?php foreach ($sponsors as $s): ?>
          <div style="padding: 1rem 2.25rem; border-radius: 1rem; border: 1px solid var(--color-border); background: #ffffff; display: flex; align-items: center; justify-content: center; min-width: 170px; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.2s, border-color 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--color-primary-500)';" onmouseout="this.style.transform='none'; this.style.borderColor='var(--color-border)';">
            <span class="font-display font-bold uppercase tracking-wider text-xs" style="font-size: 0.8125rem; color: var(--color-primary-900);">
              <?= e($s['name']) ?>
            </span>
          </div>
        <?php endforeach; ?>
        <!-- Set 2 for infinite seamless loop -->
        <?php foreach ($sponsors as $s): ?>
          <div style="padding: 1rem 2.25rem; border-radius: 1rem; border: 1px solid var(--color-border); background: #ffffff; display: flex; align-items: center; justify-content: center; min-width: 170px; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.2s, border-color 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--color-primary-500)';" onmouseout="this.style.transform='none'; this.style.borderColor='var(--color-border)';">
            <span class="font-display font-bold uppercase tracking-wider text-xs" style="font-size: 0.8125rem; color: var(--color-primary-900);">
              <?= e($s['name']) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
