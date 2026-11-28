<?php
/**
 * Conference Tracks Component — Wide Editorial Layout
 */
$conferenceData = $conferenceData ?? require __DIR__ . '/../../config/conference_data.php';
$tracks = array_slice($conferenceData['tracks'] ?? [], 0, 6);
?>
<section id="tracks" class="section-light sankalp-tracks" style="padding-top: 6rem; padding-bottom: 6rem; scroll-margin-top: 5rem; overflow: hidden;">
  <div class="container">

    <!-- Section Heading -->
    <div class="reveal-up tracks-section-header">
      <span class="tracks-eyebrow font-mono">Technical Program &bull; Six Official Tracks</span>
      <h2 class="font-display font-bold uppercase tracking-tight text-3xl md:text-4xl tracks-heading">
        Conference Tracks
      </h2>
      <div class="tracks-heading-rule" aria-hidden="true"></div>
    </div>

    <!-- Wide, Spaced-Out Tracks List -->
    <div class="tracks-list-wide reveal-up delay-1" role="region" aria-label="ICAIESF 2027 Six Official Conference Tracks">
      <?php foreach ($tracks as $i => $track): ?>
        <?php
        $paddedNum = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
        $modalLabel = json_encode(
          $track['trackNum'] . ': ' . $track['title'],
          JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
        );
        $topicCount = count($track['topics'] ?? []);
        ?>
        <article class="track-row">
          <div class="track-row-index" aria-hidden="true">
            <span class="track-numeral font-display"><?= e($paddedNum) ?></span>
            <span class="track-index-rule"></span>
          </div>

          <div class="track-row-body">
            <div class="track-row-header">
              <div>
                <div class="track-row-meta font-mono">
                  <span class="track-badge"><?= e($track['trackNum']) ?></span>
                  <span class="track-meta-sep" aria-hidden="true">&middot;</span>
                  <span class="track-subcount"><?= (int)$topicCount ?> Sub-themes</span>
                </div>
                <h3 class="track-row-title font-display">
                  <?= e($track['title']) ?>
                </h3>
              </div>

              <button
                type="button"
                onclick="openSubmissionModal(<?= (int)($i + 1) ?>, <?= e($modalLabel) ?>)"
                class="track-cta-btn">
                <span>Track Submission Info</span>
                <?= render_icon('arrow-right') ?>
              </button>
            </div>

            <?php if (!empty($track['topics'])): ?>
              <ul class="track-topics-list">
                <?php foreach ($track['topics'] as $topic): ?>
                  <li><?= e($topic) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Bottom Abstract Submission CTA -->
    <div class="reveal-up tracks-bottom-cta" style="text-align: center;">
      <button type="button" onclick="goToSection('abstract-submission', 'abstract-submission', 'Abstract Submission')" class="btn-primary" style="padding: 1rem 2rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
        View Abstract Submission &amp; Guidelines <?= render_icon('arrow-right') ?>
      </button>
    </div>

  </div>
</section>
