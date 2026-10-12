<!-- Paper / Abstract Submission Modal Component -->
<div id="modal-submission" class="modal-overlay">
  <div class="modal-window">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-submission')" aria-label="Close Submission Dialog">
      <?= render_icon('x') ?>
    </button>

    <div style="margin-bottom: 1.5rem;">
      <span class="eyebrow" style="margin-bottom: 0.25rem;">Call for Papers</span>
      <h3 class="font-display font-bold text-xl" style="color: var(--color-primary-700); font-size: 1.35rem;">
        Submit Research Abstract
      </h3>
      <p style="font-size: 0.8125rem; color: var(--color-text-body); margin-top: 0.25rem;">
        Submit your original research abstract for double-blind peer review. Accepted papers will be published in Scopus Indexed Proceedings.
      </p>
    </div>

    <div id="sub-feedback" class="form-feedback"></div>

    <form id="submission-form">
      <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">

      <div class="form-group">
        <label class="form-label" for="sub-track">Conference Track *</label>
        <select id="sub-track" name="track_id" class="form-select" required>
          <option value="1">Track 1: Sustainable Energy Systems and Decarbonization Technologies</option>
          <option value="2">Track 2: Smart and Sustainable Built Environments</option>
          <option value="3">Track 3: Sustainable Manufacturing and Circular Economy</option>
          <option value="4">Track 4: Artificial Intelligence and Digital Technologies for Sustainability</option>
          <option value="5">Track 5: Climate Change, Environmental Management and Resource Sustainability</option>
          <option value="6">Track 6: Sustainable Transportation and Resilient Infrastructure Systems</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label" for="sub-title">Paper Title *</label>
        <input type="text" id="sub-title" name="paper_title" class="form-input" placeholder="Full title of your manuscript" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label class="form-label" for="sub-author">Primary Author Name *</label>
          <input type="text" id="sub-author" name="author_name" class="form-input" placeholder="e.g. Dr. Rajesh Sharma" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="sub-email">Author Email *</label>
          <input type="email" id="sub-email" name="email" class="form-input" placeholder="author@institution.org" required>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label class="form-label" for="sub-phone">Contact Phone *</label>
          <input type="tel" id="sub-phone" name="phone" class="form-input" placeholder="+91 9123456780" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="sub-affil">Affiliation / University *</label>
          <input type="text" id="sub-affil" name="affiliation" class="form-input" placeholder="Department & Institution" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="sub-abstract">Abstract Text (min 30 characters) *</label>
        <textarea id="sub-abstract" name="abstract_text" class="form-textarea" rows="4" placeholder="Summarize your methodology, key findings, and contributions..." required></textarea>
      </div>

      <div class="form-group">
        <label class="form-label" for="sub-keywords">Keywords *</label>
        <input type="text" id="sub-keywords" name="keywords" class="form-input" placeholder="e.g. Deep Learning, Microgrids, Net-Zero" required>
      </div>

      <div style="margin-top: 1.5rem; display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" class="btn-outline-teal" style="padding: 0.625rem 1.25rem; font-size: 0.8125rem;" onclick="closeModal('modal-submission')">
          Cancel
        </button>
        <button type="submit" class="btn-amber" style="padding: 0.625rem 1.75rem; font-size: 0.8125rem;">
          Submit Abstract <?= render_icon('arrow-right') ?>
        </button>
      </div>
    </form>
  </div>
</div>
