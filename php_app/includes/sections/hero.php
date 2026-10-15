<?php
/**
 * Hero Section Component
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$countdownTarget = $config['countdown_target'];

$nameParts = explode(' ', $config['app_name'], 2);
$brandTitle = $nameParts[0] ?? 'SANKALP';
$brandSub = $nameParts[1] ?? '2027';

?>
<header class="hero-section sankalp-hero">
  <!-- Subtle ambient glow background -->
  <div class="ambient-glow" style="position: absolute; right: 0; top: 0; width: 600px; height: 600px; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.18); filter: blur(120px);"></div>

  <div class="container hero-content">

    <!-- Left Column (7 cols) -->
    <div class="reveal-up" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left;">


      <!-- Main Conference Brand Title: SANKALP 2027 -->
      <h1 class="hero-brand-heading font-display font-black">
        <span class="hero-brand-name"><?= e($brandTitle) ?></span>
        <span class="hero-brand-year"><?= e($brandSub) ?></span>
      </h1>

      <!-- Full Conference Academic Sub-title & Acronym (Dynamically bound to config/app.php) -->
      <h2 class="hero-theme-title font-display font-bold">
        <?= render_conference_theme_title($config['app_full_title'] ?? '') ?>
      </h2>

      <!-- Subtitle -->
      <p style="font-size: clamp(0.875rem, 1.5vw, 1rem); line-height: 1.6; max-width: 32rem; margin-bottom: 2rem; color: rgba(255, 255, 255, 0.75);">
        <?= e($config['app_subtitle']) ?>
      </p>

      <!-- Meta Row (Dates, Venue, Deadline) -->
      <div class="hero-meta-grid">
        <div class="hero-meta-item">
          <?= render_icon('calendar') ?>
          <div>
            <p class="font-mono text-[10px] uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.6); font-size: 10px;">Conference Dates</p>
            <p class="font-semibold text-white" style="font-size: 12px; margin: 0;"><?= e($config['app_dates']) ?></p>
          </div>
        </div>

        <div class="hero-meta-item">
          <?= render_icon('map-pin') ?>
          <div>
            <p class="font-mono text-[10px] uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.6); font-size: 10px;">Venue</p>
            <p class="font-semibold text-white" style="font-size: 12px; margin: 0;"><?= e($config['app_venue']) ?></p>
          </div>
        </div>

      </div>

      <!-- Action Buttons -->
      <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
        <button type="button" onclick="openRegistrationModal()"
          style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 9999px; background: #ffffff; color: var(--color-primary-900); box-shadow: 0 10px 25px rgba(0,0,0,0.15); transition: transform 0.15s;">
          Register Now <?= render_icon('arrow-right') ?>
        </button>
      </div>

    </div>

    <!-- Right Column (5 cols): Globe + Countdown Widget -->
    <div class="reveal-up delay-2 hero-right-col">

      <!-- Interactive Rotating Wireframe Globe -->
      <div class="globe-container">
        <!-- Core glow -->
        <div class="globe-glow" style="position: absolute; inset: 0; border-radius: 50%; background: rgba(18,124,111,0.22); filter: blur(65px);"></div>

        <!-- Outer Dashed Ring -->
        <div class="globe-dashed-ring" style="position: absolute; width: 100%; height: 100%; border-radius: 50%; border: 1px dashed rgba(255,255,255,0.18);"></div>

        <!-- Wireframe Coordinate Mesh SVG -->
        <svg class="globe-mesh" style="position: absolute; width: 86%; height: 86%; color: rgba(255,255,255,0.28);" viewBox="0 0 200 200" fill="none" stroke="currentColor">
          <circle cx="100" cy="100" r="88" stroke-width="0.8" stroke-dasharray="4 4" />
          <ellipse cx="100" cy="100" rx="88" ry="32" stroke-width="0.7" />
          <ellipse cx="100" cy="100" rx="88" ry="62" stroke-width="0.7" />
          <ellipse cx="100" cy="100" rx="32" ry="88" stroke-width="0.7" />
          <ellipse cx="100" cy="100" rx="62" ry="88" stroke-width="0.7" />
          <line x1="12" y1="100" x2="188" y2="100" stroke-width="0.7" />
          <line x1="100" y1="12" x2="100" y2="188" stroke-width="0.7" />
          <circle cx="100" cy="12" r="2.5" fill="#F2B705" />
          <circle cx="100" cy="188" r="2.5" fill="#127C6F" />
          <circle cx="12" cy="100" r="2.5" fill="#127C6F" />
          <circle cx="188" cy="100" r="2.5" fill="#127C6F" />
          <circle cx="100" cy="100" r="3.5" fill="#F2B705" />
          <circle cx="138" cy="62" r="2" fill="#127C6F" />
          <circle cx="62" cy="138" r="2" fill="#127C6F" />
        </svg>

        <!-- 6 Orbiting Conference Track Symbols (Continuous Planetary Revolution) -->
        <?php
        $globeTracks = [
            ['icon' => '⚡', 'label' => 'Energy Systems', 'title' => 'Track 1: Sustainable Energy Systems and Decarbonization Technologies'],
            ['icon' => '🏙️', 'label' => 'Built Environments', 'title' => 'Track 2: Smart and Sustainable Built Environments'],
            ['icon' => '♻️', 'label' => 'Circular Economy', 'title' => 'Track 3: Sustainable Manufacturing and Circular Economy'],
            ['icon' => '🤖', 'label' => 'AI & Intelligent Tech', 'title' => 'Track 4: Artificial Intelligence and Digital Technologies for Sustainability'],
            ['icon' => '🌿', 'label' => 'Climate & Ecology', 'title' => 'Track 5: Climate Change, Environmental Management and Resource Sustainability'],
            ['icon' => '🚆', 'label' => 'Transportation', 'title' => 'Track 6: Sustainable Transportation and Resilient Infrastructure Systems'],
        ];
        if (!empty($conferenceData['tracks'])) {
            foreach ($conferenceData['tracks'] as $idx => $t) {
                if (isset($globeTracks[$idx])) {
                    $globeTracks[$idx]['icon'] = $t['icon'];
                }
            }
        }
        ?>
        <div class="globe-orbit-system">
          <div class="globe-orbit-ring">
            <?php foreach ($globeTracks as $idx => $orb): ?>
              <div class="orbit-slot orbit-slot-<?= $idx + 1 ?>">
                <button type="button" class="globe-track-orb" onclick="goToSection('tracks', 'home', 'Tracks')" title="<?= e($orb['title']) ?>" aria-label="<?= e($orb['title']) ?>">
                  <span class="orbit-symbol"><?= $orb['icon'] ?></span>
                </button>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

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

    </div>

  </div>
</header>
