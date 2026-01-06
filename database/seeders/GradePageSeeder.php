<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradePage;

class GradePageSeeder extends Seeder
{
    public function run(): void
    {
        // Class 8-9
        GradePage::updateOrCreate(
            ['slug' => 'class-8-9'],
            [
            'hero_title' => 'Discover the perfect stream and subject for your career',
            'hero_subtitle' => 'Get ahead of the curve and build a solid foundation for your career with the right stream and subject choices.',
            'hero_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=600&fit=crop',
            'button_text' => 'Apply for Class 8-9 Counseling Session',
            'feature_links' => [
                'Career & Subject Assessment',
                'Personalised Guidance',
                'Profile Building',
                'Virtual Internships',
                'Subject & Career Mapping'
            ],
            'features' => [
                [
                    'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&h=300&fit=crop',
                    'icon' => 'ri-book-open-line',
                    'title' => 'Humanities, Science or Commerce',
                    'description' => 'Pick the right stream for you based on your interests & aptitude.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=300&fit=crop',
                    'icon' => 'ri-search-line',
                    'title' => 'Career Options Exploration',
                    'description' => 'Learn in detail about all the career options available for your chosen stream and subject combinations.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&h=300&fit=crop',
                    'icon' => 'ri-user-star-line',
                    'title' => 'Profile Building',
                    'description' => 'Build a holistic profile aligned to your career interests & ambitions with guidance from expert coaches.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=400&h=300&fit=crop',
                    'icon' => 'ri-briefcase-line',
                    'title' => 'Virtual Internships',
                    'description' => 'Deep dive into your preferred career domains through virtual career simulations & internships.'
                ]
            ],
            'is_active' => true,
            ]
        );

        // Class 10-12
        GradePage::updateOrCreate(
            ['slug' => 'class-10-12'],
            [
            'hero_title' => 'Find your true calling in life and start your career journey',
            'hero_subtitle' => 'Identify your career goals and formulate a step-by-step plan to get there with guidance from career experts',
            'hero_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=600&fit=crop',
            'button_text' => 'Get Started',
            'feature_links' => [
                'Career & Subject Assessment',
                'Personalised Guidance',
                'Profile Building',
                'Virtual Internships',
                'Subject & Career Mapping'
            ],
            'features' => [
                [
                    'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=300&fit=crop',
                    'icon' => 'ri-search-eye-line',
                    'title' => 'Find the ideal career options for you based on your interests and aptitude',
                    'description' => 'Discover career paths that align perfectly with your strengths, interests, and personality through comprehensive assessments.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=400&h=300&fit=crop',
                    'icon' => 'ri-user-voice-line',
                    'title' => 'Get expert guidance from our counsellors on which career path would suit you best',
                    'description' => 'Work one-on-one with certified career counselors who will help you navigate your options and make informed decisions.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop',
                    'icon' => 'ri-graduation-cap-2-line',
                    'title' => 'Pick the right colleges and courses with help from our coaches to excel in the career of your choice',
                    'description' => 'Get personalized recommendations for colleges, courses, and programs that match your career aspirations and academic profile.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=300&fit=crop',
                    'icon' => 'ri-flag-line',
                    'title' => 'Get ahead of the competition by planning ahead for entrance exams and college applications',
                    'description' => 'Create a strategic roadmap for entrance exams, application deadlines, and preparation timelines to maximize your chances of success.'
                ]
            ],
            'is_active' => true,
            ]
        );

        // College and Graduates
        GradePage::updateOrCreate(
            ['slug' => 'college-graduates'],
            [
            'hero_title' => 'Explore your career prospects and create your strategy towards success',
            'hero_subtitle' => 'Get a comprehensive understanding of skills and qualifications required to pursue your dream career.',
            'hero_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=600&fit=crop',
            'button_text' => 'Get Started',
            'feature_links' => [
                'Career Assessment',
                'Personalized Guidance',
                'Internships & Job Search Strategy',
                'Resume Review',
                'Interview Training',
                'University Application Support'
            ],
            'features' => [
                [
                    'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=300&fit=crop',
                    'icon' => 'ri-search-eye-line',
                    'title' => 'Find the best fit career option based on your interests, aptitude, academic history & future prospects',
                    'description' => 'Discover career paths that perfectly align with your unique combination of interests, skills, academic background, and future aspirations through comprehensive assessment tools.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=400&h=300&fit=crop',
                    'icon' => 'ri-roadmap-line',
                    'title' => 'Get expert guidance from our coaches to create a career roadmap strategy',
                    'description' => 'Work with experienced career coaches who will help you develop a personalized, step-by-step roadmap to achieve your career goals and navigate your professional journey.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=300&fit=crop',
                    'icon' => 'ri-landscape-line',
                    'title' => 'Understand the career landscape of your chosen domain, and future prospects associated with the same',
                    'description' => 'Gain deep insights into industry trends, job market dynamics, growth opportunities, and future prospects in your chosen career field.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop',
                    'icon' => 'ri-node-tree',
                    'title' => 'Plan the ideal next step in your academic or professional journey with our expert coaches',
                    'description' => 'Receive personalized recommendations for your next academic move, professional transition, or skill development to advance your career trajectory.'
                ]
            ],
            'is_active' => true,
            ]
        );
    }
}
