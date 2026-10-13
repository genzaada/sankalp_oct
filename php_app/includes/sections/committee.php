<?php
/**
 * Organizing Committee Directory Section
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$committee = $conferenceData['committee'];
?>
<section id="committee" class="section-light sankalp-committee" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Leadership &amp; Organization</p>
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Organizing Committee
      </h2>
      <div style="margin: 0.5rem auto 0 auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
    </div>

    <!-- Committee Cards Grid -->
    <div class="card reveal-up" style="padding: 2.5rem; background: #ffffff;">
      <div style="display: flex; flex-direction: column; gap: 2rem;">
        <?php foreach ($committee as $categoryName => $members): ?>
          <div style="border-top: 1px solid var(--color-border); padding-top: 1.25rem;">
            <h3 class="font-mono uppercase tracking-wider font-bold" style="font-size: 12px; color: var(--color-primary-700); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
              <span style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: var(--color-accent-amber);"></span>
              <?= e($categoryName) ?>
            </h3>
            <div class="committee-tier-grid">
              <?php foreach ($members as $m): ?>
                <div class="member-card">
                  <div>
                    <p class="font-mono uppercase tracking-wide font-semibold" style="font-size: 10px; color: var(--color-primary-500); margin-bottom: 0.25rem;"><?= e($m['role']) ?></p>
                    <p class="font-bold" style="font-size: 0.9375rem; color: var(--color-text-heading); margin-bottom: 0.25rem;"><?= e($m['name']) ?></p>
                  </div>
                  <p style="font-size: 11px; line-height: 1.4; color: var(--color-text-body); margin: 0;"><?= e($m['org']) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
