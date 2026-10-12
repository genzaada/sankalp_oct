<?php
/**
 * Conference Tracks Component
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$tracks = $conferenceData['tracks'];
?>
<section id="tracks" class="section-light sankalp-tracks" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Conference Tracks
      </h2>
      <div style="margin: 0.5rem auto 0 auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
    </div>

    <!-- 6 Tracks Grid -->
    <div class="tracks-grid">
      <?php foreach ($tracks as $i => $track): ?>
        <div class="track-card reveal-up delay-<?= ($i % 3) + 1 ?>">
          <div>
            <!-- Track Header -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
              <div style="width: 3rem; height: 3rem; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0; background: rgba(18, 124, 111, 0.1);">
                <?= $track['icon'] ?>
              </div>
              <span class="font-mono font-bold uppercase" style="font-size: 10px; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
                <?= e($track['trackNum']) ?>
              </span>
            </div>

            <!-- Title -->
            <h3 class="font-display font-bold text-base leading-snug" style="font-size: 1rem; color: var(--color-text-heading); margin-bottom: 1rem;">
              <?= e($track['title']) ?>
            </h3>

            <!-- Sub-topics List -->
            <ul style="list-style: none; border-top: 1px solid var(--color-border); padding-top: 1rem; display: flex; flex-direction: column; gap: 0.625rem;">
              <?php foreach ($track['topics'] as $topic): ?>
                <li style="display: flex; align-items: flex-start; gap: 0.625rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-text-body);">
                  <span style="width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; margin-top: 0.5rem; background: var(--color-primary-500);"></span>
                  <span><?= e($topic) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- Card Footer -->
          <div style="margin-top: 1.25rem; padding-top: 0.75rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between; font-size: 0.75rem;">
            <span class="font-mono text-gray-400" style="font-size: 11px; color: #9ca3af;">6 Sub-themes</span>
            <button type="button" onclick="openSubmissionModal(<?= $i + 1 ?>)"
              style="font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem; color: var(--color-primary-700);">
              Submit to Track <?= render_icon('arrow-right') ?>
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Central Submission CTA -->
    <div class="reveal-up" style="text-align: center;">
      <button type="button" onclick="goToSection('cfp', 'home', 'Call for Papers')" class="btn-primary"
        style="padding: 0.875rem 2rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
        Submit Your Paper to a Track <?= render_icon('arrow-right') ?>
      </button>
    </div>

  </div>
</section>
