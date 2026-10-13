<?php
/**
 * Important Dates & Keynote Speakers Split Component
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$dates = $conferenceData['dates'];
$speakers = $conferenceData['speakers'];
?>
<section id="speakers" class="section-white sankalp-speakers" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container split-grid">

    <!-- Left: Important Dates (~35%) -->
    <div id="dates" class="reveal-up sankalp-dates" style="scroll-margin-top: 6rem;">
      <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
        <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
        <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
          Important Dates
        </span>
      </div>

      <div class="card" style="padding: 1.25rem; display: flex; flex-direction: column; gap: 0.25rem;">
        <?php foreach ($dates as $d): ?>
          <?php
          $isDeadline = $d['type'] === 'deadline';
          $isEvent = $d['type'] === 'event';
          $bgStyle = $isDeadline ? 'background: #fff1f2; border: 1px solid #ffe4e6;' : ($isEvent ? 'background: rgba(18,124,111,0.06); border: 1px solid #ccfbf1;' : 'border: 1px solid transparent;');
          $textStyle = $isDeadline ? 'color: #be123c;' : 'color: var(--color-text-heading);';
          ?>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; border-radius: 0.75rem; <?= $bgStyle ?>">
            <span style="font-size: 0.75rem; font-weight: 600; <?= $textStyle ?>">
              <?= e($d['label']) ?>
            </span>
            <span class="font-mono font-bold" style="font-size: 11px; padding: 0.25rem 0.625rem; border-radius: 0.5rem; border: 1px solid var(--color-border); background: #ffffff; color: var(--color-primary-700);">
              <?= e($d['date']) ?>
            </span>
          </div>
        <?php endforeach; ?>

        <div style="padding-top: 0.75rem; text-align: center;">
          <button type="button" onclick="goToSection('dates', 'home')"
            style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.25rem; color: var(--color-primary-500);">
            View All Dates <?= render_icon('arrow-right') ?>
          </button>
        </div>
      </div>
    </div>

    <!-- Right: Keynote Speakers (~65%) -->
    <div class="reveal-up delay-2">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Keynote Speakers
          </span>
        </div>
        <button type="button"
          style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.25rem; color: var(--color-primary-500);">
          View All Speakers <?= render_icon('arrow-right') ?>
        </button>
      </div>

      <div class="card" style="padding: 1.25rem;">
        <!-- Desktop Grid (4 cols) -->
        <div class="speakers-desktop-grid">
          <?php foreach ($speakers as $sp): ?>
            <div class="speaker-card">
              <div class="speaker-avatar">
                <img src="<?= e($sp['image']) ?>" alt="<?= e($sp['name']) ?>" loading="lazy">
              </div>
              <h4 class="speaker-name">
                <?= e($sp['name']) ?>
              </h4>
              <p class="speaker-role"><?= e($sp['role']) ?></p>
              <p class="speaker-org"><?= e($sp['org']) ?></p>
              <a href="#" onclick="event.stopPropagation();" aria-label="LinkedIn profile" class="speaker-social-btn">
                <?= render_icon('linkedin') ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Mobile Snap Slider -->
        <div id="speaker-mobile-slider" class="scrollbar-none sm:hidden"
          style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 1rem; padding-bottom: 0.5rem;">
          <?php foreach ($speakers as $sp): ?>
            <div class="speaker-mobile-card" style="scroll-snap-align: center; flex-shrink: 0; width: 13rem; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; border-radius: 1rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
              <div style="width: 5rem; height: 5rem; border-radius: 50%; overflow: hidden; margin-bottom: 0.75rem; border: 2px solid rgba(14,90,86,0.2);">
                <img src="<?= e($sp['image']) ?>" alt="<?= e($sp['name']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
              <h4 class="font-display font-bold" style="font-size: 0.75rem; margin-bottom: 0.25rem; color: var(--color-text-heading);"><?= e($sp['name']) ?></h4>
              <p style="font-size: 10px; margin-bottom: 0.125rem; color: var(--color-text-body);"><?= e($sp['role']) ?></p>
              <p class="font-mono" style="font-size: 10px; margin-bottom: 0.75rem; color: var(--color-text-body);"><?= e($sp['org']) ?></p>
              <a href="#" aria-label="LinkedIn profile" style="width: 1.75rem; height: 1.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: var(--color-primary-700); color: #fff;">
                <?= render_icon('linkedin') ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Carousel Pagination Dots -->
        <div style="display: flex; justify-content: center; gap: 0.375rem; margin-top: 1rem;">
          <button type="button" class="speaker-dot" style="width: 20px; height: 8px; border-radius: 9999px; background: var(--color-primary-700); transition: all 0.2s;" aria-label="Speaker slide 1"></button>
          <button type="button" class="speaker-dot" style="width: 8px; height: 8px; border-radius: 9999px; background: var(--color-border); transition: all 0.2s;" aria-label="Speaker slide 2"></button>
          <button type="button" class="speaker-dot" style="width: 8px; height: 8px; border-radius: 9999px; background: var(--color-border); transition: all 0.2s;" aria-label="Speaker slide 3"></button>
        </div>
      </div>
    </div>

  </div>
</section>
