/**
 * Simple Mobile Menu Handler
 * Clean, straightforward implementation
 */
(function() {
  'use strict';
  
  function initMobileMenu() {
    const toggle = document.querySelector('.mobile-nav-toggle');
    const navbar = document.querySelector('#navbar');
    
    if (!toggle || !navbar) {
      return;
    }
    
    // Toggle mobile menu open/close
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const isOpen = navbar.classList.contains('navbar-mobile');
      
      if (isOpen) {
        // Close menu
        navbar.classList.remove('navbar-mobile');
        toggle.classList.remove('bi-x');
        toggle.classList.add('bi-list');
        document.body.classList.remove('navbar-open');
        document.body.style.overflow = '';
      } else {
        // Open menu
        navbar.classList.add('navbar-mobile');
        toggle.classList.remove('bi-list');
        toggle.classList.add('bi-x');
        document.body.classList.add('navbar-open');
        document.body.style.overflow = 'hidden';
      }
    });
    
    // Handle dropdown toggles - simple and clean
    navbar.addEventListener('click', function(e) {
      // Only handle on mobile
      if (window.innerWidth > 992) return;
      
      const target = e.target;
      const dropdownLink = target.closest('.dropdown > a');
      
      if (dropdownLink) {
        e.preventDefault();
        e.stopPropagation();
        
        const dropdown = dropdownLink.closest('.dropdown');
        if (!dropdown) return;
        
        // Toggle this dropdown
        dropdown.classList.toggle('active');
        
        // Close other dropdowns at the same level
        const parent = dropdown.parentElement;
        if (parent) {
          parent.querySelectorAll('.dropdown').forEach(function(d) {
            if (d !== dropdown) {
              d.classList.remove('active');
            }
          });
        }
        
        return false;
      }
      
      // Handle nested dropdowns
      const nestedLink = target.closest('.dropdown .dropdown > a');
      if (nestedLink) {
        e.preventDefault();
        e.stopPropagation();
        
        const nestedDropdown = nestedLink.closest('.dropdown');
        if (!nestedDropdown) return;
        
        // Toggle nested dropdown
        nestedDropdown.classList.toggle('active');
        
        return false;
      }
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
      if (navbar.classList.contains('navbar-mobile')) {
        if (!navbar.contains(e.target) && !toggle.contains(e.target)) {
          navbar.classList.remove('navbar-mobile');
          toggle.classList.remove('bi-x');
          toggle.classList.add('bi-list');
          document.body.classList.remove('navbar-open');
          document.body.style.overflow = '';
        }
      }
    });
    
    // Close menu when clicking on a navigation link (not dropdown toggle)
    navbar.addEventListener('click', function(e) {
      if (window.innerWidth <= 992 && navbar.classList.contains('navbar-mobile')) {
        const link = e.target.closest('a');
        if (link && link.getAttribute('href') && link.getAttribute('href') !== '#') {
          const isDropdownToggle = link.closest('.dropdown > a');
          if (!isDropdownToggle) {
            // Close menu after navigation
            setTimeout(function() {
              navbar.classList.remove('navbar-mobile');
              toggle.classList.remove('bi-x');
              toggle.classList.add('bi-list');
              document.body.classList.remove('navbar-open');
              document.body.style.overflow = '';
            }, 300);
          }
        }
      }
    });
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
  } else {
    initMobileMenu();
  }
  
  // Re-initialize after a short delay to ensure everything is loaded
  setTimeout(initMobileMenu, 100);
})();

