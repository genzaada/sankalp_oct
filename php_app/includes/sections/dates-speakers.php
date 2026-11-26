<?php
/**
 * Important Dates & Keynote Speakers Split Component
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$dates = $conferenceData['dates'];
$speakers = $conferenceData['speakers'];
?>
<section id="speakers" class="section-white sankalp-speakers" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container split-grid">

    <!-- Left: Important Dates (~35%) -->
    <div id="dates" class="reveal-up sankalp-dates" style="scroll-margin-top: 6rem;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Important Dates
          </span>
        </div>
        <span class="font-mono text-[9px] uppercase font-bold" style="font-size: 9px; color: #92400e; background: #fffbeb; border: 1px solid #fef3c7; padding: 0.2rem 0.5rem; border-radius: 9999px;">
          Proposed Schedule
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
            <div>
              <span style="font-size: 0.75rem; font-weight: 600; display: block; <?= $textStyle ?>">
                <?= e($d['label']) ?>
              </span>
              <?php if (!empty($d['status'])): ?>
                <span class="font-mono text-[9px] uppercase" style="color: #92400e; font-size: 9px; font-weight: 600;">(<?= e($d['status']) ?>)</span>
              <?php endif; ?>
            </div>
            <span class="font-mono font-bold" style="font-size: 11px; padding: 0.25rem 0.625rem; border-radius: 0.5rem; border: 1px solid var(--color-border); background: #ffffff; color: var(--color-primary-700); text-align: right;">
              <?= e($d['date']) ?>
            </span>
          </div>
        <?php endforeach; ?>

        <div style="padding-top: 0.75rem; text-align: center;">
          <p style="font-size: 10px; color: var(--color-text-body); margin: 0 0 0.5rem 0; line-height: 1.4;">
            * Milestones are in administrative review and will be formally finalized upon steering committee sign-off.
          </p>
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
        <span class="font-mono text-[10px] uppercase font-bold" style="font-size: 10px; color: var(--color-primary-600); background: rgba(18,124,111,0.08); padding: 0.25rem 0.625rem; border-radius: 9999px;">
          Invited Luminaries
        </span>
      </div>

      <div class="card" style="padding: 1.25rem;">
        <!-- Desktop Grid (4 cols) -->
        <div class="speakers-desktop-grid">
          <?php foreach ($speakers as $sp): ?>
            <div class="speaker-card">
              <div class="speaker-avatar">
                <?php if (!empty($sp['image'])): ?>
                  <img src="<?= e($sp['image']) ?>" alt="<?= e($sp['name']) ?>" loading="lazy">
                <?php else: ?>
                  <div class="speaker-monogram" aria-hidden="true">
                    <span><?= e(get_member_initials($sp['name'])) ?></span>
                  </div>
                <?php endif; ?>
              </div>
              <h4 class="speaker-name">
                <?= e($sp['name']) ?>
              </h4>
              <p class="speaker-role"><?= e($sp['role']) ?></p>
              <p class="speaker-org"><?= e($sp['org']) ?></p>
              <?php if (!empty($sp['linkedin'])): ?>
                <a href="<?= e($sp['linkedin']) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= e($sp['name'] . ' LinkedIn profile') ?>" class="speaker-social-btn">
                  <?= render_icon('linkedin') ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Mobile Snap Slider -->
        <div id="speaker-mobile-slider" class="scrollbar-none sm:hidden"
          style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 1rem; padding-bottom: 0.5rem;">
          <?php foreach ($speakers as $sp): ?>
            <div class="speaker-mobile-card" style="scroll-snap-align: center; flex-shrink: 0; width: 13rem; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; border-radius: 1rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
              <div style="width: 5rem; height: 5rem; border-radius: 50%; overflow: hidden; margin-bottom: 0.75rem; border: 2px solid rgba(14,90,86,0.2);">
                <?php if (!empty($sp['image'])): ?>
                  <img src="<?= e($sp['image']) ?>" alt="<?= e($sp['name']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                <?php else: ?>
                  <div class="speaker-monogram" style="font-size: 1.25rem;" aria-hidden="true">
                    <span><?= e(get_member_initials($sp['name'])) ?></span>
                  </div>
                <?php endif; ?>
              </div>
              <h4 class="font-display font-bold" style="font-size: 0.75rem; margin-bottom: 0.25rem; color: var(--color-text-heading);"><?= e($sp['name']) ?></h4>
              <p style="font-size: 10px; margin-bottom: 0.125rem; color: var(--color-text-body);"><?= e($sp['role']) ?></p>
              <p class="font-mono" style="font-size: 10px; margin-bottom: 0.75rem; color: var(--color-text-body);"><?= e($sp['org']) ?></p>
              <?php if (!empty($sp['linkedin'])): ?>
                <a href="<?= e($sp['linkedin']) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= e($sp['name'] . ' LinkedIn profile') ?>" style="width: 1.75rem; height: 1.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: var(--color-primary-700); color: #fff;">
                  <?= render_icon('linkedin') ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Carousel Pagination Dots (Dynamic based on speaker count) -->
        <div class="sm:hidden" style="display: flex; justify-content: center; gap: 0.375rem; margin-top: 1rem;">
          <?php foreach ($speakers as $idx => $sp): ?>
            <button type="button" class="speaker-dot"
              style="width: <?= $idx === 0 ? '20px' : '8px' ?>; height: 8px; border-radius: 9999px; background: <?= $idx === 0 ? 'var(--color-primary-700)' : 'var(--color-border)' ?>; transition: all 0.2s; border: none; cursor: pointer; padding: 0;"
              aria-label="<?= e('Speaker ' . ($idx + 1) . ': ' . $sp['name']) ?>"
              data-index="<?= $idx ?>">
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>
