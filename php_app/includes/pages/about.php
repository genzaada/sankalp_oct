<?php
/**
 * About Page View Template
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$committee = $conferenceData['committee'];
?>
<main id="view-about" class="page-view" style="<?= ($currentPage ?? 'home') === 'about' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 100vh;">

  <!-- About Hero Banner -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 5rem; padding-bottom: 5rem; text-align: center; position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 10;">
      <div class="pill-badge reveal-up" style="margin-bottom: 1.25rem;"><?= e($config['app_name']) ?></div>
      <h1 class="font-display font-bold reveal-up delay-1" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1rem; color: #fff;">
        About the Conference &amp; Host Institution
      </h1>
      <p class="reveal-up delay-2" style="font-size: 0.875rem; max-width: 38rem; margin-left: auto; margin-right: auto; color: rgba(255, 255, 255, 0.75); line-height: 1.6;">
        <?= e($config['app_subtitle']) ?>. Promoting sustainable engineering, knowledge systems, and intelligent technologies.
      </p>
    </div>
  </section>

  <!-- About Content Grid -->
  <section class="section-light" style="padding-top: 4rem; padding-bottom: 5rem;">
    <div class="container" style="display: grid; grid-template-columns: 1fr; gap: 3rem;">
      <div style="display: grid; grid-template-columns: 1fr; gap: 3rem;" class="lg:grid-cols-12">

        <!-- Left Column (8 cols) -->
        <div style="display: flex; flex-direction: column; gap: 2rem;" class="lg:col-span-8">

          <!-- 1. Vision & Mission -->
          <div class="card reveal-up" style="padding: 2rem; text-align: left;">
            <h2 class="font-display font-bold text-xl" style="font-size: 1.25rem; color: var(--color-primary-700); margin-bottom: 1rem;">
              Conference Vision &amp; Goal
            </h2>
            <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 0.75rem;">
              The primary vision of <?= e($config['app_name']) ?> is to provide an international forum for cutting-edge computing research. We aim to inspire multidisciplinary cooperation, explore technological convergence, and drive development in automation, neural systems, cybersecurity, and data-driven sciences.
            </p>
            <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin: 0;">
              Scholars and developers from all over the world gather to build active linkages between academia and industry. <?= e($config['app_venue']) ?> proudly hosts this elite ecosystem.
            </p>
          </div>

          <!-- 2. Host Institution Showcase -->
          <div class="card reveal-up delay-1" style="padding: 2rem; display: grid; grid-template-columns: 1fr; gap: 1.5rem; align-items: center;" class="md:grid-cols-2">
            <div>
              <h2 class="font-display font-bold text-xl" style="font-size: 1.25rem; color: var(--color-primary-700); margin-bottom: 0.75rem;">
                Organizing Institution
              </h2>
              <h3 style="font-weight: 600; font-size: 0.875rem; color: var(--color-text-heading); margin-bottom: 0.5rem;">
                School of Engineering and Technology (SOET), MGM University
              </h3>
              <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 0.75rem;">
                The School of Engineering and Technology (SOET), MGM University, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement. The School offers undergraduate and Diploma programs in emerging areas of engineering and technology and actively promotes interdisciplinary research addressing contemporary industrial and societal challenges.
              </p>
              <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin: 0;">
                MGM University, located in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, is a State Private University established under the MGM University Act, 2019, promoted by the Mahatma Gandhi Mission Trust with over four decades of legacy.
              </p>
            </div>
            <div style="border-radius: 1rem; overflow: hidden; aspect-ratio: 4/3; border: 1px solid var(--color-border); background: #20181B;">
              <img src="<?= asset_url('assets/images/mgm_university.png') ?>" alt="MGM University & SOET" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          </div>

          <!-- 3. Organizing Committee Directory -->
          <div id="committee" class="card reveal-up delay-2" style="padding: 2rem; scroll-margin-top: 6rem;">
            <h2 class="font-display font-bold text-xl" style="font-size: 1.25rem; color: var(--color-primary-700); margin-bottom: 1.5rem;">
              Organizing Committee
            </h2>
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
              <?php foreach ($committee as $categoryName => $members): ?>
                <div style="border-top: 1px solid var(--color-border); padding-top: 1rem;">
                  <h3 class="font-mono uppercase tracking-wider font-bold" style="font-size: 11px; color: var(--color-primary-500); margin-bottom: 0.75rem;">
                    <?= e($categoryName) ?>
                  </h3>
                  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 0.75rem;">
                    <?php foreach ($members as $m): ?>
                      <div style="padding: 0.75rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light);">
                        <p class="font-mono uppercase tracking-wide" style="font-size: 9px; color: var(--color-text-body); margin-bottom: 0.25rem;"><?= e($m['role']) ?></p>
                        <p class="font-bold" style="font-size: 0.75rem; color: var(--color-text-heading); margin-bottom: 0.125rem;"><?= e($m['name']) ?></p>
                        <p style="font-size: 10px; line-height: 1.4; color: var(--color-text-body); margin: 0;"><?= e($m['org']) ?></p>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <!-- Right Sidebar (4 cols): Venue & Tourism -->
        <div id="venue-section" style="display: flex; flex-direction: column; gap: 1.5rem; scroll-margin-top: 6rem;" class="lg:col-span-4">

          <!-- Venue Coordinates Card -->
          <div class="reveal-up" style="border-radius: 1rem; padding: 1.75rem; color: #fff; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%);">
            <h3 class="font-display font-bold text-base" style="font-size: 1rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
              <?= render_icon('map-pin') ?> Venue Details
            </h3>
            <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.75rem; color: rgba(255,255,255,0.8);">
              <div>
                <p class="font-mono uppercase tracking-wider" style="font-size: 9px; color: rgba(255,255,255,0.5); margin-bottom: 0.125rem;">Location</p>
                <p class="font-semibold text-white" style="margin: 0;"><?= e($config['app_venue']) ?></p>
              </div>
              <div>
                <p class="font-mono uppercase tracking-wider" style="font-size: 9px; color: rgba(255,255,255,0.5); margin-bottom: 0.125rem;">How to Reach</p>
                <p style="margin: 0;"><?= e($config['location_how_to_reach'] ?? 'Connected by air (Chhatrapati Sambhajinagar Airport - IXU), rail, and national highways with direct connectivity to Mumbai, Pune, and Delhi.') ?></p>
              </div>
            </div>
          </div>

          <!-- Tourism Spotlight -->
          <div class="card reveal-up delay-1" style="padding: 1.5rem;">
            <h3 class="font-display font-bold" style="font-size: 0.875rem; color: var(--color-text-heading); margin-bottom: 0.75rem;">
              Chhatrapati Sambhajinagar Tourism &amp; Heritage
            </h3>
            <p style="font-size: 0.75rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 0.75rem;">
              World-renowned for the UNESCO World Heritage Sites of Ajanta and Ellora Caves, Bibi Ka Maqbara, and rich cultural heritage.
            </p>
            <div style="border-radius: 1rem; overflow: hidden; aspect-ratio: 16/9; border: 1px solid var(--color-border);">
              <img src="https://images.unsplash.com/photo-1590050752117-238cb0fb12b1?w=400&h=200&fit=crop&auto=format" alt="Ajanta & Ellora Caves" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

</main>
