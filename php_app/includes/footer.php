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
        <p style="font-size: 0.75rem; line-height: 1.6; color: rgba(255,255,255,0.6);">
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
                style="width: 2.75rem; height: 2.75rem; min-width: 44px; min-height: 44px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.6); transition: all 0.15s;"
                onmouseover="this.style.color='#fff'; this.style.borderColor='#fff';"
                onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.borderColor='rgba(255,255,255,0.2)';">
                <?= render_icon($soc) ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Col 2: Quick Links (2 sub-columns) -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold text-white/50" style="font-size: 10px; margin-bottom: 1rem; color: rgba(255,255,255,0.5);">
          Quick Links
        </h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; column-gap: 1rem; row-gap: 0.5rem; font-size: 0.75rem;">
          <?php foreach ($navLinks as $nl): ?>
            <button type="button" onclick="goToSection('<?= e($nl['target']) ?>', '<?= e($nl['page']) ?>', '<?= e($nl['label']) ?>')"
              style="text-align: left; color: rgba(255,255,255,0.6); display: inline-flex; align-items: center; gap: 0.25rem; transition: color 0.15s;"
              onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">
              <span style="color: var(--color-accent-amber); font-weight: bold;">&rsaquo;</span>
              <?= e($nl['label']) ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Col 3: Contact Info -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold text-white/50" style="font-size: 10px; margin-bottom: 1rem; color: rgba(255,255,255,0.5);">
          Conference Secretariat
        </h4>
        <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.75rem;">
          <div style="display: flex; gap: 0.625rem; color: rgba(255,255,255,0.85); font-weight: 600;">
            <span><?= e($config['conference_chair'] ?? 'Dr. Parminder Kaur Dhingra') ?></span>
          </div>
          <div style="font-size: 11px; color: rgba(255,255,255,0.6); line-height: 1.4;">
            Conference Chair, Professor &amp; Director<br>
            School of Engineering and Technology (SOET), MGM University
          </div>
          <div style="display: flex; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <span style="flex-shrink: 0; margin-top: 0.125rem;"><?= render_icon('map-pin') ?></span>
            <span><?= e($config['app_venue']) ?></span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <?= render_icon('mail') ?>
            <a href="mailto:<?= e($config['contact_email']) ?>" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';"><?= e($config['contact_email']) ?></a>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <?= render_icon('phone') ?>
            <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $config['contact_phone'])) ?>" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';"><?= e($config['contact_phone']) ?></a>
            <span style="color: rgba(255,255,255,0.4);">|</span>
            <a href="tel:02406481000" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';"><?= e($config['contact_office']) ?></a>
          </div>
        </div>
      </div>

      <!-- Col 4: Direct Inquiries -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold text-white/50" style="font-size: 10px; margin-bottom: 1rem; color: rgba(255,255,255,0.5);">
          Direct Enquiries
        </h4>
        <p style="font-size: 0.75rem; line-height: 1.6; color: rgba(255,255,255,0.6); margin-bottom: 1.25rem;">
          For submissions, academic sessions, industry partnership, and general information, connect directly with the secretariat:
        </p>

        <a href="mailto:<?= e($config['contact_email']) ?>?subject=ICAIESF%202027%20Inquiry" class="btn-amber"
          style="padding: 0.75rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; width: 100%;">
          <?= render_icon('mail') ?> Email Secretariat
        </a>
      </div>

    </div>

    <!-- Bottom Copyright Bar -->
    <div style="padding-top: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; align-items: center; gap: 0.75rem; font-size: 0.75rem; color: rgba(255,255,255,0.4); border-top: 1px solid rgba(255,255,255,0.08);" class="sm:flex-row">
      <span>&copy; <?= date('Y') ?> <?= e($config['app_name']) ?>. All rights reserved. <?= e($config['app_subtitle']) ?>.</span>
      <div style="display: flex; gap: 0.75rem; color: rgba(255,255,255,0.4);">
        <span>School of Engineering and Technology, MGM University</span>
      </div>
    </div>
  </div>
</footer>

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
