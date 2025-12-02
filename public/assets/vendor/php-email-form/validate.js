/**
 * PHP Email Form Validation
 * This is a placeholder - you can copy the actual validate.js from the original site
 */

(function() {
  'use strict';
  
  window.addEventListener('load', function() {
    const forms = document.getElementsByClassName('php-email-form');
    
    Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
        
        if (form.checkValidity() === false) {
          form.classList.add('was-validated');
          return false;
        }
        
        // Form is valid, submit via AJAX or regular form submission
        form.classList.add('was-validated');
        
        // Show loading
        const loading = form.querySelector('.loading');
        const errorMessage = form.querySelector('.error-message');
        const sentMessage = form.querySelector('.sent-message');
        
        if (loading) loading.style.display = 'block';
        if (errorMessage) errorMessage.style.display = 'none';
        if (sentMessage) sentMessage.style.display = 'none';
        
        // Submit form
        const formData = new FormData(form);
        fetch(form.action, {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (loading) loading.style.display = 'none';
          if (data.success) {
            if (sentMessage) sentMessage.style.display = 'block';
            form.reset();
          } else {
            if (errorMessage) {
              errorMessage.innerHTML = data.message || 'An error occurred';
              errorMessage.style.display = 'block';
            }
          }
        })
        .catch(error => {
          if (loading) loading.style.display = 'none';
          if (errorMessage) {
            errorMessage.innerHTML = 'An error occurred. Please try again.';
            errorMessage.style.display = 'block';
          }
        });
        
        return false;
      }, false);
    });
  }, false);
})();

