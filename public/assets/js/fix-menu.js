/**
 * Fix Menu Items Disappearing Issue
 * This script ensures menu items stay visible and clickable when dropdown is open
 */
(function() {
  'use strict';
  
  function ensureMenuItemsVisible() {
    const navbar = document.querySelector('#navbar');
    if (!navbar) return;
    
    // Only ensure visibility for active/hovered dropdowns
    const dropdowns = navbar.querySelectorAll('.dropdown');
    dropdowns.forEach(function(dropdown) {
      // Fix: querySelector doesn't support > selector, use children instead
      const menu = dropdown.querySelector('ul');
      if (menu && dropdown.children.length > 0 && dropdown.children[0].nextElementSibling === menu) {
        const isMobile = window.innerWidth <= 992;
        const isActive = dropdown.classList.contains('active');
        const isHovered = dropdown.matches(':hover');
        
        // On desktop: only show on hover
        // On mobile: only show when active
        if ((!isMobile && isHovered) || (isMobile && isActive)) {
          const dropdownItems = menu.querySelectorAll('li > a');
          dropdownItems.forEach(function(item) {
            item.style.display = 'block';
            item.style.visibility = 'visible';
            item.style.opacity = '1';
            item.style.pointerEvents = 'auto';
          });
        }
      }
    });
  }
  
  // Run on load and events
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ensureMenuItemsVisible);
  } else {
    ensureMenuItemsVisible();
  }
  
  // Run on mouse events and window resize
  document.addEventListener('mouseover', ensureMenuItemsVisible);
  document.addEventListener('click', ensureMenuItemsVisible);
  window.addEventListener('resize', ensureMenuItemsVisible);
})();

