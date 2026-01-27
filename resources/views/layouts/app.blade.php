<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Best Career Counselling in India - Career Mapper')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files - Using CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <!-- Dynamic Theme Variables -->
    @php
        $themeSettings = \App\Models\ThemeSetting::getActive();
    @endphp
    @if($themeSettings)
    <style id="dynamic-theme-vars">
        {!! $themeSettings->generateCss() !!}
    </style>
    @endif
    
    <!-- Critical Mobile Menu Styles - Inline to ensure they load first -->
    <style>
      /* Force mobile toggle visibility on mobile - ALWAYS VISIBLE */
      @media (max-width: 992px) {
        .mobile-nav-toggle,
        i.mobile-nav-toggle,
        .bi.mobile-nav-toggle,
        [data-mobile-toggle="true"] {
          display: block !important;
          visibility: visible !important;
          opacity: 1 !important;
          position: relative !important;
          z-index: 10002 !important;
          pointer-events: auto !important;
          font-size: 32px !important;
          color: #fff !important;
          cursor: pointer !important;
          padding: 8px 12px !important;
          line-height: 1 !important;
          order: 2 !important;
          margin-left: auto !important;
        }
        
        .mobile-nav-toggle::before,
        [data-mobile-toggle="true"]::before {
          content: '☰' !important;
          font-size: 32px !important;
          display: inline-block !important;
          color: #fff !important;
          font-family: Arial, sans-serif !important;
          line-height: 1 !important;
        }
      }
      
      /* Hide on desktop */
      @media (min-width: 993px) {
        .mobile-nav-toggle,
        [data-mobile-toggle="true"] {
          display: none !important;
        }
      }
    </style>
    
    <!-- Immediate Mobile Toggle Visibility - Runs before header loads -->
    <script>
      (function() {
        // Create observer to watch for mobile toggle element
        const observer = new MutationObserver(function() {
          const toggle = document.querySelector('.mobile-nav-toggle, [data-mobile-toggle="true"]');
          if (toggle && window.innerWidth <= 992) {
            toggle.style.cssText = 'display: block !important; visibility: visible !important; opacity: 1 !important; position: relative !important; z-index: 10002 !important; font-size: 32px !important; color: #fff !important; cursor: pointer !important; padding: 8px 12px !important; line-height: 1 !important; pointer-events: auto !important; order: 2 !important; margin-left: auto !important;';
          }
        });
        
        // Start observing
        if (document.body) {
          observer.observe(document.body, { childList: true, subtree: true });
        } else {
          document.addEventListener('DOMContentLoaded', function() {
            observer.observe(document.body, { childList: true, subtree: true });
          });
        }
      })();
    </script>

    @stack('styles')
</head>
<body style="overflow-x: hidden;">
    @include('partials.header')
    
    <!-- Mobile Menu - Clean Simple Solution -->
    <script>
      (function() {
        'use strict';
        
        function initMobileMenu() {
          const toggle = document.querySelector('.mobile-nav-toggle');
          const navbar = document.querySelector('#navbar');
          
          if (!toggle || !navbar) {
            return false;
          }
          
          // Force toggle visibility
          function showToggle() {
            if (window.innerWidth <= 992) {
              toggle.style.cssText = 'display: block !important; visibility: visible !important; opacity: 1 !important; pointer-events: auto !important; cursor: pointer !important; z-index: 10002 !important; position: relative !important;';
            }
          }
          showToggle();
          setTimeout(showToggle, 50);
          setTimeout(showToggle, 200);
          window.addEventListener('resize', showToggle);
          
          // Toggle menu open/close
          toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (navbar.classList.contains('navbar-mobile')) {
              navbar.classList.remove('navbar-mobile');
              toggle.classList.remove('bi-x');
              toggle.classList.add('bi-list');
              document.body.classList.remove('navbar-open');
              document.body.style.overflow = '';
            } else {
              navbar.classList.add('navbar-mobile');
              toggle.classList.remove('bi-list');
              toggle.classList.add('bi-x');
              document.body.classList.add('navbar-open');
              document.body.style.overflow = 'hidden';
            }
          });
          
          // Handle dropdown clicks - Simple and direct
          navbar.addEventListener('click', function(e) {
            if (window.innerWidth <= 992 && navbar.classList.contains('navbar-mobile')) {
              let clicked = e.target;
              
              // Get the link if clicking on span/icon
              if (clicked.tagName === 'SPAN' || clicked.tagName === 'I') {
                clicked = clicked.closest('a');
              }
              
              // Check if it's a dropdown toggle
              if (clicked && clicked.tagName === 'A' && clicked.closest('.dropdown')) {
                const dropdown = clicked.closest('.dropdown');
                
                // Check if this is the dropdown's direct child link
                if (clicked.parentElement === dropdown) {
                  e.preventDefault();
                  e.stopPropagation();
                  
                  // Toggle dropdown
                  dropdown.classList.toggle('active');
                  
                  // Close siblings
                  const parent = dropdown.parentElement;
                  if (parent) {
                    Array.from(parent.children).forEach(function(child) {
                      if (child !== dropdown && child.classList.contains('dropdown')) {
                        child.classList.remove('active');
                      }
                    });
                  }
                  
                  return false;
                }
                
                // Check nested dropdown
                const nested = clicked.closest('.dropdown .dropdown');
                if (nested && clicked.parentElement === nested) {
                  e.preventDefault();
                  e.stopPropagation();
                  nested.classList.toggle('active');
                  return false;
                }
              }
            }
          });
          
          return true;
        }
        
        // Initialize
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', initMobileMenu);
        } else {
          initMobileMenu();
        }
        
        setTimeout(initMobileMenu, 100);
        setTimeout(initMobileMenu, 500);
        window.addEventListener('load', initMobileMenu);
      })();
    </script>

    <main id="main" style="min-height: 100vh;">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Preloader - Completely removed -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Force page to signal loaded - Don't wait for external resources -->
    <script>
      // Immediately mark page as loaded
      document.body.classList.add('loaded');
      
      // Force load event when DOM is ready (don't wait for images or external resources)
      (function() {
        function signalLoaded() {
          // Dispatch load event immediately
          if (document.readyState === 'complete') {
            if (!window.pageLoadSignaled) {
              window.pageLoadSignaled = true;
              window.dispatchEvent(new Event('load'));
            }
          }
        }
        
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', function() {
            setTimeout(signalLoaded, 50);
          });
        } else {
          setTimeout(signalLoaded, 50);
        }
        
        // Force after 200ms max - don't wait longer
        setTimeout(function() {
          if (!window.pageLoadSignaled) {
            window.pageLoadSignaled = true;
            window.dispatchEvent(new Event('load'));
            document.body.classList.add('page-loaded');
          }
        }, 200);
      })();
    </script>

    <!-- Vendor JS Files - Using CDN (async, non-blocking) -->
    <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.1.0/dist/purecounter_vanilla.js" async defer onerror="void(0)"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" async defer onerror="void(0)"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js" async defer onerror="void(0)"></script>
    <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js" async defer onerror="void(0)"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js" async defer onerror="void(0)"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" async defer onerror="void(0)"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}" async defer></script>

    @stack('scripts')
</body>
</html>
