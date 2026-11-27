<?php
/**
 * Conference Objectives Component
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$objectives = $conferenceData['objectives'];
?>
<section id="overview" class="section-light sankalp-overview" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem;">
  <div class="container">

    <!-- Section Header -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Mission &amp; Purpose</p>
      <h2 class="font-display font-bold text-3xl md:text-4xl leading-tight" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading);">
        Conference Objectives
      </h2>
      <div style="margin: 0.75rem auto 0 auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
    </div>

    <!-- Conference Objectives Card -->
    <div class="reveal-up delay-1" style="border-radius: 1rem; padding: 2.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #fff; box-shadow: 0 12px 32px rgba(10, 74, 71, 0.12);">
      <div style="position: absolute; right: -3rem; bottom: -3rem; width: 14rem; height: 14rem; border-radius: 50%; pointer-events: none; background: rgba(255,255,255,0.06); filter: blur(40px);"></div>

      <div style="position: relative; z-index: 10;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-accent-amber); flex-shrink: 0;"></div>
          <span class="font-mono text-xs uppercase tracking-widest font-bold" style="font-size: 11px; color: rgba(255,255,255,0.9);">
            Strategic Academic Goals
          </span>
        </div>

        <div class="objectives-grid">
          <?php foreach ($objectives as $idx => $obj): ?>
            <div style="display: flex; align-items: flex-start; gap: 1rem; padding: 1rem; border-radius: 0.75rem; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);">
              <div style="width: 1.75rem; height: 1.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.125rem; background: rgba(242, 183, 5, 0.22); border: 1px solid rgba(242, 183, 5, 0.45); color: var(--color-accent-amber); font-weight: bold; font-size: 0.75rem;">
                <?= $idx + 1 ?>
              </div>
              <p style="font-size: 0.875rem; line-height: 1.65; color: rgba(255, 255, 255, 0.95); margin: 0;">
                <?= e($obj) ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Technical Tracks Link Callout -->
        <div style="margin-top: 2rem; padding: 1.25rem 1.75rem; border-radius: 0.75rem; background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
          <p style="font-size: 0.875rem; line-height: 1.5; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 48rem;">
            These objectives are operationalized across <strong>six dedicated conference tracks</strong> spanning 36 specialized engineering research topics in automotive mobility, smart manufacturing, sustainable materials, clean energy, AI, and climate resilience.
          </p>
          <button type="button" onclick="goToSection('tracks', 'home', 'Tracks')" class="btn-gold" style="padding: 0.625rem 1.25rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; white-space: nowrap; flex-shrink: 0;">
            Explore Tracks <?= render_icon('arrow-right') ?>
          </button>
        </div>
      </div>
    </div>

  </div>
</section>
