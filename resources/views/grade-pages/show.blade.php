@extends('layouts.app')

@section('title', 'Career Guidance - Career Mapper')

@section('content')

<section id="grade-page" class="d-flex align-items-center" style="min-height: 60vh; padding: 120px 0 80px; background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" data-aos="fade-up">
                @php
                    $titles = [
                        'class-8-9' => 'Class 8-9 Career Guidance',
                        'class-10-12' => 'Class 10-12 Career Guidance',
                        'college-graduates' => 'College and Graduates Career Guidance'
                    ];
                    $descriptions = [
                        'class-8-9' => 'Early career exploration and guidance for students in classes 8 and 9. Discover your interests, strengths, and potential career paths.',
                        'class-10-12' => 'Comprehensive career counseling for classes 10, 11, and 12. Make informed decisions about streams, subjects, and future careers.',
                        'college-graduates' => 'Advanced career guidance for college students and graduates. Explore career opportunities, skill development, and professional growth.'
                    ];
                    $title = $titles[$slug] ?? 'Career Guidance';
                    $description = $descriptions[$slug] ?? 'Get personalized career guidance tailored to your needs.';
                @endphp
                <h1 style="color: var(--yellow-accent); font-size: 3rem; margin-bottom: 20px;">{{ $title }}</h1>
                <p style="color: #fff; font-size: 1.2rem; max-width: 800px; margin: 0 auto;">{{ $description }}</p>
            </div>
        </div>
    </div>
</section>

<section id="grade-content" class="section-bg" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box" style="background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
                    <h2 style="color: var(--text-dark); margin-bottom: 30px;">What We Offer</h2>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="feature-item" style="text-align: center; padding: 30px;">
                                <i class="ri-file-list-3-line" style="font-size: 3rem; color: var(--yellow-accent); margin-bottom: 20px;"></i>
                                <h4 style="color: var(--text-dark); margin-bottom: 15px;">Career Assessment</h4>
                                <p style="color: #666;">Comprehensive psychometric tests to identify your strengths, interests, and career preferences.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-item" style="text-align: center; padding: 30px;">
                                <i class="ri-user-star-line" style="font-size: 3rem; color: var(--yellow-accent); margin-bottom: 20px;"></i>
                                <h4 style="color: var(--text-dark); margin-bottom: 15px;">Expert Counseling</h4>
                                <p style="color: #666;">One-on-one sessions with certified career counselors to guide you through your career journey.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-item" style="text-align: center; padding: 30px;">
                                <i class="ri-roadmap-line" style="font-size: 3rem; color: var(--yellow-accent); margin-bottom: 20px;"></i>
                                <h4 style="color: var(--text-dark); margin-bottom: 15px;">Career Roadmap</h4>
                                <p style="color: #666;">Personalized career roadmap with actionable steps to achieve your career goals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('test-pages.index') }}" class="btn btn-primary" style="background: var(--yellow-accent); color: var(--dark-bg); padding: 15px 40px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s;">
                            Explore Our Tests
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

