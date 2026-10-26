/**
 * Virtual Travel Planner - Main Client JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Mobile Navigation Toggle
  var navToggle = document.getElementById('navToggle');
  var mainNav = document.getElementById('mainNav');

  if (navToggle && mainNav) {
    navToggle.addEventListener('click', function () {
      var isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
      navToggle.setAttribute('aria-expanded', !isExpanded);
      mainNav.classList.toggle('is-open');
    });

    // Close mobile nav when clicking outside
    document.addEventListener('click', function (e) {
      if (!mainNav.contains(e.target) && !navToggle.contains(e.target) && mainNav.classList.contains('is-open')) {
        mainNav.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // 2. Set Minimum Date on Pickup Date Input (Cannot select past dates)
  var pickupDateInput = document.getElementById('pickup_date');
  if (pickupDateInput) {
    var today = new Date().toISOString().split('T')[0];
    pickupDateInput.setAttribute('min', today);
  }

  // 3. Client-side Form Validation Enhancement for Quote Form
  var quoteForm = document.getElementById('quoteForm');
  if (quoteForm) {
    quoteForm.addEventListener('submit', function (e) {
      var isValid = true;

      // Clear existing JS-generated error helpers if any
      var existingErrors = quoteForm.querySelectorAll('.js-client-error');
      existingErrors.forEach(function (el) {
        el.remove();
      });

      // Name field check
      var nameInput = document.getElementById('name');
      if (nameInput) {
        var nameVal = nameInput.value.trim();
        if (nameVal === '') {
          showFieldError(nameInput, 'Please enter your full name.');
          isValid = false;
        } else if (nameVal.length > 100) {
          showFieldError(nameInput, 'Name cannot exceed 100 characters.');
          isValid = false;
        } else {
          clearFieldError(nameInput);
        }
      }

      // Phone field check (must be exactly 10 digits)
      var phoneInput = document.getElementById('phone');
      if (phoneInput) {
        var phoneVal = phoneInput.value.trim().replace(/[\s\-]/g, '');
        var phoneRegex = /^[0-9]{10}$/;
        if (phoneVal === '') {
          showFieldError(phoneInput, 'Please enter your 10-digit phone number.');
          isValid = false;
        } else if (!phoneRegex.test(phoneVal)) {
          showFieldError(phoneInput, 'Phone number must be exactly 10 digits.');
          isValid = false;
        } else {
          clearFieldError(phoneInput);
        }
      }

      // Email field check (optional, but must be valid if entered)
      var emailInput = document.getElementById('email');
      if (emailInput && emailInput.value.trim() !== '') {
        var emailVal = emailInput.value.trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailVal)) {
          showFieldError(emailInput, 'Please enter a valid email address.');
          isValid = false;
        } else {
          clearFieldError(emailInput);
        }
      }

      // Service type check
      var serviceSelect = document.getElementById('service_type');
      if (serviceSelect) {
        var allowed = ['Local Car Rental', 'Outstation Trips', 'Airport Pickup & Drop', 'Corporate Rentals'];
        if (serviceSelect.value === '' || allowed.indexOf(serviceSelect.value) === -1) {
          showFieldError(serviceSelect, 'Please select a valid service type.');
          isValid = false;
        } else {
          clearFieldError(serviceSelect);
        }
      }

      if (!isValid) {
        e.preventDefault();
        // Focus on first invalid input
        var firstError = quoteForm.querySelector('.has-error');
        if (firstError) {
          firstError.focus();
        }
      }
    });
  }

  // Helper functions for field errors
  function showFieldError(inputElement, message) {
    inputElement.classList.add('has-error');
    var errorSpan = document.createElement('span');
    errorSpan.className = 'field-error js-client-error';
    errorSpan.textContent = message;
    if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('field-error')) {
      inputElement.nextElementSibling.textContent = message;
    } else {
      inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling);
    }
  }

  function clearFieldError(inputElement) {
    inputElement.classList.remove('has-error');
    if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('js-client-error')) {
      inputElement.nextElementSibling.remove();
    }
  }
});
