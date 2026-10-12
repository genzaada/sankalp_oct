<?php
/**
 * Call for Papers & Registration Fees Component
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$regFees = $conferenceData['reg_fees'];
?>
<section id="fees" class="section-light" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container split-grid">

    <!-- Left: Call for Papers Dark Teal Card (~35%) -->
    <div id="cfp" class="reveal-up" style="scroll-margin-top: 6rem; height: 100%;">
      <div style="border-radius: 1rem; padding: 2rem; height: 100%; display: flex; flex-direction: column; gap: 1.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #ffffff;">
        <!-- Ambient Blur -->
        <div style="position: absolute; right: -2rem; bottom: -2rem; width: 10rem; height: 10rem; border-radius: 50%; opacity: 0.1; background: #ffffff; filter: blur(40px);"></div>

        <div style="position: relative; z-index: 10;">
          <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.25); font-size: 10px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 1rem; color: rgba(255,255,255,0.8);">
            Submit Paper
          </div>
          <h3 class="font-display font-bold uppercase tracking-wide text-2xl" style="font-size: 1.5rem; margin-bottom: 0.75rem;">
            Call For Papers
          </h3>
          <p style="font-size: 0.875rem; line-height: 1.6; color: rgba(255,255,255,0.75); max-width: 85%;">
            We invite original research papers, case studies and review papers in AI, Emerging Technologies and Future Systems. All accepted papers published in Scopus Indexed proceedings.
          </p>
        </div>

        <!-- Megaphone + Document Watermark SVG -->
        <div style="position: absolute; right: 0.5rem; bottom: 0.5rem; width: 7rem; height: 7rem; opacity: 0.1; pointer-events: none; z-index: 0;">
          <svg style="width: 100%; height: 100%; color: #ffffff;" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <path d="M18 8a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-1l-3 3v-9l3 3h1z" fill="currentColor"></path>
          </svg>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-top: auto; position: relative; z-index: 10;">
          <button type="button" onclick="openSubmissionModal()" class="btn-amber"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            Submit Your Paper <?= render_icon('arrow-right') ?>
          </button>

          <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" class="btn-outline-white"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            <?= render_icon('download') ?> Paper Guidelines
          </button>
        </div>
      </div>
    </div>

    <!-- Right: Registration Fee Table (~65%) -->
    <div class="reveal-up delay-2">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Registration Fee
          </span>
        </div>
        <span style="display: flex; align-items: center; gap: 0.375rem; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-accent-amber); color: var(--color-primary-900);">
          🔥 Early Bird Open
        </span>
      </div>

      <!-- Desktop Table -->
      <div class="card hidden md:block" style="padding: 1.5rem;">
        <table class="fee-table">
          <thead>
            <tr style="border-bottom: 2px solid var(--color-border);">
              <th style="font-weight: 600; color: var(--color-text-body);">Category</th>
              <th style="font-weight: 700; color: var(--color-primary-700); background: rgba(18,124,111,0.07); border-radius: 0.75rem 0.75rem 0 0;">
                Early Bird
                <span style="margin-left: 0.5rem; padding: 0.125rem 0.375rem; border-radius: 9999px; font-size: 9px; font-weight: 700; background: var(--color-accent-amber); color: var(--color-primary-900);">Best Value</span>
                <span style="display: block; font-size: 10px; font-weight: normal; margin-top: 0.125rem; color: var(--color-primary-500);">Till 15 Nov, 2026</span>
              </th>
              <th style="font-weight: 600; color: var(--color-text-body);">
                Regular
                <span style="display: block; font-size: 10px; font-weight: normal; color: var(--color-text-body);">Till 31 Dec, 2026</span>
              </th>
              <th style="font-weight: 600; color: var(--color-text-body);">On Spot</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($regFees as $row): ?>
              <tr>
                <td style="font-weight: 600; color: var(--color-text-heading);"><?= e($row['category']) ?></td>
                <td class="font-mono font-bold" style="font-size: 0.875rem; color: var(--color-primary-700); background: rgba(18,124,111,0.05);"><?= e($row['early']) ?></td>
                <td class="font-mono" style="color: var(--color-text-body);"><?= e($row['regular']) ?></td>
                <td class="font-mono" style="color: var(--color-text-body);"><?= e($row['spot']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div style="margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
          <span style="font-size: 0.75rem; color: var(--color-text-body);">
            All fees include access to all sessions &amp; proceedings kit.
          </span>
          <button type="button" onclick="openRegistrationModal()" class="btn-primary"
            style="padding: 0.625rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
            Register Now <?= render_icon('arrow-right') ?>
          </button>
        </div>
      </div>

      <!-- Mobile Cards -->
      <div class="md:hidden" style="display: flex; flex-direction: column; gap: 1rem;">
        <?php foreach ($regFees as $fee): ?>
          <div class="card" style="padding: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <h4 class="font-display font-bold text-base" style="color: var(--color-text-heading); margin: 0;"><?= e($fee['category']) ?></h4>
              <span style="padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 9px; font-weight: 700; text-transform: uppercase; background: var(--color-accent-amber); color: var(--color-primary-900);">Early Bird</span>
            </div>

            <div style="border-radius: 0.75rem; padding: 1rem; margin-bottom: 1rem; background: rgba(18,124,111,0.08); border: 1px solid rgba(18,124,111,0.2);">
              <span class="font-mono uppercase font-bold" style="font-size: 10px; display: block; margin-bottom: 0.25rem; color: var(--color-primary-700);">Early Bird (Till 15 Nov)</span>
              <span class="font-mono font-bold text-2xl" style="font-size: 1.5rem; color: var(--color-primary-700);"><?= e($fee['early']) ?></span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1rem; font-size: 0.75rem; font-family: var(--font-mono);">
              <div style="padding: 0.625rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                <span style="display: block; font-size: 9px; text-transform: uppercase; margin-bottom: 0.25rem; color: var(--color-text-body);">Regular (Till 31 Dec)</span>
                <span style="font-weight: 700; color: var(--color-text-heading);"><?= e($fee['regular']) ?></span>
              </div>
              <div style="padding: 0.625rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                <span style="display: block; font-size: 9px; text-transform: uppercase; margin-bottom: 0.25rem; color: var(--color-text-body);">On Spot</span>
                <span style="font-weight: 700; color: var(--color-text-heading);"><?= e($fee['spot']) ?></span>
              </div>
            </div>

            <button type="button" onclick="openRegistrationModal('<?= e($fee['category']) ?>')" class="btn-primary"
              style="width: 100%; padding: 0.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
              Register Now <?= render_icon('arrow-right') ?>
            </button>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>
