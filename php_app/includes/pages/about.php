<?php
/**
 * About Page View Template — Institution-Focused Profile
 * School of Engineering and Technology (SOET), MGM University
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'about' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 100vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Institution Hero Banner -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 5rem; padding-bottom: 5rem; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <div class="pill-badge reveal-up" style="margin-bottom: 1.25rem;">Host &amp; Organizing Institution</div>
      <h1 class="font-display font-bold reveal-up delay-1" style="font-size: clamp(1.85rem, 4vw, 2.75rem); margin-bottom: 1rem; color: #fff;">
        School of Engineering and Technology
      </h1>
      <p class="reveal-up delay-2 font-display" style="font-size: clamp(1.1rem, 2vw, 1.35rem); color: var(--color-accent-amber); font-weight: 600; margin-bottom: 1rem;">
        MGM University, Chhatrapati Sambhajinagar
      </p>
      <p class="reveal-up delay-3" style="font-size: 0.875rem; max-width: 42rem; margin-left: auto; margin-right: auto; color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
        A premier center of multidisciplinary engineering education, scientific inquiry, and technological innovation in Maharashtra, India.
      </p>
    </div>
  </section>

  <!-- Institution Details Section -->
  <section class="section-light" style="padding-top: 4rem; padding-bottom: 5rem;">
    <div class="container">
      <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem;" class="lg:grid-cols-12">

        <!-- Main Column (8 cols): Academic & Research Profile -->
        <div style="display: flex; flex-direction: column; gap: 2rem;" class="lg:col-span-8">

          <!-- 1. School of Engineering and Technology (SOET) -->
          <div class="card reveal-up" style="padding: 2.25rem; text-align: left;">
            <div style="display: flex; align-items: center; gap: 0.625rem; margin-bottom: 1rem;">
              <span style="display: inline-block; width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-600);"></span>
              <h2 class="font-display font-bold text-xl" style="font-size: 1.35rem; color: var(--color-primary-700); margin: 0;">
                School of Engineering and Technology (SOET)
              </h2>
            </div>
            <p style="font-size: 0.9375rem; line-height: 1.7; color: var(--color-text-body); margin-bottom: 1.25rem;">
              The School of Engineering and Technology (SOET), MGM University, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement. The School offers undergraduate and Diploma programs in emerging areas of engineering and technology and actively promotes interdisciplinary research addressing contemporary industrial and societal challenges.
            </p>
            <p style="font-size: 0.9375rem; line-height: 1.7; color: var(--color-text-body); margin: 0;">
              As the organizing school for <?= e($config['app_name']) ?>, SOET fosters academic rigor and knowledge exchange to bridge engineering education, scientific inquiry, and technological development.
            </p>
          </div>

          <!-- 2. MGM University Profile -->
          <div class="card reveal-up delay-1" style="padding: 2.25rem; text-align: left;">
            <div style="display: flex; align-items: center; gap: 0.625rem; margin-bottom: 1rem;">
              <span style="display: inline-block; width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-600);"></span>
              <h2 class="font-display font-bold text-xl" style="font-size: 1.35rem; color: var(--color-primary-700); margin: 0;">
                About MGM University
              </h2>
            </div>
            <p style="font-size: 0.9375rem; line-height: 1.7; color: var(--color-text-body); margin-bottom: 1.25rem;">
              MGM University, located in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, is a State Private University established under the MGM University Act, 2019. The University is promoted by the Mahatma Gandhi Mission Trust, a renowned educational organization with a legacy of over four decades in education, healthcare, research, and social development.
            </p>
            <p style="font-size: 0.9375rem; line-height: 1.7; color: var(--color-text-body); margin-bottom: 1.5rem;">
              The University emphasizes innovation-driven education, research excellence, entrepreneurship, industry collaboration, and sustainable development. Through its academic ecosystem, modern laboratories, research centers, incubation facilities, and international collaborations, MGM University is committed to contributing towards national priorities and global sustainable development goals.
            </p>

            <div style="border-radius: 0.75rem; padding: 1.25rem 1.5rem; background: rgba(18, 124, 111, 0.06); border: 1px solid rgba(18, 124, 111, 0.2);">
              <h3 class="font-mono uppercase tracking-wider font-bold" style="font-size: 11px; color: var(--color-primary-800); margin-bottom: 0.5rem;">
                Host Institution for <?= e($config['app_name']) ?>
              </h3>
              <p style="font-size: 0.8125rem; line-height: 1.6; color: var(--color-text-heading); margin: 0;">
                As the host institution, SOET and MGM University provide campus infrastructure, academic leadership, and collaborative venues for <?= e($config['app_full_title']) ?>.
              </p>
            </div>
          </div>

          <!-- 3. Conference Navigation Pathway -->
          <div class="card reveal-up delay-2" style="padding: 2rem; border-left: 4px solid var(--color-accent-amber); display: flex; flex-direction: column; gap: 1rem;">
            <div>
              <h3 class="font-display font-bold" style="font-size: 1.1rem; color: var(--color-text-heading); margin-bottom: 0.375rem;">
                Explore <?= e($config['app_name']) ?> Conference Details
              </h3>
              <p style="font-size: 0.8125rem; color: var(--color-text-body); margin: 0; line-height: 1.5;">
                Access the official research tracks, submission guidelines, milestone dates, and organizing committee directory on the conference homepage:
              </p>
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 0.625rem; align-items: center;">
              <a href="index.php" class="btn-primary" style="padding: 0.625rem 1.25rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none;">
                Conference Home <?= render_icon('arrow-right') ?>
              </a>
              <a href="index.php#tracks" class="btn-outline-primary" style="padding: 0.625rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 0.5rem;">
                Conference Tracks <?= render_icon('arrow-right') ?>
              </a>
              <a href="index.php#cfp" class="btn-outline-primary" style="padding: 0.625rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 0.5rem;">
                Call for Papers <?= render_icon('arrow-right') ?>
              </a>
              <a href="index.php#committee" class="btn-outline-primary" style="padding: 0.625rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 0.5rem;">
                Organizing Committee <?= render_icon('arrow-right') ?>
              </a>
              <a href="index.php#venue" class="btn-outline-primary" style="padding: 0.625rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 0.5rem;">
                Venue &amp; Location <?= render_icon('arrow-right') ?>
              </a>
            </div>
          </div>

        </div>

        <!-- Right Sidebar (4 cols): Campus Photo & Key Institutional Facts -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;" class="lg:col-span-4">

          <!-- Campus Imagery Card -->
          <div class="card reveal-up" style="padding: 1.25rem; overflow: hidden;">
            <div style="border-radius: 0.75rem; overflow: hidden; aspect-ratio: 4/3; border: 1px solid var(--color-border); margin-bottom: 1rem; background: #20181B;">
              <img src="<?= asset_url('assets/images/mgm_university.png') ?>" alt="MGM University Campus" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 class="font-display font-bold" style="font-size: 0.9375rem; color: var(--color-text-heading); margin-bottom: 0.25rem;">
              MGM University Campus
            </h3>
            <p style="font-size: 0.75rem; color: var(--color-text-body); line-height: 1.4; margin: 0;">
              Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, India
            </p>
          </div>

          <!-- Institutional Factsheet Card -->
          <div class="reveal-up delay-1" style="border-radius: 1rem; padding: 1.75rem; color: #fff; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); box-shadow: 0 10px 24px rgba(10, 74, 71, 0.12);">
            <h3 class="font-display font-bold text-base" style="font-size: 1rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem; color: #fff;">
              <?= render_icon('building') ?> Institutional Overview
            </h3>
            <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.8125rem;">
              <div>
                <p class="font-mono uppercase tracking-wider" style="font-size: 9px; color: rgba(255,255,255,0.6); margin-bottom: 0.25rem;">Establishment</p>
                <p class="font-semibold text-white" style="margin: 0;">MGM University Act, 2019</p>
                <p style="font-size: 11px; color: rgba(255,255,255,0.75); margin: 0.125rem 0 0 0;">Promoted by Mahatma Gandhi Mission Trust (4+ Decades Legacy)</p>
              </div>
              <div style="border-top: 1px solid rgba(255,255,255,0.12); padding-top: 0.75rem;">
                <p class="font-mono uppercase tracking-wider" style="font-size: 9px; color: rgba(255,255,255,0.6); margin-bottom: 0.25rem;">Organizing School</p>
                <p class="font-semibold text-white" style="margin: 0;">School of Engineering and Technology (SOET)</p>
              </div>
              <div style="border-top: 1px solid rgba(255,255,255,0.12); padding-top: 0.75rem;">
                <p class="font-mono uppercase tracking-wider" style="font-size: 9px; color: rgba(255,255,255,0.6); margin-bottom: 0.25rem;">Conference Venue</p>
                <p style="margin: 0; line-height: 1.4; color: rgba(255,255,255,0.9);"><?= e($config['app_venue']) ?></p>
              </div>
            </div>
          </div>

          <!-- Contact Link Card -->
          <div class="card reveal-up delay-2" style="padding: 1.5rem;">
            <h3 class="font-display font-bold" style="font-size: 0.875rem; color: var(--color-text-heading); margin-bottom: 0.5rem;">
              Institutional Inquiries
            </h3>
            <p style="font-size: 0.75rem; line-height: 1.5; color: var(--color-text-body); margin-bottom: 1rem;">
              For institutional collaboration, campus facilities, or academic partnerships:
            </p>
            <a href="mailto:<?= e($config['contact_email']) ?>" class="btn-outline-primary" style="width: 100%; justify-content: center; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; display: inline-flex; align-items: center; gap: 0.375rem; border-radius: 0.5rem; text-decoration: none;">
              <?= render_icon('mail') ?> Email Secretariat
            </a>
          </div>

        </div>

      </div>
    </div>
  </section>

</main>
