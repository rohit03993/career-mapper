<header id="header" class="fixed-top">
    <div class="container">
        <h1 class="logo"><a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="Career Mapper" class="img-fluid logo-img" loading="eager" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
            <span class="logo-text-fallback" style="display:none; color: #fff; font-size: 24px; font-weight: 700;">Career Mapper</span>
        </a></h1>
        
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('home') }}#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#why-choose-us">Why Choose Us</a></li>
                <li class="dropdown"><a href="#"><span>All Test</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @php
                            try {
                                $allTestPages = \App\Models\TestPage::where('is_active', true)->orderBy('order')->get();
                                // Main tests (order 1-8)
                                $mainTests = $allTestPages->where('order', '<=', 8);
                                // Other tests (order 9+)
                                $otherTests = $allTestPages->where('order', '>', 8);
                            } catch (\Exception $e) {
                                $mainTests = collect([]);
                                $otherTests = collect([]);
                            }
                        @endphp
                        @if($mainTests->count() > 0 || $otherTests->count() > 0)
                            {{-- Main Tests (order 1-8) --}}
                            @foreach($mainTests as $testPage)
                                <li><a href="{{ route('test-pages.show', $testPage->slug) }}">{{ $testPage->title }}</a></li>
                            @endforeach
                            
                            {{-- Other Test Submenu --}}
                            @if($otherTests->count() > 0)
                                <li class="dropdown"><a href="#"><span>Other Test</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        @foreach($otherTests as $testPage)
                                            <li><a href="{{ route('test-pages.show', $testPage->slug) }}">{{ $testPage->title }}</a></li>
                                        @endforeach
                                        <li><a href="{{ route('test-pages.index') }}"><strong>For All Test Click Here</strong></a></li>
                                    </ul>
                                </li>
                            @endif
                        @else
                            {{-- Fallback links if no test pages exist yet --}}
                            <li><a href="{{ route('test-pages.show', 'aptitude-mappers') }}">Aptitude Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'achievement-mappers') }}">Achievement Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'attitude-mappers') }}">Attitude Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'aspiration-mappers') }}">Aspiration Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'aggression-mappers') }}">Aggression Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'career-related-mappers') }}">Career Related Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'educational-mappers') }}">Educational Mappers</a></li>
                            <li><a href="{{ route('test-pages.show', 'frustration-aggression-mappers') }}">Frustration and Aggression Mappers</a></li>
                            <li class="dropdown"><a href="#"><span>Other Test</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{ route('test-pages.show', 'human-rights-related-mappers') }}">Human Rights Related Mappers</a></li>
                                    <li><a href="{{ route('test-pages.show', 'interest-mappers') }}">Interest Mappers</a></li>
                                    <li><a href="{{ route('test-pages.show', 'interpersonal-relations-mappers') }}">Interpersonal Relations Mappers</a></li>
                                    <li><a href="{{ route('test-pages.show', 'motivational-mappers') }}">Motivational Mappers</a></li>
                                    <li><a href="{{ route('test-pages.index') }}"><strong>For All Test Click Here</strong></a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#team">Team</a></li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#contact">Contact</a></li>
            </ul>
        </nav>
        <i class="bi bi-list mobile-nav-toggle" aria-label="Menu" data-mobile-toggle="true"></i>
        <span class="mobile-nav-toggle-fallback" style="display: none;">☰</span>
        @php
            $contactInfo = \App\Models\ContactInfo::where('is_active', true)->first();
            $phoneNumber = $contactInfo && $contactInfo->phone ? $contactInfo->phone : '+916396292221';
            // Ensure phone number starts with tel: protocol
            if (!str_starts_with($phoneNumber, 'tel:')) {
                $phoneNumber = 'tel:' . $phoneNumber;
            }
        @endphp
        <a href="{{ $phoneNumber }}" class="get-started-btn scrollto">Call Now</a>
    </div>
</header>

