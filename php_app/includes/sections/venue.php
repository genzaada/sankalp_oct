<?php
/**
 * Venue & Host City Tourism Section Component
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
?>
<section id="venue" class="section-white sankalp-venue" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Conference Location</p>
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Venue &amp; Host City
      </h2>
      <div style="margin: 0.5rem auto 0 auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
    </div>

    <!-- Venue Card -->
    <div class="venue-container" style="max-width: 52rem; margin: 0 auto;">
      <!-- Venue Coordinates & How to Reach -->
      <div class="reveal-up" style="border-radius: 1.25rem; padding: 2.5rem; color: #fff; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--shadow-xl);">
        <div>
          <div style="display: flex; align-items: center; gap: 0.875rem; margin-bottom: 1.75rem;">
            <div style="width: 3rem; height: 3rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.15); color: #fff; flex-shrink: 0;">
              <?= render_icon('map-pin') ?>
            </div>
            <div>
              <span class="font-mono uppercase tracking-widest" style="font-size: 11px; color: rgba(255,255,255,0.75);">Host Institution</span>
              <h3 class="font-display font-bold text-2xl" style="font-size: 1.5rem; margin: 0; color: #fff;">Venue Details</h3>
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 1.5rem; font-size: 0.9375rem; color: rgba(255,255,255,0.88);">
            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 11px; color: var(--color-accent-amber); margin-bottom: 0.35rem;">Proposed Venue</p>
              <p class="font-semibold text-white" style="margin: 0; line-height: 1.6; font-size: 1.05rem;">
                School of Engineering and Technology (SOET)<br>
                MGM University, Chhatrapati Sambhajinagar, Maharashtra, India
              </p>
            </div>

            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 11px; color: var(--color-accent-amber); margin-bottom: 0.35rem;">Conference Dates</p>
              <p class="font-semibold text-white" style="margin: 0; line-height: 1.5; font-size: 1rem;">
                <?= e($config['app_dates']) ?>
              </p>
            </div>

            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 11px; color: var(--color-accent-amber); margin-bottom: 0.35rem;">Transit &amp; Connectivity</p>
              <p style="margin: 0; line-height: 1.65; color: rgba(255,255,255,0.88);">
                <?= e($config['location_how_to_reach'] ?? 'Connected by air via Chhatrapati Sambhajinagar Airport (IXU), central railway junction, and national expressways with direct connections from Mumbai, Pune, Hyderabad, and Delhi.') ?>
              </p>
            </div>

            <div style="padding: 1rem 1.25rem; border-radius: 0.625rem; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); font-size: 0.8125rem; line-height: 1.6; color: rgba(255,255,255,0.9);">
              <strong style="color: var(--color-accent-amber);">Venue Advisory:</strong>
              Detailed hall allocation, session room assignments, and campus logistics will be announced in accordance with the finalized conference schedule.
            </div>
          </div>
        </div>

        <div style="margin-top: 2.25rem; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
          <span style="font-size: 0.8125rem; color: rgba(255,255,255,0.75);"><?= e($config['app_venue_label'] ?? 'School of Engineering and Technology, MGM University') ?></span>
          <a href="https://maps.google.com/?q=<?= urlencode('School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar') ?>" target="_blank" rel="noopener noreferrer" class="btn-amber" style="padding: 0.625rem 1.25rem; font-size: 0.8125rem; font-weight: 700;">
            Open in Google Maps <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
