<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.about-us.index', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'left_column_text' => 'required|string',
            'right_column_text_1' => 'required|string',
            'right_column_text_2' => 'required|string',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutUs->image && Storage::disk('public')->exists($aboutUs->image)) {
                Storage::disk('public')->delete($aboutUs->image);
            }
            
            $imagePath = $request->file('image')->store('about-us', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $aboutUs->image;
        }

        $validated['is_active'] = $request->has('is_active');

        $aboutUs->update($validated);

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section updated successfully!');
    }
}