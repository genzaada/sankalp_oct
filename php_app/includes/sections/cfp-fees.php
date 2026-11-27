<?php
/**
 * Registration Fees Component
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$regFees = $conferenceData['reg_fees'];
?>
<section id="fees" class="section-light" style="padding-top: 6rem; padding-bottom: 1.5rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Registration Fee Table -->
    <div class="reveal-up">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
            Registration Fee Structure
          </h2>
        </div>
      </div>

      <!-- Desktop Table -->
      <div class="card hidden md:block" style="padding: 1.5rem;">
        <table class="fee-table">
          <thead>
            <tr style="border-bottom: 2px solid var(--color-border);">
              <th style="font-size: 0.9375rem; font-weight: 700; color: #111827;">Registration Category</th>
              <th style="font-size: 0.9375rem; font-weight: 700; color: var(--color-primary-700); background: rgba(18,124,111,0.07); border-radius: 0.75rem 0.75rem 0 0;">
                Early Bird
                <span style="display: block; font-size: 0.75rem; font-weight: 600; margin-top: 0.125rem; color: var(--color-primary-700);">By 25 Dec 2026</span>
              </th>
              <th style="font-size: 0.9375rem; font-weight: 700; color: #111827;">
                Late / On-Spot
                <span style="display: block; font-size: 0.75rem; font-weight: 600; margin-top: 0.125rem; color: #374151;">After 25 Dec 2026</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($regFees as $row): ?>
              <tr>
                <td style="font-size: 1rem; font-weight: 600; color: #111827;"><?= e($row['category']) ?></td>
                <td class="font-mono font-bold" style="font-size: 1rem; color: var(--color-primary-700); background: rgba(18,124,111,0.05);"><?= e($row['early']) ?></td>
                <td class="font-mono font-bold" style="font-size: 1rem; color: #111827;"><?= e($row['spot']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div style="margin-top: 1.25rem; font-size: 0.875rem; line-height: 1.6; color: #dc2626;">
          <strong style="color: #dc2626;">Institutional Advisory Notice:</strong>
          Registration fee slabs and schedule milestones are currently under administrative review and subject to institutional approval by MGM University. All presented fees are provisional and will be confirmed prior to opening delegate registration.
        </div>

        <div style="margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
          <span style="font-size: 0.875rem; color: #111827;">
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
              <span class="font-mono uppercase font-bold" style="font-size: 10px; display: block; margin-bottom: 0.25rem; color: var(--color-primary-700);">Early Bird (By 25 Dec 2026)</span>
              <span class="font-mono font-bold text-2xl" style="font-size: 1.5rem; color: var(--color-primary-700);"><?= e($fee['early']) ?></span>
            </div>

            <div style="margin-bottom: 1rem; font-size: 0.875rem; font-family: var(--font-mono);">
              <div style="padding: 0.75rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                <span style="display: block; font-size: 11px; text-transform: uppercase; margin-bottom: 0.25rem; color: #374151; font-weight: 600;">Late / On-Spot (After 25 Dec 2026)</span>
                <span style="font-size: 1.125rem; font-weight: 700; color: #111827;"><?= e($fee['spot']) ?></span>
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
