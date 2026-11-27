<?php
/**
 * Industry Exhibition & Technology Showcase Component (PC 2 Enhancement)
 * Static presentation of exhibition showcase tracks and mailto expression-of-interest pathway.
 * Note: Facility arrangements, dimensions, and commercial terms are subject to institutional approval.
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$exhibitionDomains = $conferenceData['exhibition_domains'] ?? [];
$contactEmail = $config['contact_email'] ?? 'directorsoet@mgmu.ac.in';
?>
<section id="exhibition" class="section-white sankalp-exhibition" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3.5rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Technology Showcase &amp; Industry Expo</p>
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Industry Exhibition
      </h2>
      <div style="margin: 0.5rem auto 1rem auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 48rem; margin: 0 auto; line-height: 1.6;">
        Organizations, technology enterprises, startups, and research institutions are invited to express interest in showcasing engineering innovations, research prototypes, and applied technologies during ICAIESF 2027.
      </p>
    </div>

    <!-- Exhibition Overview Grid (2 Columns: Narrative & Key Highlights) -->
    <div class="split-grid reveal-up" style="margin-bottom: 3.5rem; align-items: stretch;">

      <!-- Left: Narrative Overview Card -->
      <div class="card" style="padding: 2.25rem; background: var(--color-bg-light); border: 1px solid var(--color-border); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <span class="font-mono uppercase font-bold text-xs" style="font-size: 10px; color: var(--color-primary-600); letter-spacing: 0.08em; display: block; margin-bottom: 0.75rem;">
            Expression of Interest
          </span>
          <h3 class="font-display font-bold text-xl sm:text-2xl" style="font-size: 1.35rem; color: var(--color-text-heading); margin-bottom: 1rem; line-height: 1.3;">
            Showcase Emerging Engineering &amp; Technology Solutions
          </h3>
          <p style="font-size: 0.875rem; line-height: 1.65; color: var(--color-text-body); margin-bottom: 1.25rem;">
            Running alongside the academic conference sessions, the proposed Industry Exhibition is intended to provide an interactive platform for organizations and research groups to present technology demonstrations, hardware prototypes, and industrial applications to attending delegates, researchers, and students.
          </p>
          <p style="font-size: 0.8125rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 1rem;">
            Participation is structured around key thematic domains including electric vehicle systems, Industry 5.0 automation, sustainable materials, and applied artificial intelligence.
          </p>
        </div>

        <div style="padding: 1rem; border-radius: 0.75rem; background: #ffffff; border: 1px solid var(--color-border); font-size: 0.75rem; color: var(--color-text-body); display: flex; align-items: flex-start; gap: 0.75rem;">
          <span style="font-size: 1.15rem; flex-shrink: 0; line-height: 1;">ℹ️</span>
          <span><strong>Provisional Notice:</strong> Exhibition arrangements, space allocations, and participation details are currently under administrative review and subject to institutional approval by MGM University.</span>
        </div>
      </div>

      <!-- Right: Expression of Interest Pathway -->
      <div class="card" style="padding: 2.25rem; background: #ffffff; border: 1px solid var(--color-border); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <span class="font-mono uppercase font-bold text-xs" style="font-size: 10px; color: var(--color-primary-600); letter-spacing: 0.08em; display: block; margin-bottom: 0.75rem;">
            Participation Pathway
          </span>
          <h3 class="font-display font-bold text-xl sm:text-2xl" style="font-size: 1.35rem; color: var(--color-text-heading); margin-bottom: 1.25rem; line-height: 1.3;">
            Expression of Interest Process
          </h3>

          <div class="exhibition-steps-list">
            <div class="exhibition-step-item">
              <span class="step-num">01</span>
              <div>
                <strong style="color: var(--color-text-heading); font-size: 0.8125rem;">Submit Expression of Interest:</strong>
                <p style="margin: 0.125rem 0 0 0; font-size: 0.75rem; color: var(--color-text-body); line-height: 1.5;">
                  Email organizational background and proposed technology focus to the Conference Secretariat.
                </p>
              </div>
            </div>

            <div class="exhibition-step-item">
              <span class="step-num">02</span>
              <div>
                <strong style="color: var(--color-text-heading); font-size: 0.8125rem;">Thematic &amp; Feasibility Review:</strong>
                <p style="margin: 0.125rem 0 0 0; font-size: 0.75rem; color: var(--color-text-body); line-height: 1.5;">
                  The conference committee reviews proposed demonstration themes for alignment with conference tracks.
                </p>
              </div>
            </div>

            <div class="exhibition-step-item">
              <span class="step-num">03</span>
              <div>
                <strong style="color: var(--color-text-heading); font-size: 0.8125rem;">Official Participation Guidelines:</strong>
                <p style="margin: 0.125rem 0 0 0; font-size: 0.75rem; color: var(--color-text-body); line-height: 1.5;">
                  Interested organizations will be contacted with official participation details once finalized.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div style="font-size: 0.6875rem; color: var(--color-text-body); font-style: italic; margin-top: 1rem; padding-top: 0.75rem; border-top: 1px solid var(--color-border);">
          * Note: Venue facilities, booth arrangements, and logistics guidelines will be published following official institutional approval.
        </div>
      </div>

    </div>

    <!-- 5 Technology Showcase Domains Grid -->
    <div class="reveal-up" style="margin-bottom: 3.5rem;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
          <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 11px; color: var(--color-primary-700);">
            Showcase Thematic Areas
          </span>
        </div>
        <span class="font-mono text-xs font-bold" style="font-size: 10px; color: var(--color-primary-600); background: rgba(18,124,111,0.08); padding: 0.25rem 0.625rem; border-radius: 9999px;">
          Expression of Interest
        </span>
      </div>

      <div class="exhibition-domains-grid">
        <?php foreach ($exhibitionDomains as $dIdx => $dom):
          $domSubject = rawurlencode('ICAIESF 2027 Exhibition Enquiry: ' . $dom['title']);
          $domBody = rawurlencode(
              "Dear ICAIESF 2027 Exhibition Team,\n\n" .
              "Our organization would like to submit an Expression of Interest for the following thematic area:\n\n" .
              "Thematic Domain: " . $dom['title'] . "\n" .
              "Company / Organization: \n" .
              "Contact Person: \n" .
              "Designation: \n" .
              "Email Address: \n" .
              "Phone: \n" .
              "Brief Description of Proposed Demonstration: \n\n" .
              "Sincerely,\n"
          );
          $domMailto = "mailto:{$contactEmail}?subject={$domSubject}&body={$domBody}";
        ?>
          <div class="exhibition-domain-card">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
              <div style="width: 3rem; height: 3rem; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background: rgba(18, 124, 111, 0.1);">
                <?= e($dom['icon']) ?>
              </div>
              <span class="font-mono text-xs font-bold uppercase" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                Domain <?= $dIdx + 1 ?>
              </span>
            </div>

            <h4 class="font-display font-bold uppercase tracking-tight" style="font-size: 1.0625rem; color: var(--color-text-heading); margin-bottom: 0.5rem; line-height: 1.3;">
              <?= e($dom['title']) ?>
            </h4>

            <p style="font-size: 0.8125rem; line-height: 1.6; color: var(--color-text-body); margin-bottom: 1rem; flex-grow: 1;">
              <?= e($dom['description']) ?>
            </p>

            <div style="border-top: 1px solid var(--color-border); padding-top: 0.75rem; margin-top: auto; margin-bottom: 0.875rem;">
              <span class="font-mono text-xs" style="font-size: 10px; color: var(--color-primary-700); font-weight: 600; display: block; line-height: 1.4;">
                <strong style="color: var(--color-primary-900);">Demonstration Focus:</strong> <?= e($dom['focus']) ?>
              </span>
            </div>

            <a href="<?= e($domMailto) ?>" class="btn-outline-primary"
               style="font-size: 0.6875rem; padding: 0.5rem 0.75rem; justify-content: center; width: 100%; border-radius: 0.5rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em;">
              Express Interest <?= render_icon('arrow-right') ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Central Exhibition Action Card (Static Mailto Pathway) -->
    <div class="reveal-up">
      <div class="card" style="padding: 2.25rem; background: linear-gradient(135deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #ffffff; border-radius: 1.25rem; display: flex; flex-direction: column; gap: 1.5rem; align-items: center; text-align: center;">
        <span class="font-mono uppercase font-bold text-xs" style="font-size: 10px; color: var(--color-accent-amber); letter-spacing: 0.08em;">
          Expression of Interest
        </span>
        <h3 class="font-display font-bold uppercase tracking-tight text-2xl sm:text-3xl" style="font-size: clamp(1.35rem, 2.5vw, 1.875rem); max-width: 40rem; margin: 0; color: #ffffff;">
          Express Interest in the Technology Showcase
        </h3>
        <p style="font-size: 0.875rem; line-height: 1.6; color: rgba(255,255,255,0.8); max-width: 36rem; margin: 0;">
          Organizations seeking to demonstrate technological innovations are invited to submit an Expression of Interest. The Conference Secretariat will communicate approved guidelines and participation details once formalized.
        </p>

        <?php
        $mainExhibSubject = rawurlencode('ICAIESF 2027 Exhibition Enquiry: Expression of Interest');
        $mainExhibBody = rawurlencode(
            "Dear ICAIESF 2027 Exhibition Secretariat,\n\n" .
            "Our organization would like to submit an Expression of Interest regarding the Technology Showcase at ICAIESF 2027.\n\n" .
            "Company / Organization Name: \n" .
            "Contact Person: \n" .
            "Designation: \n" .
            "Email Address: \n" .
            "Contact Number: \n" .
            "Thematic Area of Interest: \n" .
            "Brief Summary of Proposed Innovation / Demonstration: \n\n" .
            "Thank you.\n"
        );
        $mainExhibMailto = "mailto:{$contactEmail}?subject={$mainExhibSubject}&body={$mainExhibBody}";
        ?>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-top: 0.5rem;">
          <a href="<?= e($mainExhibMailto) ?>" class="btn-amber"
             style="padding: 0.875rem 2rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.5rem;">
            <?= render_icon('mail') ?> Submit Expression of Interest <?= render_icon('arrow-right') ?>
          </a>
          <a href="mailto:<?= e($contactEmail) ?>?subject=ICAIESF%202027%20Exhibition%20General%20Query" class="btn-outline-white"
             style="padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.5rem;">
            Contact Exhibition Secretariat
          </a>
        </div>
        <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-family: var(--font-mono);">
          Inquiries: <a href="mailto:<?= e($contactEmail) ?>" style="color: #ffffff; text-decoration: underline;"><?= e($contactEmail) ?></a> | Phone: <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $config['contact_phone'] ?? '')) ?>" style="color: #ffffff; text-decoration: underline;"><?= e($config['contact_phone'] ?? '') ?></a>
        </span>
      </div>
    </div>

  </div>
</section>
