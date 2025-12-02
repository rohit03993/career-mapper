<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyUs = WhyUs::first();
        return view('admin.why-us.index', compact('whyUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $whyUs = WhyUs::findOrFail($id);
        return view('admin.why-us.edit', compact('whyUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $whyUs = WhyUs::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'intro_text' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.number' => 'required|string',
            'items.*.text' => 'required|string',
            'conclusion_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($whyUs->image && Storage::disk('public')->exists($whyUs->image)) {
                Storage::disk('public')->delete($whyUs->image);
            }
            
            $imagePath = $request->file('image')->store('why-us', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $whyUs->image;
        }

        $validated['is_active'] = $request->has('is_active');

        $whyUs->update($validated);

        return redirect()->route('admin.why-us.index')
            ->with('success', 'Why Us section updated successfully!');
    }
}