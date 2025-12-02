<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if portfolio_items table has a 'category' column (old structure)
        $hasOldCategoryColumn = Schema::hasColumn('portfolio_items', 'category');
        
        if ($hasOldCategoryColumn) {
            // Get all portfolio items with old category values
            $items = DB::table('portfolio_items')->whereNotNull('category')->get();
            
            // Map old category values to new category IDs
            $categoryMap = [
                'filter-app' => 'App',
                'filter-card' => 'Card',
                'filter-web' => 'Web',
                'app' => 'App',
                'card' => 'Card',
                'web' => 'Web',
            ];
            
            foreach ($items as $item) {
                $oldCategory = $item->category;
                $categoryName = null;
                
                // Try to find matching category name
                if (isset($categoryMap[$oldCategory])) {
                    $categoryName = $categoryMap[$oldCategory];
                } else {
                    // Try to extract category name from filter-* format
                    if (strpos($oldCategory, 'filter-') === 0) {
                        $categoryName = ucfirst(str_replace('filter-', '', $oldCategory));
                    } else {
                        $categoryName = ucfirst($oldCategory);
                    }
                }
                
                // Find or create the category
                $category = DB::table('portfolio_categories')
                    ->where('name', $categoryName)
                    ->first();
                
                if (!$category) {
                    // Create the category if it doesn't exist
                    $slug = 'filter-' . strtolower(str_replace(' ', '-', $categoryName));
                    $categoryId = DB::table('portfolio_categories')->insertGetId([
                        'name' => $categoryName,
                        'slug' => $slug,
                        'order' => DB::table('portfolio_categories')->max('order') + 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $categoryId = $category->id;
                }
                
                // Update the portfolio item with the category ID
                DB::table('portfolio_items')
                    ->where('id', $item->id)
                    ->update(['portfolio_category_id' => $categoryId]);
            }
            
            // Drop the old category column after migration
            Schema::table('portfolio_items', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
        
        // Also handle items that might have null portfolio_category_id
        // Assign them to the first available category (usually "App")
        $defaultCategory = DB::table('portfolio_categories')
            ->where('name', 'App')
            ->first();
        
        if ($defaultCategory) {
            DB::table('portfolio_items')
                ->whereNull('portfolio_category_id')
                ->update(['portfolio_category_id' => $defaultCategory->id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the category column if needed
        if (!Schema::hasColumn('portfolio_items', 'category')) {
            Schema::table('portfolio_items', function (Blueprint $table) {
                $table->string('category')->nullable()->after('title');
            });
            
            // Populate category from portfolio_category_id
            $items = DB::table('portfolio_items')
                ->join('portfolio_categories', 'portfolio_items.portfolio_category_id', '=', 'portfolio_categories.id')
                ->select('portfolio_items.id', 'portfolio_categories.slug')
                ->get();
            
            foreach ($items as $item) {
                DB::table('portfolio_items')
                    ->where('id', $item->id)
                    ->update(['category' => $item->slug]);
            }
        }
    }
};