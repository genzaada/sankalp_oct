<!-- Registration Modal Component -->
<div id="modal-registration" class="modal-overlay">
  <div class="modal-window">
    <button type="button" class="modal-close-btn" onclick="closeModal('modal-registration')" aria-label="Close Registration Dialog">
      <?= render_icon('x') ?>
    </button>

    <div style="margin-bottom: 1.5rem;">
      <span class="eyebrow" style="margin-bottom: 0.25rem;">Conference Registration</span>
      <h3 class="font-display font-bold text-xl" style="color: var(--color-primary-700); font-size: 1.35rem;">
        Register for SANKALP 2027
      </h3>
      <p style="font-size: 0.8125rem; color: var(--color-text-body); margin-top: 0.25rem;">
        Fill in your details below to secure your seat. Early bird discounts applied automatically.
      </p>
    </div>

    <div id="reg-feedback" class="form-feedback"></div>

    <form id="registration-form">
      <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">

      <div class="form-group">
        <label class="form-label" for="reg-name">Full Name *</label>
        <input type="text" id="reg-name" name="full_name" class="form-input" placeholder="e.g. Dr. Jane Doe" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label class="form-label" for="reg-email">Email Address *</label>
          <input type="email" id="reg-email" name="email" class="form-input" placeholder="jane.doe@university.edu" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="reg-phone">Phone / WhatsApp *</label>
          <input type="tel" id="reg-phone" name="phone" class="form-input" placeholder="+91 9876543210" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="reg-institution">Institution / University / Company *</label>
        <input type="text" id="reg-institution" name="institution" class="form-input" placeholder="e.g. MGM University" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label class="form-label" for="reg-category">Delegate Category *</label>
          <select id="reg-category" name="category" class="form-select" required>
            <option value="Students">Students (₹1,500)</option>
            <option value="Research Scholars">Research Scholars (₹2,000)</option>
            <option value="Academicians">Academicians (₹2,500)</option>
            <option value="Industry / Others">Industry / Others (₹3,000)</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label" for="reg-type">Registration Phase</label>
          <select id="reg-type" name="registration_type" class="form-select">
            <option value="early_bird">Early Bird (Best Value - Till 15 Nov)</option>
            <option value="regular">Regular (Till 31 Dec)</option>
            <option value="spot">On Spot Registration</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="reg-paper">Paper Submission ID (Optional)</label>
        <input type="text" id="reg-paper" name="paper_id" class="form-input" placeholder="e.g. SANKALP-T1-1024">
        <span class="form-help">If you are an author presenting an accepted paper, provide your submission code.</span>
      </div>

      <div style="margin-top: 1.5rem; display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" class="btn-outline-teal" style="padding: 0.625rem 1.25rem; font-size: 0.8125rem;" onclick="closeModal('modal-registration')">
          Cancel
        </button>
        <button type="submit" class="btn-primary" style="padding: 0.625rem 1.75rem; font-size: 0.8125rem;">
          Complete Registration <?= render_icon('arrow-right') ?>
        </button>
      </div>
    </form>
  </div>
</div>
