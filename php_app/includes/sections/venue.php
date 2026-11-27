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

    <!-- Venue & Tourism Grid -->
    <div class="venue-grid">

      <!-- Left Card: Venue Coordinates & How to Reach -->
      <div class="reveal-up" style="border-radius: 1rem; padding: 2.25rem; color: #fff; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
            <div style="width: 2.75rem; height: 2.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.15); color: #fff;">
              <?= render_icon('map-pin') ?>
            </div>
            <div>
              <span class="font-mono text-[10px] uppercase tracking-widest" style="font-size: 10px; color: rgba(255,255,255,0.7);">Host Institution</span>
              <h3 class="font-display font-bold text-xl" style="font-size: 1.25rem; margin: 0; color: #fff;">Venue Details</h3>
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 1.25rem; font-size: 0.875rem; color: rgba(255,255,255,0.85);">
            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-accent-amber); margin-bottom: 0.25rem;">Proposed Venue</p>
              <p class="font-semibold text-white" style="margin: 0; line-height: 1.5;">
                School of Engineering and Technology (SOET)<br>
                MGM University, Chhatrapati Sambhajinagar, Maharashtra, India
              </p>
            </div>

            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-accent-amber); margin-bottom: 0.25rem;">Conference Dates</p>
              <p class="font-semibold text-white" style="margin: 0; line-height: 1.5;">
                <?= e($config['app_dates']) ?>
              </p>
            </div>

            <div>
              <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-accent-amber); margin-bottom: 0.25rem;">Transit &amp; Connectivity</p>
              <p style="margin: 0; line-height: 1.6; color: rgba(255,255,255,0.85);">
                <?= e($config['location_how_to_reach'] ?? 'Connected by air via Chhatrapati Sambhajinagar Airport (IXU), central railway junction, and national expressways with direct connections from Mumbai, Pune, Hyderabad, and Delhi.') ?>
              </p>
            </div>

            <div style="padding: 0.75rem 1rem; border-radius: 0.5rem; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); font-size: 0.75rem; line-height: 1.5; color: rgba(255,255,255,0.85);">
              <strong style="color: var(--color-accent-amber);">Venue Advisory:</strong>
              Detailed hall allocation, session room assignments, and campus logistics will be announced in accordance with the finalized conference schedule.
            </div>
          </div>
        </div>

        <div style="margin-top: 2rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: space-between;">
          <span style="font-size: 0.75rem; color: rgba(255,255,255,0.7);"><?= e($config['app_venue_label'] ?? 'School of Engineering and Technology, MGM University') ?></span>
          <a href="https://maps.google.com/?q=<?= urlencode('School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar') ?>" target="_blank" rel="noopener noreferrer" class="btn-amber" style="padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 700;">
            Open in Google Maps <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>

      <!-- Right Card: Chhatrapati Sambhajinagar Tourism & Heritage -->
      <div class="card reveal-up delay-1" style="padding: 2.25rem; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 2.75rem; height: 2.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: rgba(18, 124, 111, 0.1); color: var(--color-primary-700);">
              <?= render_icon('globe') ?>
            </div>
            <div>
              <span class="font-mono text-[10px] uppercase tracking-widest font-semibold" style="font-size: 10px; color: var(--color-primary-500);">Tourism &amp; Heritage</span>
              <h3 class="font-display font-bold text-xl" style="font-size: 1.25rem; margin: 0; color: var(--color-text-heading);">Host City Exploration</h3>
            </div>
          </div>

          <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 1.25rem;">
            Chhatrapati Sambhajinagar is globally acclaimed for the UNESCO World Heritage Sites of Ajanta and Ellora Caves, Bibi Ka Maqbara, Daulatabad Fort, and its rich historical heritage.
          </p>

          <div style="border-radius: 0.875rem; overflow: hidden; aspect-ratio: 16/9; border: 1px solid var(--color-border); background: #000;">
            <img src="https://images.unsplash.com/photo-1590050752117-238cb0fb12b1?w=800&h=450&fit=crop&auto=format" alt="Ajanta & Ellora Caves, Chhatrapati Sambhajinagar" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
        </div>

        <div style="margin-top: 1.25rem; font-size: 0.75rem; color: var(--color-text-body); text-align: center;">
          <span>UNESCO World Heritage Tourism Hub &bull; Maharashtra, India</span>
        </div>
      </div>

    </div>

  </div>
</section>
