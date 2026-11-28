<?php
/**
 * Keynote Speakers Component
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$speakers = $conferenceData['speakers'] ?? [];
?>
<section id="speakers" class="section-white sankalp-speakers" style="padding-top: 5rem; padding-bottom: 5rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Section Header -->
    <div class="reveal-up" style="margin-bottom: 2.5rem;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.75rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Keynote &amp; Invited Speakers
          </span>
        </div>
        <span class="font-mono uppercase font-bold" style="font-size: 10px; color: var(--color-primary-700); background: rgba(18,124,111,0.08); padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(18,124,111,0.2);">
          <?= count($speakers) ?> Distinguished Speakers
        </span>
      </div>

      <h2 class="font-display font-bold text-2xl lg:text-3xl" style="color: var(--color-text-heading); margin-bottom: 0.625rem;">
        Eminent Keynote &amp; Invited Speakers
      </h2>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 52rem; line-height: 1.6; margin: 0;">
        Distinguished international and national academicians, researchers, and pioneering industry leaders sharing breakthrough perspectives across sustainable mobility, intelligent manufacturing, smart materials, clean energy, circular economy, and artificial intelligence.
      </p>
    </div>

    <!-- Keynote Speakers Grid -->
    <div class="reveal-up">
      <div class="speakers-desktop-grid">
        <?php foreach ($speakers as $speaker): ?>
          <?php
            $hasPhoto = !empty($speaker['image']) && file_exists(__DIR__ . '/../../' . $speaker['image']);
            $imgUrl = $hasPhoto ? asset_url(implode('/', array_map('rawurlencode', explode('/', $speaker['image'])))) : '';
          ?>
          <div class="speaker-card">
            <?php if (!empty($speaker['linkedin'])): ?>
              <a href="<?= e($speaker['linkedin']) ?>"
                 target="_blank"
                 rel="noopener noreferrer"
                 class="card-top-linkedin-btn"
                 aria-label="<?= e($speaker['name']) ?> on LinkedIn"
                 title="View <?= e($speaker['name']) ?> on LinkedIn">
                <?= render_icon('linkedin') ?>
              </a>
            <?php endif; ?>

            <div style="display: flex; flex-direction: column; align-items: center; width: 100%; flex-grow: 1;">
              <div class="speaker-avatar">
                <?php if ($hasPhoto): ?>
                  <img src="<?= e($imgUrl) ?>" alt="<?= e($speaker['name']) ?>" loading="lazy" width="88" height="88">
                <?php else: ?>
                  <div class="speaker-monogram" title="<?= e($speaker['name']) ?>">
                    <?= e(get_member_initials($speaker['name'])) ?>
                  </div>
                <?php endif; ?>
              </div>

              <h3 class="speaker-name"><?= e($speaker['name']) ?></h3>
              <p class="speaker-role"><?= e($speaker['designation']) ?></p>
              <p class="speaker-org"><?= e($speaker['organization']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
