<?php
/**
 * Navigation Bar Component
 */
$conferenceData = require __DIR__ . '/../config/conference_data.php';
$navLinks = $conferenceData['nav_links'];
?>
<nav class="site-nav">
  <div class="container nav-inner">

    <!-- Brand Logo -->
    <div class="nav-brand" onclick="navigateTo('home')" role="button" tabindex="0" aria-label="SANKALP 2027 Homepage">
      <?= render_icon('logo') ?>
      <div>
        <div class="font-display font-bold text-base leading-none" style="color: var(--color-primary-700); font-size: 1rem; line-height: 1;">SANKALP</div>
        <div class="font-mono text-[10px] font-medium tracking-widest" style="color: var(--color-primary-500); font-size: 10px; letter-spacing: 0.15em;">2027</div>
      </div>
    </div>

    <!-- Desktop Navigation Links -->
    <div class="nav-desktop-links">
      <?php foreach ($navLinks as $link): ?>
        <button type="button" class="nav-link <?= $link['label'] === 'Home' ? 'active' : '' ?>"
          data-nav="<?= e($link['label']) ?>"
          onclick="goToSection('<?= e($link['target']) ?>', '<?= e($link['page']) ?>', '<?= e($link['label']) ?>')">
          <?= e($link['label']) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Right Header CTAs -->
    <div style="display: flex; align-items: center; gap: 0.75rem;">
      <!-- Register Now Button -->
      <button type="button" class="btn-primary"
        style="padding: 0.625rem 1.25rem; font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase;"
        onclick="goToSection('fees', 'home', 'Registration')">
        Register Now <?= render_icon('arrow-right') ?>
      </button>

      <!-- Mobile Hamburger Toggle -->
      <button type="button" id="mobile-menu-btn" aria-label="Toggle Navigation Menu"
        style="padding: 0.5rem; border: 1px solid var(--color-border); border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; color: var(--color-text-heading);"
        class="lg:hidden">
        <span class="icon-menu"><?= render_icon('menu') ?></span>
        <span class="icon-x" style="display: none;"><?= render_icon('x') ?></span>
      </button>
    </div>

  </div>

  <!-- Mobile Drawer -->
  <div id="mobile-drawer" class="mobile-drawer">
    <div class="mobile-nav-grid">
      <?php foreach ($navLinks as $link): ?>
        <button type="button" class="mobile-nav-link <?= $link['label'] === 'Home' ? 'active' : '' ?>"
          data-nav="<?= e($link['label']) ?>"
          onclick="goToSection('<?= e($link['target']) ?>', '<?= e($link['page']) ?>', '<?= e($link['label']) ?>')">
          <?= e($link['label']) ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</nav>
