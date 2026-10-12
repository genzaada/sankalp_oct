/**
 * Asynchronous AJAX Form Handlers with CSRF Protection
 */

function initForms() {
  // 1. Newsletter Form
  const newsletterForm = document.getElementById('newsletter-form');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = newsletterForm.querySelector('button[type="submit"]');
      const emailInput = newsletterForm.querySelector('input[type="email"]');
      const feedback = document.getElementById('newsletter-feedback');
      
      const originalText = btn.textContent;
      btn.textContent = 'Subscribing...';
      btn.disabled = true;

      try {
        const formData = new FormData(newsletterForm);
        const res = await fetch('api/newsletter.php', {
          method: 'POST',
          body: formData
        });
        const data = await res.json();
        if (data.success) {
          if (feedback) {
            feedback.className = 'form-feedback success';
            feedback.textContent = data.message;
            feedback.style.display = 'block';
          }
          newsletterForm.reset();
        } else {
          if (feedback) {
            feedback.className = 'form-feedback error';
            feedback.textContent = data.message || 'Subscription failed.';
            feedback.style.display = 'block';
          }
        }
      } catch (err) {
        if (feedback) {
          feedback.className = 'form-feedback error';
          feedback.textContent = 'Network error. Please try again later.';
          feedback.style.display = 'block';
        }
      } finally {
        btn.textContent = originalText;
        btn.disabled = false;
      }
    });
  }

  // 2. Registration Form
  const regForm = document.getElementById('registration-form');
  if (regForm) {
    regForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = regForm.querySelector('button[type="submit"]');
      const feedback = document.getElementById('reg-feedback');
      
      const originalText = btn.textContent;
      btn.textContent = 'Processing Registration...';
      btn.disabled = true;

      try {
        const formData = new FormData(regForm);
        const res = await fetch('api/register.php', {
          method: 'POST',
          body: formData
        });
        const data = await res.json();
        if (data.success) {
          if (feedback) {
            feedback.className = 'form-feedback success';
            feedback.innerHTML = `<strong>${data.message}</strong><br>Registration Code: <span class="font-mono font-bold">${data.registration_code}</span>`;
            feedback.style.display = 'block';
          }
          regForm.reset();
        } else {
          if (feedback) {
            feedback.className = 'form-feedback error';
            feedback.textContent = data.message || 'Registration failed.';
            feedback.style.display = 'block';
          }
        }
      } catch (err) {
        if (feedback) {
          feedback.className = 'form-feedback error';
          feedback.textContent = 'Network or server error. Please try again.';
          feedback.style.display = 'block';
        }
      } finally {
        btn.textContent = originalText;
        btn.disabled = false;
      }
    });
  }

  // 3. Abstract Submission Form
  const subForm = document.getElementById('submission-form');
  if (subForm) {
    subForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = subForm.querySelector('button[type="submit"]');
      const feedback = document.getElementById('sub-feedback');
      
      const originalText = btn.textContent;
      btn.textContent = 'Submitting Abstract...';
      btn.disabled = true;

      try {
        const formData = new FormData(subForm);
        const res = await fetch('api/submit-abstract.php', {
          method: 'POST',
          body: formData
        });
        const data = await res.json();
        if (data.success) {
          if (feedback) {
            feedback.className = 'form-feedback success';
            feedback.innerHTML = `<strong>${data.message}</strong><br>Submission Code: <span class="font-mono font-bold">${data.submission_code}</span>`;
            feedback.style.display = 'block';
          }
          subForm.reset();
        } else {
          if (feedback) {
            feedback.className = 'form-feedback error';
            feedback.textContent = data.message || 'Submission failed.';
            feedback.style.display = 'block';
          }
        }
      } catch (err) {
        if (feedback) {
          feedback.className = 'form-feedback error';
          feedback.textContent = 'Network or server error. Please try again.';
          feedback.style.display = 'block';
        }
      } finally {
        btn.textContent = originalText;
        btn.disabled = false;
      }
    });
  }
}

window.initForms = initForms;
