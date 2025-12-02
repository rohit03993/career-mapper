<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feature = Feature::first();
        return view('admin.features.index', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.icon' => 'required|string',
            'items.*.title' => 'required|string',
            'items.*.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($feature->image && Storage::disk('public')->exists($feature->image)) {
                Storage::disk('public')->delete($feature->image);
            }
            
            $imagePath = $request->file('image')->store('features', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $feature->image;
        }

        $validated['is_active'] = $request->has('is_active');

        $feature->update($validated);

        return redirect()->route('admin.features.index')
            ->with('success', 'Features section updated successfully!');
    }
}