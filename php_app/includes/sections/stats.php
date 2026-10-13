<?php
/**
 * Stats Bar Component (Overlapping Hero with -mt-10)
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$stats = $conferenceData['stats'];
?>
<section class="stats-section section-white sankalp-stats">
  <div class="container">
    <div class="float-card" style="border-radius: 1rem; padding: 1.25rem 1.5rem;">
      <div class="stats-grid">
        <?php foreach ($stats as $idx => $st): ?>
          <div class="stats-item reveal-up delay-<?= ($idx % 6) + 1 ?>">
            <div class="icon-badge">
              <?= render_icon($st['icon']) ?>
            </div>
            <span class="font-display font-bold text-2xl counter-value" data-value="<?= e($st['value']) ?>" style="font-size: 1.5rem; color: var(--color-text-heading);">
              <?= e($st['value']) ?>
            </span>
            <span class="stat-label">
              <?= e($st['label']) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
