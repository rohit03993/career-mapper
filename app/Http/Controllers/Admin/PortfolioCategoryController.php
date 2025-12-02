<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PortfolioCategory::withCount(['portfolioItems' => function($query) {
            $query->where('is_active', true);
        }])->orderBy('order')->get();
        return view('admin.portfolio.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Generate slug from name
        $validated['slug'] = 'filter-' . Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? PortfolioCategory::max('order') + 1;

        PortfolioCategory::create($validated);

        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = PortfolioCategory::findOrFail($id);
        return view('admin.portfolio.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = PortfolioCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name,' . $id,
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Update slug if name changed
        if ($category->name !== $validated['name']) {
            $validated['slug'] = 'filter-' . Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = PortfolioCategory::findOrFail($id);
        
        // Check if category has items
        if ($category->portfolioItems()->count() > 0) {
            return redirect()->route('admin.portfolio.categories.index')
                ->with('error', 'Cannot delete category with portfolio items. Please move or delete items first.');
        }
        
        $category->delete();

        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}