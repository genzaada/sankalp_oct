<?php
/**
 * Registration Fees Component
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$regFees = $conferenceData['reg_fees'];
?>
<section id="fees" class="section-light" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Registration Fee Table -->
    <div class="reveal-up">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Registration Fee Structure (Provisional)
          </span>
        </div>
        <span style="display: flex; align-items: center; gap: 0.375rem; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 10px; font-weight: 700; text-transform: uppercase; background: #fffbeb; border: 1px solid #fef3c7; color: #92400e;">
          Provisional Fee Schedule
        </span>
      </div>

      <!-- Desktop Table -->
      <div class="card hidden md:block" style="padding: 1.5rem;">
        <table class="fee-table">
          <thead>
            <tr style="border-bottom: 2px solid var(--color-border);">
              <th style="font-weight: 600; color: var(--color-text-body);">Category (Provisional)</th>
              <th style="font-weight: 700; color: var(--color-primary-700); background: rgba(18,124,111,0.07); border-radius: 0.75rem 0.75rem 0 0;">
                Early Bird (Provisional)
                <span style="display: block; font-size: 10px; font-weight: normal; margin-top: 0.125rem; color: var(--color-primary-500);">Pre-Registration</span>
              </th>
              <th style="font-weight: 600; color: var(--color-text-body);">
                Regular (Provisional)
                <span style="display: block; font-size: 10px; font-weight: normal; color: var(--color-text-body);">By Feb 20, 2027</span>
              </th>
              <th style="font-weight: 600; color: var(--color-text-body);">On Spot (Provisional)</th>
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

        <div style="margin-top: 1.25rem; padding: 0.875rem 1rem; border-radius: 0.5rem; background: rgba(18,124,111,0.05); border: 1px solid rgba(18,124,111,0.15); font-size: 0.75rem; line-height: 1.5; color: var(--color-text-body);">
          <strong style="color: var(--color-primary-900);">Institutional Advisory Notice:</strong>
          Registration fee slabs and schedule milestones are currently under administrative review and subject to institutional approval by MGM University. All presented fees are provisional and will be confirmed prior to opening delegate registration.
        </div>

        <div style="margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
          <span style="font-size: 0.75rem; color: var(--color-text-body);">
            Official registration portal and payment gateway will open upon steering committee approval.
          </span>
          <button type="button" onclick="openRegistrationModal()" class="btn-primary"
            style="padding: 0.625rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
            Registration Info <?= render_icon('arrow-right') ?>
          </button>
        </div>
      </div>

      <!-- Mobile Cards -->
      <div class="md:hidden" style="display: flex; flex-direction: column; gap: 1rem;">
        <?php foreach ($regFees as $fee): ?>
          <div class="card" style="padding: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <h4 class="font-display font-bold text-base" style="color: var(--color-text-heading); margin: 0;"><?= e($fee['category']) ?></h4>
              <span style="padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 9px; font-weight: 700; text-transform: uppercase; background: #fffbeb; border: 1px solid #fef3c7; color: #92400e;">Provisional Slab</span>
            </div>

            <div style="border-radius: 0.75rem; padding: 1rem; margin-bottom: 1rem; background: rgba(18,124,111,0.08); border: 1px solid rgba(18,124,111,0.2);">
              <span class="font-mono uppercase font-bold" style="font-size: 10px; display: block; margin-bottom: 0.25rem; color: var(--color-primary-700);">Early Bird (Provisional)</span>
              <span class="font-mono font-bold text-2xl" style="font-size: 1.5rem; color: var(--color-primary-700);"><?= e($fee['early']) ?></span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1rem; font-size: 0.75rem; font-family: var(--font-mono);">
              <div style="padding: 0.625rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                <span style="display: block; font-size: 9px; text-transform: uppercase; margin-bottom: 0.25rem; color: var(--color-text-body);">Regular (Provisional)</span>
                <span style="font-weight: 700; color: var(--color-text-heading);"><?= e($fee['regular']) ?></span>
              </div>
              <div style="padding: 0.625rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                <span style="display: block; font-size: 9px; text-transform: uppercase; margin-bottom: 0.25rem; color: var(--color-text-body);">On Spot (Provisional)</span>
                <span style="font-weight: 700; color: var(--color-text-heading);"><?= e($fee['spot']) ?></span>
              </div>
            </div>

            <button type="button" onclick="openRegistrationModal('<?= e($fee['category']) ?>')" class="btn-primary"
              style="width: 100%; padding: 0.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
              Registration Info <?= render_icon('arrow-right') ?>
            </button>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>
