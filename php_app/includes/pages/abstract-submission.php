<?php
/**
 * Abstract Submission Page View Template
 * ICAIESF 2027 — Abstract & Paper Submission Guidelines
 */
$config = $config ?? require __DIR__ . '/../../config/app.php';
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';

$paperDeadline = 'January 15, 2027';
if (!empty($conferenceData['dates'])) {
    foreach ($conferenceData['dates'] as $d) {
        if ($d['label'] === 'Paper Submission Deadline') {
            $paperDeadline = $d['date'];
            break;
        }
    }
}
?>
<main id="main-content" tabindex="-1" class="page-view" style="<?= ($currentPage ?? 'home') === 'abstract-submission' ? 'display:block;' : 'display:none;' ?> min-height: 80vh; outline:none; scroll-margin-top: 5.5rem;">

  <?php require __DIR__ . '/../sections/hero.php'; ?>

  <?php require __DIR__ . '/../sections/cfp-fees.php'; ?>

  <!-- Registration Information & Accommodation -->
  <section class="section-white" style="padding-top: 1.5rem; padding-bottom: 2.5rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
          <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
            Registration Information
          </h2>
        </div>

        <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 0.875rem;">
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">
              Registration fees for delegates from SAARC countries include the registration kit and food. Accommodation options can be shared upon request.
            </span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">
              Registration fees for delegates from non-SAARC countries include the registration kit, food, and accommodation.
            </span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">
              Presenting authors must register and pay the applicable fees as communicated by the conference organizers, within the prescribed deadline.
            </span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
              <?= render_icon('check') ?>
            </span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">
              All co-authors attending the conference in person must individually register and pay the applicable registration fee.
            </span>
          </li>
        </ul>

        <div style="padding-top: 0.25rem;">
          <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: #111827; margin: 0 0 0.35rem 0;">
            Accommodation
          </h3>
          <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0;">
            Accommodation is included for non-SAARC delegates; accommodation options for SAARC delegates can be shared upon request.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Proposed Conference Tracks -->
  <section class="section-white" style="padding-top: 2rem; padding-bottom: 3.5rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
          <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
            Proposed Conference Tracks
          </h2>
        </div>

        <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0 0 1.25rem 0;">
          The conference welcomes original research contributions in the following areas:
        </p>

        <ol style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 0.9rem;">
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">1</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Sustainable Automotive Mobility, Electric Vehicles and Intelligent Transportation Systems</span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">2</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Intelligent Sustainable Manufacturing and Industry 5.0</span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">3</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Smart and Sustainable Materials, Infrastructure and Advanced Engineering Systems</span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">4</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Sustainable Energy Systems, Thermal Engineering and Renewable Energy Integration</span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">5</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Artificial Intelligence and Digital Technologies for Intelligent Engineering</span>
          </li>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">6</span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Environmental Sustainability, Climate Resilience and Circular Economy</span>
          </li>
        </ol>

        <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0 0 1.75rem 0;">
          Researchers are encouraged to submit original contributions addressing contemporary challenges and innovative solutions within these themes.
        </p>

        <button type="button" onclick="goToSection('tracks', 'home', 'Tracks')" class="btn-primary"
          style="padding: 0.875rem 1.75rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
          View Tracks <?= render_icon('arrow-right') ?>
        </button>
      </div>
    </div>
  </section>

  <!-- Abstract Submission Guidelines, Procedure & Publication Opportunities -->
  <section class="section-white" style="padding-top: 1.5rem; padding-bottom: 3.5rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left; display: flex; flex-direction: column; gap: 3rem;">

        <!-- 1. Abstract Submission Guidelines -->
        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
              Abstract Submission Guidelines
            </h2>
          </div>

          <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0 0 1.5rem 0;">
            Initial submissions must be made through the Microsoft CMT Portal. Authors are required to submit the following three components:
          </p>

          <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Component 1 -->
            <div style="display: flex; align-items: flex-start; gap: 0.875rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.15rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">1</span>
              <div>
                <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: #111827; margin: 0 0 0.4rem 0;">Text Abstract</h3>
                <ul style="margin: 0; padding-left: 1.25rem; font-size: 1rem; line-height: 1.65; color: #111827; display: flex; flex-direction: column; gap: 0.25rem;">
                  <li>Enter or paste the abstract directly into the Microsoft CMT submission form.</li>
                  <li>Maximum length: 2,000 characters, including spaces.</li>
                </ul>
              </div>
            </div>

            <!-- Component 2 -->
            <div style="display: flex; align-items: flex-start; gap: 0.875rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.15rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">2</span>
              <div>
                <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: #111827; margin: 0 0 0.4rem 0;">Graphical Abstract</h3>
                <ul style="margin: 0 0 0.6rem 0; padding-left: 1.25rem; font-size: 1rem; line-height: 1.65; color: #111827; display: flex; flex-direction: column; gap: 0.25rem;">
                  <li>Orientation: Landscape</li>
                  <li>Length: Exactly one page</li>
                  <li>Format: PDF only</li>
                  <li>Maximum file size: 1 MB</li>
                </ul>
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 0.75rem; font-size: 0.9375rem; font-weight: 600;">
                  <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" style="color: var(--color-primary-700); text-decoration: underline; text-underline-offset: 3px;">
                    Download Graphical Abstract Template
                  </button>
                  <span style="color: #6B7280;">|</span>
                  <button type="button" onclick="openSubmissionModal()" style="color: var(--color-primary-700); text-decoration: underline; text-underline-offset: 3px;">
                    View Sample
                  </button>
                </div>
              </div>
            </div>

            <!-- Component 3 -->
            <div style="display: flex; align-items: flex-start; gap: 0.875rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.15rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">3</span>
              <div>
                <h3 class="font-display font-bold" style="font-size: 1.0625rem; color: #111827; margin: 0 0 0.4rem 0;">Research Highlights</h3>
                <ul style="margin: 0; padding-left: 1.25rem; font-size: 1rem; line-height: 1.65; color: #111827; display: flex; flex-direction: column; gap: 0.25rem;">
                  <li>Provide exactly four bullet points summarizing the core findings.</li>
                  <li>Maximum length: 85 characters per bullet point, including spaces.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Submission Procedure -->
        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
              Submission Procedure
            </h2>
          </div>

          <ol style="list-style: none; padding: 0; margin: 0 0 1.25rem 0; display: flex; flex-direction: column; gap: 0.875rem;">
            <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">1</span>
              <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Log in to or register on the Microsoft CMT Portal.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">2</span>
              <span style="font-size: 1rem; line-height: 1.65; color: #111827;">In the &ldquo;Type to Filter&rdquo; field, enter &ldquo;ICAIESF 2027&rdquo;.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">3</span>
              <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Select the conference and proceed with &ldquo;Create New Submission&rdquo;.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;">4</span>
              <span style="font-size: 1rem; line-height: 1.65; color: #111827;">Submit the text abstract, graphical abstract, and research highlights as per the guidelines.</span>
            </li>
          </ol>

          <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0;">
            Please ensure that all submission components comply with the prescribed requirements before submitting your work.
          </p>
        </div>

        <!-- 3. Publication Opportunities -->
        <div>
          <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
            <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
              Publication Opportunities
            </h2>
          </div>

          <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 1rem; line-height: 1.65; color: #111827;">
            <p style="margin: 0;">
              An abstract booklet will be published featuring all accepted abstracts presented at the conference.
            </p>
            <p style="margin: 0;">
              Participating authors will also have the opportunity to submit their full-length articles directly to special issues of selected journals, subject to the respective journal&rsquo;s peer-review and publication policies.
            </p>
            <p style="margin: 0;">
              The following journal has been identified for the publication opportunity:
            </p>
            <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
              <span style="width: 1.375rem; height: 1.375rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.2rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700);">
                <?= render_icon('check') ?>
              </span>
              <span style="font-weight: 600; color: #111827;">
                <a href="https://www.tandfonline.com/journals/uhvc21" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary-700); text-decoration: underline; text-underline-offset: 3px;">Science and Technology for the Built Environment</a> &ndash; Taylor &amp; Francis
              </span>
            </div>
            <p style="margin: 0;">
              Additional journal details will be announced through the conference website.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Abstract Submission Content -->
  <section class="section-light" style="padding-top: 2.5rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 52rem;">
      <div class="reveal-up" style="border-radius: 1rem; padding: 2.5rem; display: flex; flex-direction: column; gap: 1.5rem; position: relative; overflow: hidden; background: linear-gradient(150deg, var(--color-primary-700) 0%, var(--color-primary-900) 100%); color: #ffffff; box-shadow: 0 12px 32px rgba(10, 74, 71, 0.14);">
        <div style="position: absolute; right: -2rem; bottom: -2rem; width: 12rem; height: 12rem; border-radius: 50%; opacity: 0.1; background: #ffffff; filter: blur(40px); pointer-events: none;"></div>

        <div style="position: relative; z-index: 10;">
          <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.25); font-size: 10px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 1rem; color: rgba(255,255,255,0.85);">
            Paper Submission Deadline: <?= e($paperDeadline) ?>
          </div>
          <h2 class="font-display font-bold uppercase tracking-wide" style="font-size: 1.5rem; margin-bottom: 0.75rem; color: #ffffff;">
            Submit Your Abstract
          </h2>
          <p style="font-size: 0.9375rem; line-height: 1.65; color: rgba(255,255,255,0.88); margin: 0;">
            We invite original research papers, case studies, and comprehensive review papers addressing one of the seven official conference tracks in intelligent engineering and sustainable systems. All submitted manuscripts will undergo a rigorous peer-review evaluation, with accepted and presented papers intended for publication in peer-reviewed conference proceedings, subject to formal publisher agreements and institutional approval.
          </p>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; position: relative; z-index: 10;">
          <button type="button" onclick="openSubmissionModal()" class="btn-amber"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            Submission Guidelines <?= render_icon('arrow-right') ?>
          </button>

          <button type="button" onclick="downloadFile('Paper_Guidelines.pdf')" class="btn-outline-white"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center;">
            <?= render_icon('download') ?> Author Guidelines (PDF)
          </button>

          <a href="index.php?page=home" class="btn-outline-white"
            style="padding: 0.875rem 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; justify-content: center; text-decoration: none;">
            Back to Home <?= render_icon('arrow-right') ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
