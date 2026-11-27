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

      <div class="card" style="padding: 1.25rem; display: flex; flex-direction: column; gap: 0.5rem;">
        <?php foreach ($dates as $d): ?>
          <?php
          $isDeadline = $d['type'] === 'deadline';
          $isEvent = $d['type'] === 'event';
          $bgStyle = $isDeadline ? 'background: #fff1f2; border: 1px solid #ffe4e6;' : ($isEvent ? 'background: rgba(18,124,111,0.06); border: 1px solid #ccfbf1;' : 'border: 1px solid var(--color-border); background: var(--color-bg-light);');
          $textStyle = $isDeadline ? 'color: #be123c;' : 'color: var(--color-text-heading);';
          ?>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.875rem 1rem; border-radius: 0.75rem; gap: 0.75rem; <?= $bgStyle ?>">
            <div style="min-width: 0;">
              <span style="font-size: 0.8125rem; font-weight: 600; display: block; line-height: 1.4; <?= $textStyle ?>">
                <?= e($d['label']) ?>
              </span>
              <span class="font-mono text-[9px] uppercase" style="color: #92400e; font-size: 9px; font-weight: 600; display: inline-block; margin-top: 0.125rem;">
                Proposed Schedule
              </span>
            </div>
            <span class="font-mono font-bold" style="font-size: 11px; padding: 0.35rem 0.625rem; border-radius: 0.5rem; border: 1px solid var(--color-border); background: #ffffff; color: var(--color-primary-700); text-align: right; flex-shrink: 0; white-space: nowrap;">
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
            Keynote &amp; Invited Speakers
          </span>
        </div>
        <span class="font-mono text-[10px] uppercase font-bold" style="font-size: 10px; color: var(--color-primary-600); background: rgba(18,124,111,0.08); padding: 0.25rem 0.625rem; border-radius: 9999px;">
          Speakers to be Announced
        </span>
      </div>

      <div class="card" style="padding: 1.75rem 1.5rem; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
        <div>
          <!-- Unified Announcement Header -->
          <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
            <div style="width: 3.25rem; height: 3.25rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: linear-gradient(145deg, var(--color-primary-700), var(--color-primary-900)); color: var(--color-accent-amber); box-shadow: 0 4px 12px rgba(10, 74, 71, 0.15); border: 2px solid var(--color-accent-amber); font-size: 1.25rem;">
              🎤
            </div>
            <div>
              <span class="font-mono uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.55rem; border-radius: 9999px; background: rgba(18,124,111,0.1); color: var(--color-primary-900); letter-spacing: 0.04em;">
                Plenary &amp; Keynote Series (Under Planning)
              </span>
              <h4 class="font-display font-bold" style="font-size: 1.15rem; color: var(--color-text-heading); margin: 0.25rem 0 0 0; line-height: 1.3;">
                Keynote &amp; Invited Addresses
              </h4>
            </div>
          </div>

          <!-- Academic Narrative -->
          <p style="font-size: 0.875rem; line-height: 1.65; color: var(--color-text-body); margin-bottom: 1.25rem;">
            Plenary keynote lectures and invited technical presentations are currently being curated across the conference's core engineering domains. Forthcoming announcements will introduce invited speakers and academic leaders following steering committee confirmation.
          </p>

          <!-- Thematic Coverage Badges -->
          <div style="margin-bottom: 1.5rem;">
            <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-primary-700); margin-bottom: 0.625rem; letter-spacing: 0.05em;">
              Proposed Thematic Focus Areas (Subject to Program Confirmation):
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🚗 Sustainable Automotive Mobility &amp; EVs
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🏭 Intelligent Manufacturing &amp; Industry 5.0
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🤖 Artificial Intelligence &amp; Digital Engineering
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                ⚡ Clean Energy, Microgrids &amp; Decarbonization
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.35rem 0.65rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🌿 Environmental Sustainability &amp; Circular Economy
              </span>
            </div>
          </div>

          <!-- Status Notice Box -->
          <div style="padding: 0.875rem 1.125rem; border-radius: 0.75rem; background: #fffbeb; border: 1px solid #fef3c7; border-left: 3px solid #f59e0b; display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="color: #b45309; font-size: 1rem; line-height: 1;">ℹ</span>
            <p style="font-size: 0.8125rem; line-height: 1.5; color: #92400e; margin: 0;">
              <strong>Speaker Roster Status:</strong> Plenary speakers, lecture abstracts, and session schedules remain unconfirmed and in administrative planning. No keynote speakers or session assignments have been finalized. Official profiles will be published following steering committee approval.
            </p>
          </div>
        </div>

        <!-- Secretariat Link Footer -->
        <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--color-border); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 0.75rem;">
          <span style="font-size: 11px; color: var(--color-text-body);">
            Session &amp; Keynote Inquiries:
          </span>
          <a href="mailto:directorsoet@mgmu.ac.in?subject=ICAIESF%202027%20Keynote%20Session%20Enquiry"
             class="btn-outline-primary"
             style="font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.4rem 0.85rem; border-radius: 0.5rem; display: inline-flex; align-items: center; gap: 0.25rem;">
            Inquire with Secretariat <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
