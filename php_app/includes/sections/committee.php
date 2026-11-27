<?php
/**
 * Organizing Committee Directory Section
 * Hierarchical presentation of verified conference leadership and advisory bodies.
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$committee = $conferenceData['committee'];
?>
<section id="committee" class="section-light sankalp-committee" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Leadership &amp; Governance</p>
      <h2 class="font-display font-bold tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Conference Leadership &amp; Organizing Committee
      </h2>
      <div style="margin: 0.5rem auto 1rem auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 46rem; margin: 0 auto; line-height: 1.6;">
        Guided by visionary academic leadership at MGM University in partnership with esteemed national researchers and international advisory scholars.
      </p>
    </div>

    <!-- Committee Tiers Container -->
    <div style="display: flex; flex-direction: column; gap: 2.5rem;">
      <?php foreach ($committee as $tierTitle => $members):
        $isLeadership = (str_contains(strtolower($tierTitle), 'patron') || str_contains(strtolower($tierTitle), 'leadership'));
        $gridClass = $isLeadership ? 'leadership-grid' : 'committee-three-grid';
      ?>
        <div class="reveal-up">
          <!-- Tier Header -->
          <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
            <div style="display: flex; align-items: center; gap: 0.625rem;">
              <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber);"></span>
              <h3 class="font-mono uppercase tracking-wider font-bold" style="font-size: 0.8125rem; color: var(--color-primary-800); margin: 0;">
                <?= e($tierTitle) ?>
              </h3>
            </div>
            <span class="font-mono text-xs" style="font-size: 10px; color: var(--color-text-body); font-weight: 600;">
              <?= count($members) ?> Distinguished Members
            </span>
          </div>

          <!-- Tier Cards Grid -->
          <div class="<?= $gridClass ?>">
            <?php foreach ($members as $mIdx => $m):
              $hasImage = !empty($m['image']);
            ?>
              <div class="member-card <?= $isLeadership ? 'leadership-card' : 'committee-card' ?>">

                <?php if ($isLeadership): ?>
                  <!-- Portrait or Academic Monogram Stage for Leadership -->
                  <div class="member-photo-frame <?= !$hasImage ? 'member-placeholder-frame' : '' ?>">
                    <?php if ($hasImage):
                      $photoSrc = (str_starts_with($m['image'], 'http://') || str_starts_with($m['image'], 'https://'))
                          ? $m['image']
                          : asset_url($m['image']);
                    ?>
                      <img src="<?= e($photoSrc) ?>" alt="Portrait of <?= e($m['name']) ?>" class="member-photo" loading="lazy">
                    <?php else: ?>
                      <div class="academic-monogram-circle" aria-hidden="true">
                        <span><?= e(get_member_initials($m['name'])) ?></span>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php else: ?>
                  <!-- Tier Badge & Icon for Organizing and Advisory Committees -->
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.875rem;">
                    <div class="committee-avatar-monogram" aria-hidden="true">
                      <span><?= e(get_member_initials($m['name'])) ?></span>
                    </div>
                    <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                      <?= e($m['role']) ?>
                    </span>
                  </div>
                <?php endif; ?>

                <!-- Member Info Block -->
                <div class="member-info">
                  <?php if ($isLeadership): ?>
                    <p class="member-role"><?= e($m['role']) ?></p>
                  <?php endif; ?>
                  <h4 class="member-name"><?= e($m['name']) ?></h4>
                  <p class="member-org"><?= e($m['org']) ?></p>
                </div>

              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
