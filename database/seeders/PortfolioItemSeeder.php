<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioItem;
use App\Models\PortfolioCategory;

class PortfolioItemSeeder extends Seeder
{
    public function run(): void
    {
        // Get categories by slug
        $appCategory = PortfolioCategory::where('slug', 'filter-app')->first();
        $cardCategory = PortfolioCategory::where('slug', 'filter-card')->first();
        $webCategory = PortfolioCategory::where('slug', 'filter-web')->first();
        
        // If categories don't exist, create them
        if (!$appCategory) {
            $appCategory = PortfolioCategory::create([
                'name' => 'App',
                'slug' => 'filter-app',
                'order' => 1,
                'is_active' => true,
            ]);
        }
        if (!$cardCategory) {
            $cardCategory = PortfolioCategory::create([
                'name' => 'Card',
                'slug' => 'filter-card',
                'order' => 2,
                'is_active' => true,
            ]);
        }
        if (!$webCategory) {
            $webCategory = PortfolioCategory::create([
                'name' => 'Web',
                'slug' => 'filter-web',
                'order' => 3,
                'is_active' => true,
            ]);
        }
        
        $items = [
            [
                'title' => 'Career Counseling Session',
                'portfolio_category_id' => $appCategory->id,
                'description' => 'Professional career counseling sessions to guide students',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=800&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Student Assessment',
                'portfolio_category_id' => $webCategory->id,
                'description' => 'Comprehensive student assessment and evaluation',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=800&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Career Guidance Workshop',
                'portfolio_category_id' => $appCategory->id,
                'description' => 'Interactive career guidance workshops for students',
                'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=800&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Team Collaboration',
                'portfolio_category_id' => $cardCategory->id,
                'description' => 'Team collaboration and group activities',
                'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&h=800&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Career Planning',
                'portfolio_category_id' => $webCategory->id,
                'description' => 'Strategic career planning and roadmap development',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=800&fit=crop',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Student Success',
                'portfolio_category_id' => $appCategory->id,
                'description' => 'Celebrating student achievements and success stories',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1200&h=1200&fit=crop',
                'thumbnail' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=800&fit=crop',
                'order' => 6,
                'is_active' => true,
            ],
        ];
        
        foreach ($items as $itemData) {
            PortfolioItem::firstOrCreate(
                ['title' => $itemData['title']],
                $itemData
            );
        }
    }
}