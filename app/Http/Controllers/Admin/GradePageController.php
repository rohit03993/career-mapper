<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GradePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gradePages = GradePage::all();
        return view('admin.grade-pages.index', compact('gradePages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gradePage = GradePage::findOrFail($id);
        return view('admin.grade-pages.edit', compact('gradePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gradePage = GradePage::findOrFail($id);

        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string',
            'hero_image' => 'nullable|string|max:500', // URL or path
            'button_text' => 'nullable|string|max:255',
            'features' => 'required|array|min:1',
            'features.*.image' => 'nullable|string|max:500',
            'features.*.icon' => 'nullable|string|max:100',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
            'feature_links' => 'nullable|array',
            'feature_links.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Handle hero image upload if it's a file
        if ($request->hasFile('hero_image_file')) {
            // Delete old image if exists and is a local file
            if ($gradePage->hero_image && strpos($gradePage->hero_image, 'http') !== 0 && Storage::disk('public')->exists($gradePage->hero_image)) {
                Storage::disk('public')->delete($gradePage->hero_image);
            }
            $imagePath = $request->file('hero_image_file')->store('grade-pages', 'public');
            $validated['hero_image'] = $imagePath;
        } elseif ($request->filled('hero_image')) {
            // Use the provided URL
            $validated['hero_image'] = $request->input('hero_image');
        } else {
            $validated['hero_image'] = $gradePage->hero_image;
        }

        $validated['is_active'] = $request->has('is_active');

        $gradePage->update($validated);

        return redirect()->route('admin.grade-pages.index')
            ->with('success', 'Grade page updated successfully!');
    }
}
