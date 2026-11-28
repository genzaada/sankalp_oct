<?php
/**
 * Global Footer Component
 */
$config = $config ?? require __DIR__ . '/../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../config/conference_data.php';
$navLinks = $conferenceData['nav_links'];
?>
<footer id="contact-section" class="site-footer">
  <!-- Ambient footer glow -->
  <div style="position: absolute; right: 0; bottom: 0; width: 20rem; height: 20rem; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.15); filter: blur(80px);"></div>

  <div class="container" style="position: relative; z-index: 10;">
    <div class="footer-grid">

      <!-- Col 1: Brand & Social -->
      <div style="display: flex; flex-direction: column; gap: 1rem; text-align: left;">
        <div class="footer-brand-badge">
          <img src="<?= asset_url('assets/images/logo%202%20.png') ?>" alt="<?= e($config['app_name']) ?>" class="brand-logo-img">
        </div>
        <p style="font-size: 0.75rem; line-height: 1.6; color: #ffffff;">
          <?= e($config['app_full_title']) ?>. Organized by School of Engineering and Technology (SOET), MGM University.
        </p>

        <!-- Social Icons (Rendered only when valid URLs are configured) -->
        <?php
        $socialLinks = array_filter($config['social_links'] ?? [], function($url) {
            return !empty($url) && $url !== '#';
        });
        ?>
        <?php if (!empty($socialLinks)): ?>
          <div style="display: flex; gap: 0.625rem; padding-top: 0.25rem; flex-wrap: wrap;">
            <?php foreach ($socialLinks as $soc => $socUrl): ?>
              <a href="<?= e($socUrl) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= ucfirst($soc) ?>"
                style="width: 2.75rem; height: 2.75rem; min-width: 44px; min-height: 44px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.35); background: rgba(255,255,255,0.08); color: #ffffff; transition: all 0.15s;"
                onmouseover="this.style.color='var(--color-accent-amber)'; this.style.borderColor='var(--color-accent-amber)';"
                onmouseout="this.style.color='#ffffff'; this.style.borderColor='rgba(255,255,255,0.35)';">
                <?= render_icon($soc) ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Col 2: Quick Links (2 sub-columns) -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold" style="font-size: 10px; margin-bottom: 1rem; color: var(--color-accent-amber);">
          Quick Links
        </h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; column-gap: 1rem; row-gap: 0.5rem; font-size: 0.75rem;">
          <?php foreach ($navLinks as $nl): ?>
            <button type="button" onclick="goToSection('<?= e($nl['target']) ?>', '<?= e($nl['page']) ?>', '<?= e($nl['label']) ?>')"
              style="text-align: left; color: #ffffff; display: inline-flex; align-items: center; gap: 0.25rem; transition: color 0.15s;"
              onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';">
              <span style="color: var(--color-accent-amber); font-weight: bold;">&rsaquo;</span>
              <?= e($nl['label']) ?>
            </button>
          <?php endforeach; ?>
          <a href="index.php?page=conference-acknowledgement"
            style="text-align: left; color: #ffffff; display: inline-flex; align-items: center; gap: 0.25rem; transition: color 0.15s; text-decoration: none;"
            onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';">
            <span style="color: var(--color-accent-amber); font-weight: bold;">&rsaquo;</span>
            Conference Acknowledgement
          </a>
          <a href="index.php?page=terms-and-conditions"
            style="text-align: left; color: #ffffff; display: inline-flex; align-items: center; gap: 0.25rem; transition: color 0.15s; text-decoration: none;"
            onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';">
            <span style="color: var(--color-accent-amber); font-weight: bold;">&rsaquo;</span>
            Terms &amp; Conditions
          </a>
        </div>
      </div>

      <!-- Col 3: Contact Info -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold" style="font-size: 10px; margin-bottom: 1rem; color: var(--color-accent-amber);">
          For Conference Enquiries
        </h4>
        <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.75rem;">
          <div style="display: flex; gap: 0.625rem; color: #ffffff; font-weight: 600;">
            <span><?= e($config['conference_chair'] ?? 'Dr. Parminder Kaur Dhingra') ?></span>
          </div>
          <div style="font-size: 0.75rem; color: #ffffff; line-height: 1.5;">
            Conference Chair, <?= e($config['app_name']) ?><br>
            Professor &amp; Director<br>
            School of Engineering and Technology
          </div>
          <div style="display: flex; gap: 0.625rem; color: #ffffff;">
            <span style="flex-shrink: 0; margin-top: 0.125rem;"><?= render_icon('map-pin') ?></span>
            <span>MGM University, Chhatrapati Sambhajinagar &ndash; 431003, Maharashtra, India</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: #ffffff;">
            <span style="flex-shrink: 0;"><?= render_icon('phone') ?></span>
            <span style="display: inline-flex; align-items: center; gap: 0.375rem; white-space: nowrap;">
              <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $config['contact_phone'])) ?>" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';"><?= e($config['contact_phone']) ?></a>
              <span style="color: rgba(255,255,255,0.6);">|</span>
              <a href="tel:02406481000" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';"><?= e($config['contact_office']) ?></a>
            </span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: #ffffff;">
            <?= render_icon('mail') ?>
            <a href="mailto:<?= e($config['contact_email']) ?>" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='var(--color-accent-amber)';" onmouseout="this.style.color='#ffffff';"><?= e($config['contact_email']) ?></a>
          </div>
        </div>
      </div>

      <!-- Col 4: Direct Inquiries -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold" style="font-size: 10px; margin-bottom: 1rem; color: var(--color-accent-amber);">
          Direct Enquiries
        </h4>
        <p style="font-size: 0.75rem; line-height: 1.6; color: #ffffff; margin-bottom: 1.25rem;">
          For submissions, academic sessions, industry partnership, and general information, connect directly with the secretariat:
        </p>

        <a href="mailto:<?= e($config['contact_email']) ?>?subject=ICAIESF%202027%20Inquiry" class="btn-amber"
          style="padding: 0.75rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; width: 100%;">
          <?= render_icon('mail') ?> Email Secretariat
        </a>

        <!-- Social & Location Icons -->
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 1.25rem;">
          <a href="<?= e(!empty($config['social_links']['instagram']) ? $config['social_links']['instagram'] : '#') ?>" <?= !empty($config['social_links']['instagram']) ? 'target="_blank" rel="noopener noreferrer"' : '' ?> aria-label="Instagram"
            style="width: 2.5rem; height: 2.5rem; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.45); background: rgba(255,255,255,0.06); color: #ffffff; transition: all 0.15s;"
            onmouseover="this.style.color='var(--color-accent-amber)'; this.style.borderColor='var(--color-accent-amber)';"
            onmouseout="this.style.color='#ffffff'; this.style.borderColor='rgba(255,255,255,0.45)';">
            <?= render_icon('instagram') ?>
          </a>
          <a href="<?= e(!empty($config['social_links']['linkedin']) ? $config['social_links']['linkedin'] : '#') ?>" <?= !empty($config['social_links']['linkedin']) ? 'target="_blank" rel="noopener noreferrer"' : '' ?> aria-label="LinkedIn"
            style="width: 2.5rem; height: 2.5rem; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.45); background: rgba(255,255,255,0.06); color: #ffffff; transition: all 0.15s;"
            onmouseover="this.style.color='var(--color-accent-amber)'; this.style.borderColor='var(--color-accent-amber)';"
            onmouseout="this.style.color='#ffffff'; this.style.borderColor='rgba(255,255,255,0.45)';">
            <?= render_icon('linkedin') ?>
          </a>
          <a href="https://maps.google.com/?q=<?= urlencode($config['app_venue']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Location on Google Maps"
            style="width: 2.5rem; height: 2.5rem; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.45); background: rgba(255,255,255,0.06); color: #ffffff; transition: all 0.15s;"
            onmouseover="this.style.color='var(--color-accent-amber)'; this.style.borderColor='var(--color-accent-amber)';"
            onmouseout="this.style.color='#ffffff'; this.style.borderColor='rgba(255,255,255,0.45)';">
            <?= render_icon('map-pin') ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</footer>

<!-- Scroll to Top Button -->
<button type="button" id="scroll-to-top-btn" class="scroll-top-btn" aria-label="Scroll to top" title="Back to top">
  <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
    <polyline points="18 15 12 9 6 15"></polyline>
  </svg>
</button>

<!-- Modals Inclusion -->
<?php require __DIR__ . '/modals/registration-modal.php'; ?>
<?php require __DIR__ . '/modals/submission-modal.php'; ?>
<?php require __DIR__ . '/modals/brochure-modal.php'; ?>

<!-- Client Scripts -->
<script src="<?= asset_url('assets/js/countdown.js') ?>"></script>
<script src="<?= asset_url('assets/js/counters.js') ?>"></script>
<script src="<?= asset_url('assets/js/navigation.js') ?>"></script>
<script src="<?= asset_url('assets/js/modals.js') ?>"></script>
<script src="<?= asset_url('assets/js/main.js') ?>"></script>
</body>
</html>
