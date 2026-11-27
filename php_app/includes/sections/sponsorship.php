<?php
/**
 * Sponsorship Opportunities & Collaboration Component
 * Static presentation of possible collaboration areas and official enquiry pathway.
 * Note: Numerical contribution amounts and commercial packages are intentionally omitted until institutional approval.
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$collaborationAreas = $conferenceData['sponsorship_collaboration_areas'] ?? [];
$contactEmail = $config['contact_email'] ?? 'directorsoet@mgmu.ac.in';
?>
<section id="sponsorship" class="section-light sankalp-sponsorship" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up text-center" style="text-align: center; margin-bottom: 3rem;">
      <p class="eyebrow" style="margin-bottom: 0.75rem;">Partnership &amp; Collaboration</p>
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl" style="font-size: clamp(1.75rem, 3vw, 2.25rem); color: var(--color-text-heading); margin-bottom: 0.75rem;">
        Sponsorship Opportunities
      </h2>
      <div style="margin: 0.5rem auto 1rem auto; width: 3.5rem; height: 4px; border-radius: 9999px; background: var(--color-primary-500);"></div>
      <p style="font-size: 0.9375rem; color: var(--color-text-body); max-width: 48rem; margin: 0 auto; line-height: 1.6;">
        ICAIESF 2027 welcomes collaboration with industry partners, professional societies, technology organizations, and academic institutions to support research dissemination, innovation dialogues, and engineering education.
      </p>
    </div>

    <!-- Official Advisory Callout -->
    <div class="reveal-up" style="margin-bottom: 2.5rem;">
      <div style="padding: 1.25rem 1.75rem; border-radius: 1rem; border: 1px solid rgba(18, 124, 111, 0.25); border-left: 4px solid var(--color-primary-600); background: #ffffff; display: flex; align-items: flex-start; gap: 1rem; box-shadow: 0 4px 16px rgba(10, 74, 71, 0.05);">
        <div style="width: 2rem; height: 2rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(18, 124, 111, 0.15); color: var(--color-primary-700); font-weight: bold; font-size: 1rem;">
          ℹ
        </div>
        <div style="font-size: 0.8125rem; color: var(--color-text-heading); line-height: 1.6;">
          <strong style="color: var(--color-primary-900);">Institutional Notice:</strong> Formal sponsorship frameworks, tier structures, and contribution guidelines are currently under administrative review and subject to institutional approval by MGM University. The categories below describe qualitative areas of collaboration; organizations interested in exploring partnership opportunities are invited to connect directly with the Conference Secretariat.
        </div>
      </div>
    </div>

    <!-- Collaboration Opportunities Grid (4 Qualitative Areas) -->
    <div class="sponsorship-grid">
      <?php foreach ($collaborationAreas as $idx => $area):
        $encodedSubject = rawurlencode('ICAIESF 2027 Sponsorship Enquiry: ' . $area['title']);
        $encodedBody = rawurlencode(
            "Dear ICAIESF 2027 Conference Secretariat,\n\n" .
            "Our organization would like to express interest in exploring a partnership under the following collaboration area:\n\n" .
            "Collaboration Area: " . $area['title'] . "\n" .
            "Organization Name: \n" .
            "Contact Person: \n" .
            "Designation: \n" .
            "Email Address: \n" .
            "Phone: \n" .
            "Collaboration Objectives / Scope: \n\n" .
            "Sincerely,\n"
        );
        $areaMailto = "mailto:{$contactEmail}?subject={$encodedSubject}&body={$encodedBody}";
      ?>
        <div class="sponsorship-card reveal-up delay-<?= ($idx % 3) + 1 ?>">

          <!-- Card Header -->
          <div class="sponsorship-card-header">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 0.5rem; margin-bottom: 0.75rem;">
              <span style="font-size: 1.75rem; line-height: 1;">
                <?= e($area['icon']) ?>
              </span>
              <span class="font-mono text-xs uppercase font-bold" style="font-size: 9px; padding: 0.2rem 0.5rem; border-radius: 9999px; background: rgba(18, 124, 111, 0.08); color: var(--color-primary-700);">
                Opportunity <?= $idx + 1 ?>
              </span>
            </div>

            <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: var(--color-text-heading); margin-bottom: 0.625rem; line-height: 1.35;">
              <?= e($area['title']) ?>
            </h3>

            <p style="font-size: 0.8125rem; line-height: 1.6; color: var(--color-text-body); margin: 0;">
              <?= e($area['description']) ?>
            </p>
          </div>

          <!-- Possible Engagement Scope -->
          <div class="sponsorship-benefits-wrapper">
            <h4 class="font-mono uppercase tracking-wider font-bold" style="font-size: 10px; color: var(--color-primary-700); margin-bottom: 0.375rem; letter-spacing: 0.05em;">
              Engagement Scope:
            </h4>
            <p style="font-size: 0.75rem; line-height: 1.5; color: var(--color-text-body); margin: 0;">
              <?= e($area['engagement']) ?>
            </p>
          </div>

          <!-- Static Mailto CTA -->
          <div style="margin-top: auto; padding-top: 1rem;">
            <a href="<?= e($areaMailto) ?>" class="btn-outline-primary"
               style="width: 100%; justify-content: center; padding: 0.625rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; display: inline-flex; align-items: center; gap: 0.375rem; border-radius: 0.75rem;">
              Enquire About This Area <?= render_icon('arrow-right') ?>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- General Sponsorship Collaboration Banner -->
    <div class="reveal-up" style="margin-top: 3.5rem;">
      <div class="card" style="padding: 2.25rem; background: linear-gradient(145deg, var(--color-primary-800) 0%, var(--color-primary-950) 100%); color: #ffffff; border-radius: 1.25rem; position: relative; overflow: hidden;">
        <!-- Ambient decorative glow -->
        <div style="position: absolute; right: -3rem; top: -3rem; width: 14rem; height: 14rem; border-radius: 50%; background: rgba(242, 183, 5, 0.12); filter: blur(50px); pointer-events: none;"></div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem; position: relative; z-index: 2;" class="md:flex-row md:items-center md:justify-between">
          <div style="max-width: 44rem;">
            <span class="font-mono uppercase tracking-widest font-bold" style="font-size: 10px; color: var(--color-accent-amber); display: block; margin-bottom: 0.5rem;">
              Institutional &amp; Corporate Dialogue
            </span>
            <h3 class="font-display font-bold uppercase tracking-tight text-xl sm:text-2xl" style="font-size: 1.375rem; margin-bottom: 0.5rem; color: #ffffff;">
              Interested in Partnering with ICAIESF 2027?
            </h3>
            <p style="font-size: 0.8125rem; line-height: 1.6; color: rgba(255,255,255,0.92); margin: 0;">
              The conference steering committee welcomes discussions on academic symposium co-hosting, technical session support, student awards, and institutional collaboration. Please contact the Conference Secretariat to initiate a discussion.
            </p>
          </div>

          <div style="display: flex; flex-direction: column; gap: 0.75rem; flex-shrink: 0;">
            <?php
            $generalSubject = rawurlencode('ICAIESF 2027 Sponsorship Enquiry: General Dialogue');
            $generalBody = rawurlencode(
                "Dear Conference Chair,\n\n" .
                "We represent [Company / Organization] and would like to explore collaboration opportunities for ICAIESF 2027.\n\n" .
                "Representative Name: \n" .
                "Designation: \n" .
                "Email: \n" .
                "Phone: \n" .
                "Proposed Area of Engagement: \n" .
                "Queries / Comments: \n\n" .
                "Thank you.\n"
            );
            $generalMailto = "mailto:{$contactEmail}?subject={$generalSubject}&body={$generalBody}";
            ?>
            <a href="<?= e($generalMailto) ?>" class="btn-amber"
               style="padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; display: inline-flex; align-items: center; gap: 0.375rem;">
              <?= render_icon('mail') ?> Email Conference Secretariat
            </a>
            <span style="font-size: 10px; color: rgba(255,255,255,0.5); text-align: center; font-family: var(--font-mono);">
              Official: <?= e($contactEmail) ?>
            </span>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
