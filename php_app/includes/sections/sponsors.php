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

    <!-- Infinite Scrolling Marquee Track -->
    <div style="position: relative; width: 100%; overflow: hidden; margin-bottom: 2rem;">
      <div class="marquee-track" style="gap: 1rem;">
        <!-- Set 1 -->
        <?php foreach ($sponsors as $s): ?>
          <div style="padding: 1rem 2rem; border-radius: 1rem; border: 1px solid var(--color-border); background: #f8fafc; display: flex; align-items: center; justify-content: center; min-width: 160px; flex-shrink: 0;">
            <span class="font-display font-bold uppercase tracking-wider text-xs" style="font-size: 0.75rem; color: #374151;">
              <?= e($s['name']) ?>
            </span>
          </div>
        <?php endforeach; ?>
        <!-- Set 2 for infinite seamless loop -->
        <?php foreach ($sponsors as $s): ?>
          <div style="padding: 1rem 2rem; border-radius: 1rem; border: 1px solid var(--color-border); background: #f8fafc; display: flex; align-items: center; justify-content: center; min-width: 160px; flex-shrink: 0;">
            <span class="font-display font-bold uppercase tracking-wider text-xs" style="font-size: 0.75rem; color: #374151;">
              <?= e($s['name']) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Manual Arrow Scroller Controls -->
    <div style="position: relative; max-width: 56rem; margin-left: auto; margin-right: auto; display: flex; align-items: center; gap: 1rem;">
      <button type="button" id="sponsor-prev" aria-label="Previous Sponsor"
        style="width: 2rem; height: 2rem; border-radius: 50%; border: 1px solid var(--color-border); display: flex; align-items: center; justify-content: center; background: #ffffff; color: #4b5563; box-shadow: 0 1px 2px rgba(0,0,0,0.05); flex-shrink: 0;">
        &lsaquo;
      </button>

      <div id="sponsor-track" class="scrollbar-none"
        style="overflow-x: auto; scroll-behavior: smooth; width: 100%; display: flex; gap: 1rem; padding-top: 0.5rem; padding-bottom: 0.5rem;">
        <?php foreach ($sponsors as $s): ?>
          <div style="padding: 1rem 2rem; border-radius: 1rem; border: 1px solid var(--color-border); background: #f8fafc; display: flex; align-items: center; justify-content: center; min-width: 160px; flex-shrink: 0; transition: transform 0.15s;">
            <span class="font-display font-bold uppercase tracking-wider text-xs" style="font-size: 0.75rem; color: #374151;">
              <?= e($s['name']) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>

      <button type="button" id="sponsor-next" aria-label="Next Sponsor"
        style="width: 2rem; height: 2rem; border-radius: 50%; border: 1px solid var(--color-border); display: flex; align-items: center; justify-content: center; background: #ffffff; color: #4b5563; box-shadow: 0 1px 2px rgba(0,0,0,0.05); flex-shrink: 0;">
        &rsaquo;
      </button>
    </div>

  </div>
</section>
