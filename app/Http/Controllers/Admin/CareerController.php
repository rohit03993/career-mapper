<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('order')->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:careers,slug,' . $id,
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'scope' => 'nullable|string',
            'who_can_pursue' => 'nullable|string',
            'what_you_get' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('hero_image')) {
            if ($career->hero_image && Storage::disk('public')->exists($career->hero_image)) {
                Storage::disk('public')->delete($career->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('careers', 'public');
        } else {
            unset($validated['hero_image']);
        }

        if ($request->hasFile('featured_image')) {
            if ($career->featured_image && Storage::disk('public')->exists($career->featured_image)) {
                Storage::disk('public')->delete($career->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('careers', 'public');
        } else {
            unset($validated['featured_image']);
        }

        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter(array_map('trim', $validated['features'])));
        }

        $validated['is_active'] = $request->has('is_active');

        $career->update($validated);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career updated successfully!');
    }
}
