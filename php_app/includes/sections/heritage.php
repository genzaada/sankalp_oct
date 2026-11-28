<?php
/**
 * Heritage Showcase & Interactive Image Carousel Component
 * Historical Monuments & Cultural Identity of Chhatrapati Sambhajinagar (Aurangabad)
 * 
 * Technology: Semantic HTML5, Native CSS3, Vanilla JS (ES6+), Accessible WAI-ARIA
 */

$heritageSites = [
    [
        'id'          => 'ajanta-caves',
        'title'       => 'Ajanta Caves',
        'subtitle'    => 'UNESCO World Heritage Site',
        'era'         => '2nd Century BCE – 5th Century CE',
        'location'    => 'Aurangabad District, Maharashtra',
        'distance'    => '100 km from University Campus',
        'badge'       => 'UNESCO World Heritage',
        'image'       => 'assets/images/Heritage%20sites/Ajanta%20caves.jpg',
        'alt'         => 'Ajanta Caves - Ancient Buddhist Rock-Cut Cave Monuments in Aurangabad',
        'caption'     => 'Thirty rock-cut Buddhist cave monuments carved into a dramatic horseshoe cliff, celebrated globally for masterpieces of ancient religious art, monumental sculptures, and expressive murals.',
        'details'     => 'Dating back to the 2nd century BCE, the Ajanta Caves represent the pinnacle of ancient Indian rock-cut architecture. The site features intricate Buddhist sanctuaries (chaityas) and monastic halls (viharas) adorned with globally acclaimed tempera paintings and fresco masterpieces depicting the Jataka tales.'
    ],
    [
        'id'          => 'ellora-caves',
        'title'       => 'Ellora Caves & Kailasa Temple',
        'subtitle'    => 'UNESCO World Heritage Site',
        'era'         => '6th – 10th Century CE',
        'location'    => 'Verul, Aurangabad District, Maharashtra',
        'distance'    => '30 km from University Campus',
        'badge'       => 'World’s Largest Monolithic Excavation',
        'image'       => 'assets/images/Heritage%20sites/Ellora%20Caves.jpg',
        'alt'         => 'Ellora Caves - Kailasa Temple Monolithic Rock Architecture in Maharashtra',
        'caption'     => 'A monumental complex of 34 multi-faith rock-cut caves, crowned by the legendary Kailasa Temple (Cave 16)—the world’s largest monolithic structure carved out of a single volcanic basalt cliff face.',
        'details'     => 'Representing harmonious coexistence between Buddhist, Hindu, and Jain traditions, Ellora stands as an extraordinary engineering triumph of the Rashtrakuta and Yadava dynasties. Kailasa Temple was excavated entirely top-down from living bedrock with unparalleled precision and artistry.'
    ],
    [
        'id'          => 'bibi-ka-maqbara',
        'title'       => 'Bibi Ka Maqbara',
        'subtitle'    => 'The "Taj of the Deccan"',
        'era'         => '1668 – 1669 CE',
        'location'    => 'Aurangabad City, Maharashtra',
        'distance'    => '6 km from University Campus',
        'badge'       => 'Mughal Architecture Landmark',
        'image'       => 'assets/images/Heritage%20sites/Bibi%20ka%20maqbara.jpg',
        'alt'         => 'Bibi Ka Maqbara - Historical Mughal Mausoleum in Aurangabad',
        'caption'     => 'An exquisite 17th-century Mughal mausoleum commissioned in memory of Dilras Banu Begum, featuring pristine marble domes, delicate jali latticework, and axial Charbagh water gardens.',
        'details'     => 'Designed by architect Ata-ullah and engineer Hanspat Rai, Bibi Ka Maqbara evokes the grandeur of the Agra Taj Mahal against the scenic backdrop of the surrounding hills, featuring four soaring minarets, polished stucco plaster, and serene reflecting fountains.'
    ],
    [
        'id'          => 'daulatabad-fort',
        'title'       => 'Daulatabad (Devagiri) Fort',
        'subtitle'    => 'Impenetrable Medieval Hill Citadel',
        'era'         => '12th Century CE',
        'location'    => 'Daulatabad, Aurangabad District, Maharashtra',
        'distance'    => '15 km from University Campus',
        'badge'       => 'Strategic Medieval Fortress',
        'image'       => 'assets/images/Heritage%20sites/Daulatabad%20fort.jpg',
        'alt'         => 'Daulatabad Fort - Ancient Hill Citadel and Military Architecture',
        'caption'     => 'A formidable triangular hill citadel rising 200 meters above the Deccan plateau, acclaimed for its multi-layered defensive engineering, deep rock-cut moat, and subterranean defense maze.',
        'details'     => 'Originally founded as Devagiri by the Yadava dynasty and later capital of the Tughlaq Empire, Daulatabad is celebrated as one of the most impregnable fortresses of medieval India, incorporating a complex subterranean dark labyrinth (Andhari) and the soaring Chand Minar minaret.'
    ],
];
?>

<section id="heritage" class="heritage-showcase" aria-labelledby="heritage-heading">
  <div class="heritage-ambient-glow" aria-hidden="true"></div>

  <div class="container heritage-container">
    
    <!-- Section Header -->
    <div class="heritage-header">
      <div class="heritage-eyebrow-wrap">
        <span class="heritage-eyebrow-bar"></span>
        <span class="heritage-eyebrow font-mono">EXPLORE THE HERITAGE</span>
      </div>
      
      <div class="heritage-title-row">
        <div>
          <h2 id="heritage-heading" class="heritage-title font-display">
            Beyond the Conference. Into History.
          </h2>
          <p class="heritage-lead">
            Discover the architectural wonders, cultural landmarks, and timeless heritage of Chhatrapati Sambhajinagar.
          </p>
        </div>

        <!-- Desktop Carousel Navigation Buttons -->
        <div class="heritage-nav-actions" aria-label="Heritage Carousel Controls">
          <button type="button" class="heritage-nav-btn heritage-prev-btn" aria-label="Previous Heritage Site" title="Previous destination">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 18l-6-6 6-6"/>
            </svg>
          </button>
          <button type="button" class="heritage-nav-btn heritage-next-btn" aria-label="Next Heritage Site" title="Next destination">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 18l6-6-6-6"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Carousel Viewport & Slider Track -->
    <div class="heritage-carousel-wrapper" tabindex="0" role="region" aria-roledescription="carousel" aria-label="Historical Heritage Monuments Showcase">
      <div class="heritage-slider-track" id="heritage-slider-track">
        <?php foreach ($heritageSites as $idx => $site): 
          $numStr = sprintf('%02d', $idx + 1);
          $totalStr = sprintf('%02d', count($heritageSites));
        ?>
          <div class="heritage-slide <?= $idx === 0 ? 'is-active' : '' ?>"
               data-index="<?= $idx ?>"
               data-title="<?= e($site['title']) ?>"
               data-subtitle="<?= e($site['subtitle']) ?>"
               data-era="<?= e($site['era']) ?>"
               data-location="<?= e($site['location']) ?>"
               data-badge="<?= e($site['badge']) ?>"
               data-image="<?= asset_url($site['image']) ?>"
               data-caption="<?= e($site['caption']) ?>"
               data-details="<?= e($site['details']) ?>"
               role="group"
               aria-roledescription="slide"
               aria-label="<?= e($numStr . ' of ' . $totalStr . ': ' . $site['title']) ?>">
            
            <div class="heritage-card" onclick="openHeritageLightbox(<?= $idx ?>)" role="button" tabindex="0" aria-label="View <?= e($site['title']) ?> in fullscreen lightbox">
              <div class="heritage-image-frame">
                <img src="<?= asset_url($site['image']) ?>"
                     alt="<?= e($site['alt']) ?>"
                     class="heritage-card-img"
                     loading="lazy">
                <div class="heritage-overlay"></div>
              </div>

              <!-- Top Floating Meta Header -->
              <div class="heritage-card-top">
                <span class="heritage-number font-mono"><?= $numStr ?> / <?= $totalStr ?></span>
                <span class="heritage-badge font-mono"><?= e($site['badge']) ?></span>
                <button type="button" class="heritage-expand-btn" aria-label="Open Fullscreen View" title="Expand photograph">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
                  </svg>
                </button>
              </div>

              <!-- Bottom Content Overlay -->
              <div class="heritage-card-bottom">
                <div class="heritage-location-tag font-mono">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                  </svg>
                  <span><?= e($site['location']) ?> &bull; <?= e($site['era']) ?></span>
                </div>
                <h3 class="heritage-card-title font-display"><?= e($site['title']) ?></h3>
                <p class="heritage-card-caption"><?= e($site['caption']) ?></p>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Carousel Footer Bar: Progress Counter & Mobile Arrows -->
    <div class="heritage-footer-bar">
      <!-- Live Counter / Destination Progress Indicator -->
      <div class="heritage-progress-status font-mono">
        <span id="heritage-current-idx">01</span>
        <span class="heritage-divider">/</span>
        <span><?= sprintf('%02d', count($heritageSites)) ?></span>
        <span class="heritage-status-desc">Historical Landmarks</span>
      </div>

      <!-- Mobile Navigation Buttons -->
      <div class="heritage-mobile-nav">
        <button type="button" class="heritage-nav-btn heritage-prev-btn" aria-label="Previous Site">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 18l-6-6 6-6"/>
          </svg>
        </button>
        <button type="button" class="heritage-nav-btn heritage-next-btn" aria-label="Next Site">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18l6-6-6-6"/>
          </svg>
        </button>
      </div>
    </div>

  </div>
</section>

<!-- Fullscreen Editorial Lightbox Modal -->
<div id="heritage-lightbox" class="heritage-lightbox" role="dialog" aria-modal="true" aria-label="Heritage Photo Lightbox" aria-hidden="true">
  <div class="heritage-lightbox-backdrop" onclick="closeHeritageLightbox()"></div>

  <div class="heritage-lightbox-dialog">
    <!-- Close Button -->
    <button type="button" class="heritage-lightbox-close" onclick="closeHeritageLightbox()" aria-label="Close Lightbox" title="Close (Esc)">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>

    <!-- Navigation Arrows -->
    <button type="button" class="heritage-lightbox-nav heritage-lightbox-prev" onclick="stepHeritageLightbox(-1)" aria-label="Previous Photograph" title="Previous (Left arrow)">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 18l-6-6 6-6"/>
      </svg>
    </button>

    <button type="button" class="heritage-lightbox-nav heritage-lightbox-next" onclick="stepHeritageLightbox(1)" aria-label="Next Photograph" title="Next (Right arrow)">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 18l6-6-6-6"/>
      </svg>
    </button>

    <!-- Lightbox Main Stage -->
    <div class="heritage-lightbox-content">
      <div class="heritage-lightbox-img-wrap">
        <img id="heritage-lightbox-img" src="" alt="" class="heritage-lightbox-img">
      </div>

      <div class="heritage-lightbox-sidebar">
        <div class="heritage-lightbox-meta">
          <span id="heritage-lightbox-badge" class="heritage-badge font-mono"></span>
          <span id="heritage-lightbox-counter" class="heritage-number font-mono"></span>
        </div>
        
        <h3 id="heritage-lightbox-title" class="heritage-lightbox-title font-display"></h3>
        
        <div class="heritage-lightbox-loc font-mono">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
          </svg>
          <span id="heritage-lightbox-location"></span>
        </div>

        <p id="heritage-lightbox-desc" class="heritage-lightbox-desc"></p>
        
        <div class="heritage-lightbox-footer font-mono">
          <span>School of Engineering and Technology &bull; MGM University</span>
        </div>
      </div>
    </div>
  </div>
</div>
