<?php
/**
 * Conference Overview Component: Scope, Objectives & Host Institution
 */
$conferenceData = require __DIR__ . '/../../config/conference_data.php';
$scopes = $conferenceData['scopes'];
$objectives = $conferenceData['objectives'];
?>
<section id="overview" class="section-light sankalp-overview" style="padding-top: 6rem; padding-bottom: 6rem;">
  <div class="container">

    <!-- Section Header -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Conference Overview</p>
      <h2 class="font-display font-bold text-3xl md:text-4xl leading-tight" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading);">
        About the Conference
      </h2>
      <div style="margin: 0.75rem auto 0 auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
    </div>

    <!-- 1. SANKALP-2027 Scope -->
    <div style="margin-bottom: 3.5rem;">
      <div class="reveal-up" style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
        <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
        <span class="font-mono text-[11px] uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
          SANKALP-2027 Scope
        </span>
      </div>

      <div class="card reveal-up delay-1" style="padding: 2rem 2.5rem;">
        <h3 class="font-display font-bold text-xl sm:text-2xl" style="font-size: 1.35rem; color: var(--color-text-heading); margin-bottom: 1rem;">
          Multidisciplinary Research &amp; Innovation Domains
        </h3>
        <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 1.5rem; max-width: 56rem;">
          SANKALP-2027 provides a multidisciplinary platform covering emerging trends, scientific breakthroughs, and industrial innovations in sustainability-focused engineering and technology domains. The conference welcomes original research contributions, case studies, industrial applications, and innovative practices related to:
        </p>

        <!-- 10 Scopes Grid (2 columns) -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 0.875rem; margin-bottom: 1.5rem;">
          <?php foreach ($scopes as $scope): ?>
            <div style="display: flex; align-items: center; gap: 0.875rem; padding: 0.875rem; border-radius: 0.75rem; border: 1px solid var(--color-border); background: var(--color-bg-light); transition: transform 0.15s;">
              <div style="width: 1.5rem; height: 1.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(18, 124, 111, 0.14); color: var(--color-primary-700);">
                <?= render_icon('check') ?>
              </div>
              <span style="font-size: 0.875rem; font-weight: 500; color: var(--color-text-heading); line-height: 1.4;">
                <?= e($scope) ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Concluding Callout Banner -->
        <div style="padding: 1.25rem; border-radius: 0.75rem; border: 1px solid rgba(18, 124, 111, 0.18); background: rgba(18, 124, 111, 0.05); display: flex; align-items: flex-start; gap: 0.875rem;">
          <div style="width: 1.75rem; height: 1.75rem; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.125rem; background: rgba(18, 124, 111, 0.15); color: var(--color-primary-700);">
            <span style="font-size: 0.875rem;">🌍</span>
          </div>
          <p style="font-size: 0.875rem; line-height: 1.6; color: var(--color-text-body); margin: 0;">
            The conference encourages interdisciplinary contributions that bridge engineering, technology, environmental sciences, data science, policy, and industrial practices to accelerate sustainable development worldwide.
          </p>
        </div>
      </div>
    </div>

    <!-- 2. Conference Objectives -->
    <div class="reveal-up delay-2" style="border-radius: 1rem; padding: 2rem; margin-bottom: 3.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #fff;">
      <div style="position: absolute; right: -3rem; bottom: -3rem; width: 12rem; height: 12rem; border-radius: 50%; pointer-events: none; background: rgba(255,255,255,0.06); filter: blur(40px);"></div>

      <div style="position: relative; z-index: 10;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: rgba(255,255,255,0.4); flex-shrink: 0;"></div>
          <span class="font-mono text-[11px] uppercase tracking-widest font-bold" style="font-size: 11px; color: rgba(255,255,255,0.7);">
            Conference Objectives
          </span>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
          <?php foreach ($objectives as $idx => $obj): ?>
            <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <div style="width: 1.5rem; height: 1.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.125rem; background: rgba(242, 183, 5, 0.18); border: 1px solid rgba(242, 183, 5, 0.35); color: var(--color-accent-amber);">
                <svg style="width: 0.875rem; height: 0.875rem;" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </div>
              <p style="font-size: 0.875rem; line-height: 1.5; color: rgba(255, 255, 255, 0.85); margin: 0;">
                <?= e($obj) ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- 3. About Host Institution Section -->
    <div class="reveal-up delay-3 card" style="overflow: hidden; display: grid; grid-template-columns: 1fr; border-radius: 1rem;">
      <div style="display: grid; grid-template-columns: 1fr; align-items: stretch;">
        <div style="padding: 2rem 2.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-900) 0%, #073533 100%); color: #fff;">
          <div style="position: absolute; left: -2.5rem; top: -2.5rem; width: 10rem; height: 10rem; border-radius: 50%; pointer-events: none; background: rgba(18, 124, 111, 0.2); filter: blur(60px);"></div>

          <div style="position: relative; z-index: 10; display: flex; flex-direction: column; gap: 1rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
              <div style="width: 2.5rem; height: 2.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(255,255,255,0.12); color: #fff;">
                <?= render_icon('building') ?>
              </div>
              <div>
                <span class="font-mono text-[10px] uppercase tracking-widest" style="font-size: 10px; color: rgba(255,255,255,0.5);">Host Institution</span>
                <h3 class="font-display font-bold text-lg leading-tight" style="font-size: 1.15rem; color: #fff; margin: 0;">
                  School of Engineering &amp; Technology<br>
                  <span style="font-size: 0.875rem; font-weight: normal; color: rgba(255,255,255,0.8);">MGM University, Chhatrapati Sambhajinagar</span>
                </h3>
              </div>
            </div>

            <blockquote style="font-style: italic; font-size: 0.875rem; color: rgba(255,255,255,0.7); border-left: 2px solid var(--color-accent-amber); padding-left: 1rem; margin: 0.25rem 0;">
              "In a gentle way, you can shake the world."
            </blockquote>

            <div>
              <h4 style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: rgba(252, 211, 77, 0.9); margin-bottom: 0.25rem;">
                About the Organizing Institution (SOET)
              </h4>
              <p style="font-size: 0.875rem; line-height: 1.6; color: rgba(255,255,255,0.85); margin: 0;">
                The School of Engineering and Technology (SOET), MGM University, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement. The School offers undergraduate and Diploma programs in emerging areas of engineering and technology and actively promotes interdisciplinary research addressing contemporary industrial and societal challenges.
              </p>
            </div>

            <div>
              <h4 style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: rgba(252, 211, 77, 0.9); margin-bottom: 0.25rem;">
                About MGM University
              </h4>
              <p style="font-size: 0.875rem; line-height: 1.6; color: rgba(255,255,255,0.85); margin: 0;">
                MGM University, located in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, is a State Private University established under the MGM University Act, 2019. The University is promoted by the Mahatma Gandhi Mission Trust, a renowned educational organization with a legacy of over four decades in education, healthcare, research, and social development.
              </p>
            </div>

            <div style="border-radius: 0.75rem; padding: 0.75rem 1rem; background: rgba(242, 183, 5, 0.1); border: 1px solid rgba(242, 183, 5, 0.25);">
              <p style="font-size: 0.875rem; line-height: 1.5; color: rgba(255,255,255,0.9); margin: 0;">
                The University emphasizes innovation-driven education, research excellence, entrepreneurship, industry collaboration, and sustainable development. Through its academic ecosystem, modern laboratories, research centers, incubation facilities, and international collaborations, MGM University is committed to contributing towards national priorities and global sustainable development goals.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
