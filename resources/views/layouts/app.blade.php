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
    
    <!-- Critical Mobile Menu Styles - Inline to ensure they load first -->
    <style>
      /* Force mobile toggle visibility on mobile - inline to override everything */
      @media (max-width: 992px) {
        .mobile-nav-toggle,
        i.mobile-nav-toggle,
        .bi.mobile-nav-toggle {
          display: block !important;
          visibility: visible !important;
          opacity: 1 !important;
          position: relative !important;
          z-index: 1002 !important;
          pointer-events: auto !important;
        }
      }
    </style>

    @stack('styles')
</head>
<body style="overflow-x: hidden;">
    @include('partials.header')
    
    <!-- Mobile Menu Script - Runs after header is loaded -->
    <script>
      // Inline mobile menu handler - guaranteed to work
      (function() {
        function initMobileMenu() {
          const toggle = document.querySelector('.mobile-nav-toggle');
          const navbar = document.querySelector('#navbar');
          
          if (!toggle || !navbar) {
            return false;
          }
          
          // Check if already initialized
          if (toggle.hasAttribute('data-menu-initialized')) {
            return true;
          }
          
          toggle.setAttribute('data-menu-initialized', 'true');
          
          // Force visibility with inline styles to override any CSS - runs immediately and on load
          function forceToggleVisibility() {
            if (window.innerWidth <= 992) {
              toggle.style.setProperty('display', 'block', 'important');
              toggle.style.setProperty('visibility', 'visible', 'important');
              toggle.style.setProperty('opacity', '1', 'important');
              toggle.style.setProperty('position', 'relative', 'important');
              toggle.style.setProperty('z-index', '1002', 'important');
            } else {
              toggle.style.display = 'none';
            }
          }
          
          // Force visibility immediately
          forceToggleVisibility();
          
          // Force again after delays (in case CSS loads late)
          setTimeout(forceToggleVisibility, 50);
          setTimeout(forceToggleVisibility, 200);
          setTimeout(forceToggleVisibility, 500);
          setTimeout(forceToggleVisibility, 1000);
          
          // Force on window load (after all resources load)
          window.addEventListener('load', function() {
            forceToggleVisibility();
            // Force again after load
            setTimeout(forceToggleVisibility, 100);
            setTimeout(forceToggleVisibility, 500);
          });
          
          // Monitor window resize
          window.addEventListener('resize', forceToggleVisibility);
          
          // Use MutationObserver to watch for style changes and re-apply
          const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
              if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                // If someone tries to hide it, force it back
                if (window.innerWidth <= 992) {
                  forceToggleVisibility();
                }
              }
            });
          });
          
          observer.observe(toggle, {
            attributes: true,
            attributeFilter: ['style', 'class']
          });
          
          // Also watch for class changes that might hide it
          setInterval(function() {
            if (window.innerWidth <= 992) {
              const computed = window.getComputedStyle(toggle);
              if (computed.display === 'none' || computed.visibility === 'hidden' || computed.opacity === '0') {
                forceToggleVisibility();
              }
            }
          }, 500);
          
          toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isOpen = navbar.classList.contains('navbar-mobile');
            
            if (isOpen) {
              // Close
              navbar.classList.remove('navbar-mobile');
              navbar.style.right = '-100%';
              navbar.style.display = 'none';
              toggle.classList.remove('bi-x');
              toggle.classList.add('bi-list');
              document.body.classList.remove('navbar-open');
              document.body.style.overflow = '';
            } else {
              // Open
              navbar.classList.add('navbar-mobile');
              navbar.style.cssText = 'position: fixed !important; top: 70px !important; right: 0 !important; width: 100% !important; max-width: 320px !important; height: calc(100vh - 70px) !important; background: #000000 !important; display: block !important; visibility: visible !important; opacity: 1 !important; z-index: 10000 !important; overflow-y: auto !important; box-shadow: -5px 0 20px rgba(0,0,0,0.3) !important; transition: right 0.3s ease !important;';
              toggle.classList.remove('bi-list');
              toggle.classList.add('bi-x');
              document.body.classList.add('navbar-open');
              document.body.style.overflow = 'hidden';
            }
          });
          
          // Close on outside click
          document.addEventListener('click', function(e) {
            if (navbar.classList.contains('navbar-mobile')) {
              if (!navbar.contains(e.target) && !toggle.contains(e.target)) {
                navbar.classList.remove('navbar-mobile');
                navbar.style.right = '-100%';
                navbar.style.display = 'none';
                toggle.classList.remove('bi-x');
                toggle.classList.add('bi-list');
                document.body.classList.remove('navbar-open');
                document.body.style.overflow = '';
              }
            }
          });
          
          return true;
        }
        
        // Try immediately
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', function() {
            initMobileMenu();
          });
        } else {
          initMobileMenu();
        }
        
        // Backup attempts
        setTimeout(initMobileMenu, 100);
        setTimeout(initMobileMenu, 500);
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
    <script src="{{ asset('assets/js/fix-menu.js') }}"></script>
    
    <!-- Ensure mobile menu works even if main.js loads late -->
    <script>
      // Backup initialization
      setTimeout(function() {
        if (typeof initMobileMenu === 'undefined') {
          const script = document.createElement('script');
          script.src = '{{ asset("assets/js/mobile-menu.js") }}';
          document.body.appendChild(script);
        }
      }, 1000);
    </script>

    @stack('scripts')
</body>
</html>

