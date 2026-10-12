<?php
/**
 * Global Footer Component
 */
$conferenceData = require __DIR__ . '/../config/conference_data.php';
$navLinks = $conferenceData['nav_links'];
?>
<footer id="contact-section" class="site-footer">
  <!-- Ambient footer glow -->
  <div style="position: absolute; right: 0; bottom: 0; width: 20rem; height: 20rem; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.15); filter: blur(80px);"></div>

  <div class="container" style="position: relative; z-index: 10;">
    <div class="footer-grid">

      <!-- Col 1: Brand & Social -->
      <div style="display: flex; flex-direction: column; gap: 1rem; text-align: left;">
        <div style="display: flex; align-items: center; gap: 0.625rem;">
          <?= render_icon('logo') ?>
          <div>
            <div class="font-display font-bold text-white text-base leading-none" style="font-size: 1rem; line-height: 1; color: #fff;">SANKALP</div>
            <div class="font-mono text-[10px] tracking-widest" style="font-size: 10px; color: rgba(255,255,255,0.5);">2027</div>
          </div>
        </div>
        <p style="font-size: 0.75rem; line-height: 1.6; color: rgba(255,255,255,0.6);">
          International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and InteLligent Technologies for Progress. Uniting researchers, academicians, and industry experts globally.
        </p>

        <!-- Social Icons -->
        <div style="display: flex; gap: 0.625rem; padding-top: 0.25rem;">
          <?php foreach (['facebook', 'twitter', 'linkedin', 'instagram', 'youtube'] as $soc): ?>
            <a href="#" aria-label="<?= ucfirst($soc) ?>"
              style="width: 2rem; height: 2rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.6); transition: all 0.15s;"
              onmouseover="this.style.color='#fff'; this.style.borderColor='#fff';"
              onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.borderColor='rgba(255,255,255,0.2)';">
              <?= render_icon($soc) ?>
            </a>
          <?php endforeach; ?>
        </div>
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
          Contact Us
        </h4>
        <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.75rem;">
          <div style="display: flex; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <span style="flex-shrink: 0; margin-top: 0.125rem;"><?= render_icon('map-pin') ?></span>
            <span>School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <?= render_icon('mail') ?>
            <a href="mailto:sankalp@mgmu.ac.in" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">sankalp@mgmu.ac.in</a>
          </div>
          <div style="display: flex; align-items: center; gap: 0.625rem; color: rgba(255,255,255,0.6);">
            <?= render_icon('phone') ?>
            <a href="tel:+911234567890" style="color: inherit; transition: color 0.15s;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.6)';">+91 1234 567890</a>
          </div>
        </div>
      </div>

      <!-- Col 4: Newsletter -->
      <div>
        <h4 class="font-mono uppercase tracking-widest font-bold text-white/50" style="font-size: 10px; margin-bottom: 1rem; color: rgba(255,255,255,0.5);">
          Newsletter
        </h4>
        <p style="font-size: 0.75rem; line-height: 1.6; color: rgba(255,255,255,0.6); margin-bottom: 1rem;">
          Subscribe for news, deadline reminders, and conference updates.
        </p>

        <div id="newsletter-feedback" class="form-feedback" style="display: none;"></div>

        <form id="newsletter-form" style="display: flex; flex-direction: column; gap: 0.625rem;">
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <input type="email" name="email" placeholder="Enter your email" required
            style="font-size: 0.75rem; padding: 0.75rem 1rem; border-radius: 0.75rem; outline: none; color: #fff; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); transition: border-color 0.15s;">
          <button type="submit" class="btn-amber"
            style="padding: 0.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            Subscribe
          </button>
        </form>
      </div>

    </div>

    <!-- Bottom Copyright Bar -->
    <div style="padding-top: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; align-items: center; gap: 0.75rem; font-size: 0.75rem; color: rgba(255,255,255,0.4); border-top: 1px solid rgba(255,255,255,0.08);" class="sm:flex-row">
      <span>&copy; 2027 SANKALP. All rights reserved. School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar.</span>
      <div style="display: flex; gap: 1.25rem;">
        <a href="#" style="color: inherit;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.4)';">Privacy Policy</a>
        <span>·</span>
        <a href="#" style="color: inherit;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='rgba(255,255,255,0.4)';">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>
</footer>

<!-- Modals Inclusion -->
<?php require __DIR__ . '/modals/registration-modal.php'; ?>
<?php require __DIR__ . '/modals/submission-modal.php'; ?>

<!-- Client Scripts -->
<script src="<?= asset_url('assets/js/countdown.js') ?>"></script>
<script src="<?= asset_url('assets/js/counters.js') ?>"></script>
<script src="<?= asset_url('assets/js/navigation.js') ?>"></script>
<script src="<?= asset_url('assets/js/modals.js') ?>"></script>
<script src="<?= asset_url('assets/js/forms.js') ?>"></script>
<script src="<?= asset_url('assets/js/main.js') ?>"></script>
</body>
</html>
