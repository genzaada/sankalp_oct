<?php
/**
 * Conference Leadership & Committees Directory Section
 * Hierarchical presentation of verified conference leadership, guests of honour, advisory, and organizing bodies.
 * 
 * Order of Sections:
 * 1. Patrons & Leadership
 * 2. Guests of Honour
 * 3. Advisory Committee
 * 4. Organising Committee
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$committee = $conferenceData['committee'];
?>
<section id="committee" class="section-light sankalp-committee" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem;">
  <div class="container">

    <!-- Section Main Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Leadership &amp; Governance</p>
      <h2 class="font-display font-bold tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Conference Leadership &amp; Committees
      </h2>
      <div style="margin: 0.5rem auto 1rem auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 46rem; margin: 0 auto; line-height: 1.6;">
        Guided by visionary academic leadership at MGM University in partnership with esteemed national researchers, distinguished guests of honour, and institutional scholars.
      </p>
    </div>

    <!-- Committee Tiers Container -->
    <div style="display: flex; flex-direction: column; gap: 3.5rem;">
      <?php foreach ($committee as $tierTitle => $members):
        $isLeadership = (str_contains(strtolower($tierTitle), 'patron') || str_contains(strtolower($tierTitle), 'leadership'));
        $isGuests = (str_contains(strtolower($tierTitle), 'guest'));
        $isOrganising = (str_contains(strtolower($tierTitle), 'organis') || str_contains(strtolower($tierTitle), 'organiz'));
        $isAdvisory = (str_contains(strtolower($tierTitle), 'advisor'));

        // Assign tier anchor id
        if ($isLeadership) {
            $tierId = 'patrons';
        } elseif ($isGuests) {
            $tierId = 'guests-of-honour';
        } elseif ($isAdvisory) {
            $tierId = 'advisory-committee';
        } else {
            $tierId = 'organising-committee';
        }
      ?>
        <div id="<?= e($tierId) ?>" class="reveal-up" style="scroll-margin-top: 6rem;">
          <!-- Tier Header -->
          <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.875rem;">
            <div style="display: flex; align-items: center; gap: 0.625rem;">
              <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--color-accent-amber);"></span>
              <h3 class="font-mono uppercase tracking-wider font-bold" style="font-size: 0.875rem; color: var(--color-primary-800); margin: 0;">
                <?= e($tierTitle) ?>
              </h3>
            </div>
            <span class="font-mono text-xs" style="font-size: 10px; color: var(--color-text-body); font-weight: 600;">
              <?= count($members) ?> <?= $isGuests ? 'Distinguished Dignitaries' : 'Distinguished Members' ?>
            </span>
          </div>

          <?php if ($isLeadership): ?>
            <!-- 1. Patrons & Leadership Tier Cards Grid -->
            <div class="leadership-grid">
              <?php foreach ($members as $m):
                $hasImage = !empty($m['image']);
              ?>
                <div class="member-card leadership-card">
                  <?php if (!empty($m['linkedin'])): ?>
                    <a href="<?= e($m['linkedin']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="card-top-linkedin-btn"
                       aria-label="<?= e($m['name']) ?> on LinkedIn"
                       title="View <?= e($m['name']) ?> on LinkedIn">
                      <?= render_icon('linkedin') ?>
                    </a>
                  <?php endif; ?>

                  <!-- Portrait or Academic Monogram Stage -->
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

                  <!-- Member Info Block -->
                  <div class="member-info">
                    <p class="member-role"><?= e($m['role']) ?></p>
                    <h4 class="member-name"><?= e($m['name']) ?></h4>
                    <p class="member-org"><?= e($m['org']) ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          <?php elseif ($isGuests): ?>
            <!-- 2. Guests of Honour Tier Cards Grid (Reuses Keynote Profile Card Component) -->
            <div class="guests-of-honour-grid">
              <?php foreach ($members as $m):
                $hasPhoto = !empty($m['image']) && file_exists(__DIR__ . '/../../' . $m['image']);
                $imgUrl = $hasPhoto ? asset_url(implode('/', array_map('rawurlencode', explode('/', $m['image'])))) : '';
              ?>
                <div class="guest-card">
                  <?php if (!empty($m['linkedin'])): ?>
                    <a href="<?= e($m['linkedin']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="card-top-linkedin-btn"
                       aria-label="<?= e($m['name']) ?> on LinkedIn"
                       title="View <?= e($m['name']) ?> on LinkedIn">
                      <?= render_icon('linkedin') ?>
                    </a>
                  <?php endif; ?>

                  <div style="display: flex; flex-direction: column; align-items: center; width: 100%; flex-grow: 1;">
                    <div class="guest-avatar">
                      <?php if ($hasPhoto): ?>
                        <img src="<?= e($imgUrl) ?>" alt="<?= e($m['name']) ?>" loading="lazy" width="88" height="88">
                      <?php else: ?>
                        <div class="guest-monogram" title="<?= e($m['name']) ?>">
                          <?= e(get_member_initials($m['name'])) ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <h4 class="guest-name"><?= e($m['name']) ?></h4>
                    <p class="guest-role"><?= e($m['designation'] ?? $m['role']) ?></p>
                    <p class="guest-org"><?= e($m['organization'] ?? $m['org']) ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          <?php elseif ($isAdvisory): ?>
            <!-- 3. Advisory Committee Tier Cards Grid (3 Columns on Desktop) -->
            <div class="committee-three-grid">
              <?php foreach ($members as $m):
                $hasPhoto = !empty($m['image']) && file_exists(__DIR__ . '/../../' . $m['image']);
                $imgUrl = $hasPhoto ? asset_url(implode('/', array_map('rawurlencode', explode('/', $m['image'])))) : '';
              ?>
                <div class="member-card committee-card">
                  <?php if (!empty($m['linkedin'])): ?>
                    <a href="<?= e($m['linkedin']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="card-top-linkedin-btn"
                       aria-label="<?= e($m['name']) ?> on LinkedIn"
                       title="View <?= e($m['name']) ?> on LinkedIn">
                      <?= render_icon('linkedin') ?>
                    </a>
                  <?php endif; ?>

                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.875rem; <?= !empty($m['linkedin']) ? 'padding-right: 2.25rem;' : '' ?>">
                    <?php if ($hasPhoto): ?>
                      <div class="committee-avatar-photo-wrap">
                        <img src="<?= e($imgUrl) ?>" alt="Photo of <?= e($m['name']) ?>" class="committee-avatar-photo" loading="lazy">
                      </div>
                    <?php else: ?>
                      <div class="committee-avatar-monogram" aria-hidden="true" title="<?= e($m['name']) ?>">
                        <span><?= e(get_member_initials($m['name'])) ?></span>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($m['role'])): ?>
                      <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                        <?= e($m['role']) ?>
                      </span>
                    <?php endif; ?>
                  </div>

                  <div class="member-info">
                    <h4 class="member-name"><?= e($m['name']) ?></h4>
                    <?php if (!empty($m['org'])): ?>
                      <p class="member-org" style="font-weight: 600; color: #374151;"><?= e($m['org']) ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          <?php else: ?>
            <!-- 4. Organising Committee Tier Cards Grid (3 Columns on Desktop) -->
            <div class="organising-grid">
              <?php foreach ($members as $m):
                $isConvener = !empty($m['is_convener']);
                $isCoConvener = !empty($m['is_coconvener']);
                $cardExtraClass = $isConvener ? 'convener-card' : ($isCoConvener ? 'coconvener-card' : '');
                $hasPhoto = !empty($m['image']) && file_exists(__DIR__ . '/../../' . $m['image']);
                $imgUrl = $hasPhoto ? asset_url(implode('/', array_map('rawurlencode', explode('/', $m['image'])))) : '';
              ?>
                <div class="member-card committee-card <?= $cardExtraClass ?>">
                  <?php if (!empty($m['linkedin'])): ?>
                    <a href="<?= e($m['linkedin']) ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="card-top-linkedin-btn"
                       aria-label="<?= e($m['name']) ?> on LinkedIn"
                       title="View <?= e($m['name']) ?> on LinkedIn">
                      <?= render_icon('linkedin') ?>
                    </a>
                  <?php endif; ?>

                  <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.875rem; gap: 0.5rem; <?= !empty($m['linkedin']) ? 'padding-right: 2.25rem;' : '' ?>">
                    <?php if ($hasPhoto): ?>
                      <div class="committee-avatar-photo-wrap">
                        <img src="<?= e($imgUrl) ?>" alt="Photo of <?= e($m['name']) ?>" class="committee-avatar-photo" loading="lazy">
                      </div>
                    <?php else: ?>
                      <div class="committee-avatar-monogram" aria-hidden="true" title="<?= e($m['name']) ?>">
                        <span><?= e(get_member_initials($m['name'])) ?></span>
                      </div>
                    <?php endif; ?>
                    <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 0.25rem;">
                      <?php if ($isConvener): ?>
                        <span class="convener-pill">
                          Convener
                        </span>
                      <?php elseif ($isCoConvener): ?>
                        <span class="coconvener-pill">
                          Co-convener
                        </span>
                        <?php if (!empty($m['secondary_role'])): ?>
                          <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.18rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                            <?= e($m['secondary_role']) ?>
                          </span>
                        <?php endif; ?>
                      <?php else: ?>
                        <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                          <?= e($m['role']) ?>
                        </span>
                        <?php if (!empty($m['secondary_role'])): ?>
                          <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.15); color: var(--color-primary-800); border: 1px solid rgba(18, 124, 111, 0.25);">
                            <?= e($m['secondary_role']) ?>
                          </span>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="member-info">
                    <h4 class="member-name"><?= e($m['name']) ?></h4>
                    <p class="member-org"><?= e($m['org']) ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
