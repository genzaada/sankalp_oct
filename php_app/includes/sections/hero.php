<?php
/**
 * Hero Section Component
 * ICAIESF 2027 Conference
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$countdownTarget = $config['countdown_target'];

$nameParts = explode(' ', $config['app_name'], 2);
$brandTitle = $nameParts[0] ?? 'ICAIESF';
$brandSub = $nameParts[1] ?? '2027';

// Resolve submission & registration deadlines from conference data
$subDeadline = 'January 15, 2027';
$regDeadline = 'February 20, 2027';
if (!empty($conferenceData['dates'])) {
    foreach ($conferenceData['dates'] as $d) {
        if ($d['label'] === 'Paper Submission Deadline') {
            $subDeadline = $d['date'];
        }
        if (stripos($d['label'], 'registration') !== false) {
            $regDeadline = $d['date'];
        }
    }
}
?>
<header class="hero-section sankalp-hero" style="overflow: hidden;">
  <!-- Hero Wallpaper Layer (in front of green background, below content) -->
  <img src="<?= asset_url('assets/images/hero-wallpaper.jpg') ?>" alt="" aria-hidden="true" class="hero-wallpaper-bg">

  <!-- Subtle ambient glow background -->
  <div class="ambient-glow" style="position: absolute; right: 0; top: 0; width: 450px; max-width: 100vw; height: 450px; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.18); filter: blur(100px); overflow: hidden; z-index: 1;"></div>

  <div class="container hero-content">

    <!-- Left Column (7 cols) -->
    <div class="reveal-up" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left;">

      <!-- Main Conference Brand Title: ICAIESF 2027 -->
      <h1 class="hero-brand-heading font-display font-black">
        <span class="hero-brand-name"><?= e($brandTitle) ?></span>
        <span class="hero-brand-year"><?= e($brandSub) ?></span>
      </h1>

      <!-- Full Conference Academic Sub-title & Acronym -->
      <h2 class="hero-theme-title font-display font-bold">
        <span class="acronym-highlight">I</span>nternational <span class="acronym-highlight">C</span>onference on<br>
        <span class="hero-theme-line"><span class="acronym-highlight">A</span>dvancing <span class="acronym-highlight">I</span>ntelligent <span class="acronym-highlight">E</span>ngineering for a <span class="acronym-highlight">S</span>ustainable <span class="acronym-highlight">F</span>uture</span><br>
        <span class="hero-theme-date">April 9-10 2027</span>
      </h2>

      <!-- Subtitle -->
      <p style="font-size: clamp(0.875rem, 1.5vw, 1rem); font-weight: 600; line-height: 1.6; max-width: 38rem; margin-bottom: 2rem; color: rgba(255, 255, 255, 0.9);">
        Organized By<br>
        School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra, India
      </p>

      <!-- Meta Row (Abstract Submission Deadline & CTA) -->
      <div class="hero-meta-grid">
        <div class="hero-meta-item" style="border-color: rgba(242, 183, 5, 0.4); background: rgba(255, 255, 255, 0.11); box-shadow: 0 4px 18px rgba(242, 183, 5, 0.12);">
          <?= render_icon('clock') ?>
          <div>
            <p class="font-mono uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.85); font-size: 11px; font-weight: 600; margin-bottom: 0.15rem;">Paper Submission Deadline</p>
            <p class="font-bold" style="font-size: 1.0625rem; color: var(--color-accent-amber); margin: 0; line-height: 1.2;"><?= e($subDeadline) ?></p>
          </div>
        </div>

        <button type="button" onclick="openSubmissionModal()" class="btn-amber hero-submit-btn">
          Submit Abstract <?= render_icon('arrow-right') ?>
        </button>
      </div>

    </div>

    <!-- Right Column (5 cols): Interactive 3D Hollow Cube + Countdown Widget -->
    <div class="reveal-up delay-2 hero-right-col">

      <!-- Interactive 3D Hollow Cube Viewer -->
      <div class="cube-viewer-wrapper">
        <div class="cube-ambient-glow" aria-hidden="true"></div>
        <div id="cube-viewer">
          <div class="cube-hint">Drag to rotate</div>
        </div>
      </div>

      <?php if (($currentPage ?? 'home') !== 'abstract-submission'): ?>
        <!-- Live Countdown Widget Card -->
        <div id="countdown-widget" class="float-card" data-target="<?= e($countdownTarget) ?>" style="width: 100%; max-width: 24rem; padding: 1.5rem;">
          <p class="font-mono text-center uppercase tracking-widest font-semibold" style="font-size: 10px; color: var(--color-primary-500); margin-bottom: 1rem;">
            Conference Begins In
          </p>
          <div style="display: flex; align-items: center; justify-content: center; gap: 0.25rem;">
            <div class="countdown-block" style="padding-left: 0.75rem; padding-right: 0.75rem;">
              <span id="cd-days" class="countdown-num">108</span>
              <span class="countdown-label">Days</span>
            </div>
            <span class="countdown-sep">•</span>
            <div class="countdown-block" style="padding-left: 0.75rem; padding-right: 0.75rem;">
              <span id="cd-hours" class="countdown-num">14</span>
              <span class="countdown-label">Hours</span>
            </div>
            <span class="countdown-sep">•</span>
            <div class="countdown-block" style="padding-left: 0.75rem; padding-right: 0.75rem;">
              <span id="cd-mins" class="countdown-num">32</span>
              <span class="countdown-label">Minutes</span>
            </div>
            <span class="countdown-sep">•</span>
            <div class="countdown-block" style="padding-left: 0.75rem; padding-right: 0.75rem;">
              <span id="cd-secs" class="countdown-num">45</span>
              <span class="countdown-label">Seconds</span>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
</header>
