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

  <!-- Important Dates Landscape Section -->
  <section id="important-dates-schedule" class="section-light" style="padding-top: 3rem; padding-bottom: 0.5rem; scroll-margin-top: 5rem;">
    <div class="container">
      <div class="reveal-up">
        
        <!-- Header with Pill -->
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.75rem;">
          <div style="display: flex; align-items: center; gap: 0.75rem;">
            <div style="width: 4px; height: 1.5rem; border-radius: 9999px; background: var(--color-primary-700);"></div>
            <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0; letter-spacing: 0.02em;">
              Important Dates
            </h2>
          </div>
          <span class="font-mono uppercase font-bold" style="font-size: 10px; color: #047857; background: #ecfdf5; border: 1px solid #a7f3d0; padding: 0.35rem 0.85rem; border-radius: 9999px; letter-spacing: 0.05em;">
            Official Schedule
          </span>
        </div>

        <!-- Landscape Dates Table Card -->
        <div class="card" style="padding: 1.5rem; background: #ffffff; border: 1px solid var(--color-border); border-radius: 1rem; box-shadow: 0 4px 16px rgba(0,0,0,0.03); overflow: hidden;">
          
          <!-- Desktop / Tablet Horizontal Table -->
          <div class="hidden sm:block" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
              <thead>
                <tr style="border-bottom: 2px solid var(--color-border); text-align: left;">
                  <th style="padding: 0.875rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-primary-700); font-family: var(--font-mono);">
                    Conference Milestone
                  </th>
                  <th style="padding: 0.875rem 1rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-primary-700); font-family: var(--font-mono); width: 220px; text-align: right;">
                    Official Date
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($conferenceData['dates'])): ?>
                  <?php foreach ($conferenceData['dates'] as $idx => $d): ?>
                    <?php
                    $isDeadline = ($d['type'] ?? '') === 'deadline';
                    $isEvent = ($d['type'] ?? '') === 'event';
                    $rowBg = $isDeadline 
                      ? 'background: #fff1f2;' 
                      : ($isEvent ? 'background: rgba(18,124,111,0.05);' : ($idx % 2 === 1 ? 'background: var(--color-bg-light);' : 'background: #ffffff;'));
                    $titleColor = $isDeadline ? '#be123c;' : '#111827;';
                    ?>
                    <tr style="<?= $rowBg ?> border-bottom: 1px solid var(--color-border); transition: background 0.15s;">
                      <td style="padding: 1rem; border-top: 1px solid var(--color-border);">
                        <div style="display: flex; align-items: center; gap: 0.625rem;">
                          <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: <?= $isDeadline ? '#be123c' : ($isEvent ? 'var(--color-primary-700)' : 'var(--color-accent-amber)') ?>;"></span>
                          <span style="font-size: 0.9375rem; font-weight: 700; color: <?= $titleColor ?>">
                            <?= e($d['label']) ?>
                          </span>
                        </div>
                      </td>
                      <td style="padding: 1rem; text-align: right; border-top: 1px solid var(--color-border); white-space: nowrap;">
                        <span class="font-mono font-bold" style="font-size: 0.9375rem; color: var(--color-primary-700); background: #ffffff; border: 1px solid var(--color-border); padding: 0.35rem 0.75rem; border-radius: 0.5rem; display: inline-block;">
                          <?= e($d['date']) ?>
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <!-- Mobile Cards Layout (Stacked gracefully on narrow viewports) -->
          <div class="sm:hidden" style="display: flex; flex-direction: column; gap: 0.75rem;">
            <?php if (!empty($conferenceData['dates'])): ?>
              <?php foreach ($conferenceData['dates'] as $d): ?>
                <?php
                $isDeadline = ($d['type'] ?? '') === 'deadline';
                $isEvent = ($d['type'] ?? '') === 'event';
                $cardBg = $isDeadline ? 'background: #fff1f2; border: 1px solid #ffe4e6;' : ($isEvent ? 'background: rgba(18,124,111,0.06); border: 1px solid #ccfbf1;' : 'border: 1px solid var(--color-border); background: var(--color-bg-light);');
                ?>
                <div style="padding: 1rem; border-radius: 0.75rem; <?= $cardBg ?> display: flex; justify-content: space-between; align-items: center; gap: 0.75rem;">
                  <span style="font-size: 0.875rem; font-weight: 700; color: <?= $isDeadline ? '#be123c' : '#111827' ?>;">
                    <?= e($d['label']) ?>
                  </span>
                  <span class="font-mono font-bold" style="font-size: 0.875rem; color: var(--color-primary-700); background: #ffffff; border: 1px solid var(--color-border); padding: 0.25rem 0.625rem; border-radius: 0.5rem; flex-shrink: 0; white-space: nowrap;">
                    <?= e($d['date']) ?>
                  </span>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>

          <!-- Footnote notice -->
          <div style="margin-top: 1.25rem; padding-top: 0.875rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: flex-start;">
            <p style="font-size: 11px; color: var(--color-text-body); margin: 0; line-height: 1.4;">
              * All deadlines are 23:59 IST (Indian Standard Time, UTC+5:30). Authors are advised to complete submissions in advance.
            </p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <?php require __DIR__ . '/../sections/cfp-fees.php'; ?>

  <!-- Registration Information & Accommodation -->
  <section class="section-white" style="padding-top: 3rem; padding-bottom: 3rem;">
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

  <!-- Approved Conference Tracks -->
  <section class="section-light" style="padding-top: 3rem; padding-bottom: 3rem;">
    <div class="container">
      <div class="reveal-up" style="text-align: left;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
          <div style="width: 4px; height: 1.25rem; border-radius: 9999px; background: var(--color-primary-700); flex-shrink: 0;"></div>
          <h2 class="font-display font-bold uppercase" style="font-size: 1.375rem; color: #111827; margin: 0;">
            Conference Research Tracks
          </h2>
        </div>

        <p style="font-size: 1rem; line-height: 1.65; color: #111827; margin: 0 0 1.25rem 0;">
          The conference welcomes original research contributions in the following six approved technical tracks:
        </p>

        <ol style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 0.9rem;">
          <?php foreach (($conferenceData['tracks'] ?? []) as $idx => $track): ?>
          <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <span style="width: 1.625rem; height: 1.625rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem; background: rgba(18, 124, 111, 0.12); color: var(--color-primary-700); font-weight: 700; font-size: 0.875rem;"><?= (int)($idx + 1) ?></span>
            <span style="font-size: 1rem; line-height: 1.65; color: #111827;"><?= e($track['title']) ?></span>
          </li>
          <?php endforeach; ?>
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
  <section class="section-white" style="padding-top: 3rem; padding-bottom: 3.5rem;">
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

</main>
