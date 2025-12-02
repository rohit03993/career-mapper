<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use Illuminate\Support\Facades\DB;

class FixPortfolioCategories extends Command
{
    protected $signature = 'portfolio:fix-categories';
    protected $description = 'Fix duplicate categories and link portfolio items';

    public function handle()
    {
        $this->info('Fixing portfolio categories...');
        
        // Step 1: Find and merge duplicate categories
        $categories = PortfolioCategory::all();
        $uniqueCategories = [];
        $duplicatesToDelete = [];
        
        foreach ($categories as $category) {
            $key = strtolower($category->name);
            
            if (!isset($uniqueCategories[$key])) {
                $uniqueCategories[$key] = $category;
            } else {
                // This is a duplicate
                $this->info("Found duplicate: {$category->name} (ID: {$category->id})");
                
                // Move items from duplicate to original
                $original = $uniqueCategories[$key];
                PortfolioItem::where('portfolio_category_id', $category->id)
                    ->update(['portfolio_category_id' => $original->id]);
                
                $duplicatesToDelete[] = $category->id;
            }
        }
        
        // Delete duplicates
        if (count($duplicatesToDelete) > 0) {
            PortfolioCategory::whereIn('id', $duplicatesToDelete)->delete();
            $this->info("Deleted " . count($duplicatesToDelete) . " duplicate categories");
        }
        
        // Step 2: Ensure default categories exist
        $defaultCategories = [
            ['name' => 'App', 'slug' => 'filter-app', 'order' => 1],
            ['name' => 'Card', 'slug' => 'filter-card', 'order' => 2],
            ['name' => 'Web', 'slug' => 'filter-web', 'order' => 3],
        ];
        
        foreach ($defaultCategories as $default) {
            $category = PortfolioCategory::firstOrCreate(
                ['slug' => $default['slug']],
                array_merge($default, ['is_active' => true])
            );
            $this->info("Ensured category exists: {$category->name}");
        }
        
        // Step 3: Link orphaned items to default category
        $orphanedCount = PortfolioItem::whereNull('portfolio_category_id')->count();
        if ($orphanedCount > 0) {
            $defaultCategory = PortfolioCategory::where('slug', 'filter-app')->first();
            if ($defaultCategory) {
                PortfolioItem::whereNull('portfolio_category_id')
                    ->update(['portfolio_category_id' => $defaultCategory->id]);
                $this->info("Linked {$orphanedCount} orphaned items to 'App' category");
            }
        }
        
        // Step 4: Show summary
        $this->info("\nSummary:");
        $this->info("Total Categories: " . PortfolioCategory::count());
        $this->info("Total Portfolio Items: " . PortfolioItem::count());
        
        foreach (PortfolioCategory::withCount('portfolioItems')->get() as $cat) {
            $this->info("  - {$cat->name}: {$cat->portfolio_items_count} items");
        }
        
        $this->info("\nDone!");
        return 0;
    }
}