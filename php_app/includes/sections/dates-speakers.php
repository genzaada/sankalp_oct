<?php
/**
 * Keynote Speakers Component
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$speakers = $conferenceData['speakers'];
?>
<section id="speakers" class="section-white sankalp-speakers" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Keynote Speakers Full Width -->
    <div class="reveal-up">
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

      <div class="card" style="padding: 2.25rem 2rem; display: flex; flex-direction: column; justify-content: space-between;">
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
              <h4 class="font-display font-bold" style="font-size: 1.25rem; color: var(--color-text-heading); margin: 0.25rem 0 0 0; line-height: 1.3;">
                Keynote &amp; Invited Addresses
              </h4>
            </div>
          </div>

          <!-- Academic Narrative -->
          <p style="font-size: 0.9375rem; line-height: 1.65; color: var(--color-text-body); margin-bottom: 1.5rem; max-width: 56rem;">
            Plenary keynote lectures and invited technical presentations are currently being curated across the conference's core engineering domains. Forthcoming announcements will introduce invited speakers and academic leaders following steering committee confirmation.
          </p>

          <!-- Thematic Coverage Badges -->
          <div style="margin-bottom: 1.75rem;">
            <p class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-primary-700); margin-bottom: 0.75rem; letter-spacing: 0.05em;">
              Proposed Thematic Focus Areas (Subject to Program Confirmation):
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 0.625rem;">
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.4rem 0.75rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🚗 Sustainable Automotive Mobility &amp; EVs
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.4rem 0.75rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🏭 Intelligent Manufacturing &amp; Industry 5.0
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.4rem 0.75rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🤖 Artificial Intelligence &amp; Digital Engineering
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.4rem 0.75rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                ⚡ Clean Energy, Microgrids &amp; Decarbonization
              </span>
              <span style="font-size: 0.75rem; font-weight: 600; padding: 0.4rem 0.75rem; border-radius: 0.5rem; background: var(--color-bg-light); border: 1px solid var(--color-border); color: var(--color-text-heading);">
                🌿 Environmental Sustainability &amp; Circular Economy
              </span>
            </div>
          </div>

          <!-- Status Notice Box -->
          <div style="padding: 1rem 1.25rem; border-radius: 0.75rem; background: #fffbeb; border: 1px solid #fef3c7; border-left: 3px solid #f59e0b; display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="color: #b45309; font-size: 1.125rem; line-height: 1;">ℹ</span>
            <p style="font-size: 0.8125rem; line-height: 1.55; color: #92400e; margin: 0;">
              <strong>Speaker Roster Status:</strong> Plenary speakers, lecture abstracts, and session schedules remain unconfirmed and in administrative planning. No keynote speakers or session assignments have been finalized. Official profiles will be published following steering committee approval.
            </p>
          </div>
        </div>

        <!-- Secretariat Link Footer -->
        <div style="margin-top: 1.75rem; padding-top: 1.25rem; border-top: 1px solid var(--color-border); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 0.75rem;">
          <span style="font-size: 12px; color: var(--color-text-body);">
            Session &amp; Keynote Inquiries:
          </span>
          <a href="mailto:directorsoet@mgmu.ac.in?subject=ICAIESF%202027%20Keynote%20Session%20Enquiry"
             class="btn-outline-primary"
             style="font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.45rem 1rem; border-radius: 0.5rem; display: inline-flex; align-items: center; gap: 0.35rem;">
            Inquire with Secretariat <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
