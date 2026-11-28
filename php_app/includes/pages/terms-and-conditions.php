<?php
/**
 * Terms and Conditions, Privacy Policy & Cancellation Policy Page View Template
 * ICAIESF 2027 — School of Engineering and Technology, MGM University
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'terms-and-conditions' ? 'display:block;' : 'display:none;' ?> padding-top: 5rem; min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <!-- Hero Header Banner -->
  <section style="background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-700) 100%); color: #fff; padding-top: 4.5rem; padding-bottom: 4.5rem; text-align: left; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -5rem; top: -5rem; width: 18rem; height: 18rem; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(50px); pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 10;">
      <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.85rem; border-radius: 9999px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); font-family: var(--font-mono); font-size: 11px; text-transform: uppercase; color: var(--color-accent-amber); margin-bottom: 1rem;">
        <span>&#9679;</span> Institutional Policies &amp; Governance
      </div>
      <h1 class="font-display font-bold uppercase reveal-up" style="font-size: clamp(1.85rem, 4vw, 2.75rem); letter-spacing: 0.03em; color: var(--color-accent-amber); margin: 0 0 1rem 0;">
        TERMS &amp; CONDITIONS
      </h1>
      <p class="reveal-up delay-1" style="font-size: 0.9375rem; max-width: 44rem; margin: 0; color: rgba(255, 255, 255, 0.85); line-height: 1.6;">
        Official conference policies, participation terms, privacy governance, and refund/cancellation guidelines for <?= e($config['app_name']) ?>.
      </p>
    </div>
  </section>

  <!-- Policies Content Section -->
  <section class="section-white" style="padding-top: 3.5rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 960px;">
      <div class="reveal-up" style="display: flex; flex-direction: column; gap: 3rem;">

        <!-- 1. Refund / Cancellation Policy -->
        <article id="refund-policy" style="border: 1px solid var(--color-border); border-radius: 1rem; padding: 2rem 2.25rem; background: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.5rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.35rem; color: #111827; margin: 0;">
              1. Refund and Cancellation Policy
            </h2>
          </div>
          <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-body);">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 8px; background: #fffbeb; border: 1px solid #fef3c7; color: #92400e; font-size: 0.875rem; font-weight: 500; margin-bottom: 1rem;">
              <span>&#9432;</span>
              <span>Detailed refund and cancellation terms will be published shortly upon final administrative review.</span>
            </div>
            <p style="margin: 0;">
              The detailed refund and cancellation policy schedule for conference registration fees is currently under institutional review and will be formally published prior to the opening of the delegate registration portal.
            </p>
          </div>
        </article>

        <!-- 2. Terms and Conditions -->
        <article id="terms-conditions" style="border: 1px solid var(--color-border); border-radius: 1rem; padding: 2rem 2.25rem; background: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.5rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.35rem; color: #111827; margin: 0;">
              2. Terms and Conditions
            </h2>
          </div>
          <div style="font-size: 0.95rem; line-height: 1.75; color: var(--color-text-body); display: flex; flex-direction: column; gap: 1rem;">
            <p style="margin: 0;">
              By registering for ICAIESF, participants agree to uphold the highest standards of scientific integrity, academic ethics, and professional conduct throughout the conference. Participation is open to faculty members, researchers, academicians, students, and industry professionals. Any submission of fraudulent credentials or misleading information may result in disqualification.
            </p>
            <p style="margin: 0;">
              All submitted research work must be original and must not violate the intellectual property rights of others. Authors may be required to submit a similarity report generated through Turnitin or an equivalent plagiarism-detection tool, in accordance with the conference submission guidelines.
            </p>
            <p style="margin: 0;">
              All participants are expected to maintain a respectful, inclusive, and professional environment throughout the event. Any form of harassment, misconduct, or disruptive behaviour may result in the immediate revocation of conference access without a refund.
            </p>
            <p style="margin: 0;">
              The Organizing Committee of ICAIESF reserves the right to modify the conference programme, session schedules, speakers, or other event arrangements in response to unforeseen academic, administrative, or logistical circumstances. Any significant changes will be communicated to registered participants through official communication channels.
            </p>
          </div>
        </article>

        <!-- 3. Privacy Policy -->
        <article id="privacy-policy" style="border: 1px solid var(--color-border); border-radius: 1rem; padding: 2rem 2.25rem; background: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.5rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.35rem; color: #111827; margin: 0;">
              3. Privacy Policy
            </h2>
          </div>
          <div style="font-size: 0.95rem; line-height: 1.75; color: var(--color-text-body); display: flex; flex-direction: column; gap: 1rem;">
            <p style="margin: 0;">
              The School of Engineering and Technology (SOET), MGM University, is committed to protecting the privacy and security of personal and professional information collected through the ICAIESF conference website and registration process.
            </p>
            <p style="margin: 0;">
              To facilitate a smooth conference experience, we collect only the information necessary for conference administration, including participants' names, institutional affiliations, contact details, professional designations, and research-related information.
            </p>
            <p style="margin: 0;">
              The collected information will be used exclusively for purposes such as processing registrations, managing conference participation, communicating important event-related updates, issuing certificates, and coordinating conference activities.
            </p>
            <p style="margin: 0;">
              SOET, MGM University, does not sell, rent, or commercially distribute participants' personal information to third parties. Where information sharing is necessary for legitimate conference-related activities, such as publication of conference proceedings or coordination with authorized service providers, appropriate measures will be taken to protect participants' information.
            </p>
            <p style="margin: 0;">
              Furthermore, certain conference sessions, presentations, and activities may be photographed, recorded, or documented for academic, archival, reporting, or promotional purposes. Such materials may be used in official conference publications, websites, and institutional communication channels.
            </p>
          </div>
        </article>

        <!-- Navigation Action Buttons -->
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; padding-top: 1rem;">
          <a href="index.php?page=abstract-submission" class="btn-amber" style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
            Abstract Submission <?= render_icon('arrow-right') ?>
          </a>
          <a href="index.php?page=home" class="btn-outline-primary" style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border-radius: 9999px; display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid var(--color-primary-700); color: var(--color-primary-700);">
            Back to Home <?= render_icon('arrow-right') ?>
          </a>
        </div>

      </div>
    </div>
  </section>

</main>
