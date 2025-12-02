/**
 * Mobile Menu Handler - Standalone, bulletproof implementation
 */
(function() {
  'use strict';
  
  function initMobileMenu() {
    const toggle = document.querySelector('.mobile-nav-toggle');
    const navbar = document.querySelector('#navbar');
    
    if (!toggle || !navbar) {
      console.error('Mobile menu elements not found');
      return;
    }
    
    // Remove any existing listeners by cloning
    const newToggle = toggle.cloneNode(true);
    toggle.parentNode.replaceChild(newToggle, toggle);
    
    // Add click handler
    newToggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const isOpen = navbar.classList.contains('navbar-mobile');
      
      if (isOpen) {
        // Close menu
        navbar.classList.remove('navbar-mobile');
        navbar.style.right = '-100%';
        navbar.style.display = 'none';
        newToggle.classList.remove('bi-x');
        newToggle.classList.add('bi-list');
        document.body.classList.remove('navbar-open');
        document.body.style.overflow = '';
      } else {
        // Open menu
        navbar.classList.add('navbar-mobile');
        navbar.style.cssText = 'position: fixed !important; top: 70px !important; right: 0 !important; width: 100% !important; max-width: 320px !important; height: calc(100vh - 70px) !important; background: #000000 !important; display: block !important; visibility: visible !important; opacity: 1 !important; z-index: 10000 !important; overflow-y: auto !important; box-shadow: -5px 0 20px rgba(0,0,0,0.3) !important; transition: right 0.3s ease !important;';
        newToggle.classList.remove('bi-list');
        newToggle.classList.add('bi-x');
        document.body.classList.add('navbar-open');
        document.body.style.overflow = 'hidden';
      }
    });
    
    // Close on outside click (but not when clicking dropdown items)
    document.addEventListener('click', function(e) {
      if (navbar.classList.contains('navbar-mobile')) {
        const clickedElement = e.target;
        const isDropdownToggle = clickedElement.closest('.dropdown > a');
        const isDropdownItem = clickedElement.closest('.dropdown > ul');
        
        // Don't close if clicking on dropdown toggle or inside dropdown menu
        if (isDropdownToggle || isDropdownItem) {
          return;
        }
        
        if (!navbar.contains(e.target) && !newToggle.contains(e.target)) {
          navbar.classList.remove('navbar-mobile');
          navbar.style.right = '-100%';
          navbar.style.display = 'none';
          newToggle.classList.remove('bi-x');
          newToggle.classList.add('bi-list');
          document.body.classList.remove('navbar-open');
          document.body.style.overflow = '';
        }
      }
    });
    
    // Close on link click (but not dropdown toggles)
    navbar.addEventListener('click', function(e) {
      const clickedElement = e.target;
      const clickedLink = clickedElement.closest('a');
      
      if (!clickedLink) return;
      
      // Don't close if clicking on dropdown toggle button (the <a> that has the dropdown icon)
      const parentLi = clickedLink.parentElement;
      if (parentLi && parentLi.classList.contains('dropdown')) {
        // Check if this is the toggle link (has icon or is the parent of dropdown)
        const hasIcon = clickedLink.querySelector('i') || clickedLink.querySelector('span');
        if (hasIcon || clickedLink.getAttribute('href') === '#') {
          e.stopPropagation(); // Stop event from bubbling
          return; // Let dropdown toggle handle it
        }
      }
      
      // For actual navigation links inside dropdowns, close menu after navigation
      const href = clickedLink.getAttribute('href');
      if (href && href !== '#' && window.innerWidth <= 992) {
        // Close menu after a short delay to allow navigation
        setTimeout(function() {
          navbar.classList.remove('navbar-mobile');
          navbar.style.right = '-100%';
          navbar.style.display = 'none';
          newToggle.classList.remove('bi-x');
          newToggle.classList.add('bi-list');
          document.body.classList.remove('navbar-open');
          document.body.style.overflow = '';
          
          // Also close all dropdowns
          navbar.querySelectorAll('.dropdown').forEach(function(d) {
            d.classList.remove('active');
          });
        }, 200);
      }
    }, true); // Use capture phase to catch events early
    
    console.log('Mobile menu initialized successfully');
  }
  
  // Run immediately
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
  } else {
    initMobileMenu();
  }
  
  // Also run after a delay as backup
  setTimeout(initMobileMenu, 500);
})();

