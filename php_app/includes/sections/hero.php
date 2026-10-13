<?php
/**
 * Hero Section Component
 */
$config = require __DIR__ . '/../../config/app.php';
$countdownTarget = $config['countdown_target'];
?>
<header class="hero-section sankalp-hero">
  <!-- Subtle ambient glow background -->
  <div class="ambient-glow" style="position: absolute; right: 0; top: 0; width: 600px; height: 600px; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.18); filter: blur(120px);"></div>

  <div class="container hero-content">

    <!-- Left Column (7 cols) -->
    <div class="reveal-up" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left;">

      <!-- Status Pill Badge -->
      <div class="pill-badge" style="margin-bottom: 1.5rem;">
        <span class="pulse-dot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber); display: inline-block;"></span>
        International Conference — SANKALP 2027
      </div>

      <!-- Main Conference H1 -->
      <h1 class="font-display font-bold leading-tight" style="font-size: clamp(1.85rem, 3.8vw, 2.75rem); letter-spacing: -0.02em; margin-bottom: 1.25rem; text-align: left; line-height: 1.2;">
        International Conference on<br>
        <span class="acronym-highlight">S</span>ustainable <span class="acronym-highlight">A</span>dvances in e<span class="acronym-highlight">N</span>gineering, <span class="acronym-highlight">K</span>nowledge Systems,<br>
        <span class="acronym-highlight">A</span>I and Inte<span class="acronym-highlight">L</span>ligent Technologies for <span class="acronym-highlight">P</span>rogress
      </h1>

      <!-- Subtitle -->
      <p style="font-size: clamp(0.875rem, 1.5vw, 1rem); line-height: 1.6; max-width: 32rem; margin-bottom: 2rem; color: rgba(255, 255, 255, 0.75);">
        Organized by School Of Engineering and Technology MGM University, Chhatrapati Sambhajinagar
      </p>

      <!-- Meta Row (Dates, Venue, Deadline) -->
      <div class="hero-meta-grid">
        <div class="hero-meta-item">
          <?= render_icon('calendar') ?>
          <div>
            <p class="font-mono text-[10px] uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.6); font-size: 10px;">Conference Dates</p>
            <p class="font-semibold text-white" style="font-size: 12px; margin: 0;">15-16 February 2027</p>
          </div>
        </div>

        <div class="hero-meta-item">
          <?= render_icon('map-pin') ?>
          <div>
            <p class="font-mono text-[10px] uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.6); font-size: 10px;">Venue</p>
            <p class="font-semibold text-white" style="font-size: 12px; margin: 0;">School of Engineering &amp; Technology, MGM University</p>
          </div>
        </div>

        <div class="hero-meta-item">
          <?= render_icon('clock') ?>
          <div>
            <p class="font-mono text-[10px] uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.6); font-size: 10px;">Early Bird Deadline</p>
            <p class="font-semibold text-white" style="font-size: 12px; margin: 0;">15 Nov, 2026</p>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
        <button type="button" onclick="openRegistrationModal()"
          style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 9999px; background: #ffffff; color: var(--color-primary-900); box-shadow: 0 10px 25px rgba(0,0,0,0.15); transition: transform 0.15s;">
          Register Now <?= render_icon('arrow-right') ?>
        </button>

        <button type="button" onclick="downloadFile('SANKALP_Brochure.pdf')"
          class="btn-outline-white"
          style="padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
          Download Brochure <?= render_icon('download') ?>
        </button>
      </div>

    </div>

    <!-- Right Column (5 cols): Globe + Countdown Widget -->
    <div class="reveal-up delay-2 hero-right-col">

      <!-- Interactive Rotating Wireframe Globe -->
      <div style="position: relative; width: 280px; height: 280px; display: flex; align-items: center; justify-content: center;">
        <!-- Core glow -->
        <div class="globe-glow" style="position: absolute; inset: 0; border-radius: 50%; background: rgba(18,124,111,0.2); filter: blur(60px);"></div>

        <!-- Outer Dashed Ring -->
        <div class="globe-dashed-ring" style="position: absolute; width: 100%; height: 100%; border-radius: 50%; border: 1px dashed rgba(255,255,255,0.15);"></div>

        <!-- Wireframe Coordinate Mesh SVG -->
        <svg class="globe-mesh" style="position: absolute; width: 88%; height: 88%; color: rgba(255,255,255,0.25);" viewBox="0 0 200 200" fill="none" stroke="currentColor">
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

        <!-- Floating Tech Tags (IoT, Cloud, Cybersecurity) -->
        <div class="tech-tag-iot" style="position: absolute; top: 14%; right: 6%; display: flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 9999px; font-size: 10px; font-weight: 600; color: #fff; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #10B981;"></span> IoT
        </div>

        <div class="tech-tag-cloud" style="position: absolute; bottom: 22%; left: 2%; display: flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 9999px; font-size: 10px; font-weight: 600; color: #fff; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #38BDF8;"></span> Cloud
        </div>

        <div class="tech-tag-cyber" style="position: absolute; top: 38%; left: 5%; display: flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 9999px; font-size: 10px; font-weight: 600; color: #fff; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #F2B705;"></span> Cybersecurity
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
