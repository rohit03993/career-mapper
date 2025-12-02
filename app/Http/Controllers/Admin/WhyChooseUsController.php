<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display the Why Choose Us section management page
     */
    public function index()
    {
        $whyChooseUs = WhyChooseUs::first();
        return view('admin.why-choose-us.index', compact('whyChooseUs'));
    }

    /**
     * Show the form for editing the Why Choose Us section
     */
    public function edit()
    {
        $whyChooseUs = WhyChooseUs::first();
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the Why Choose Us section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $whyChooseUs = WhyChooseUs::first();
        
        if ($whyChooseUs) {
            $whyChooseUs->update($validated);
        } else {
            WhyChooseUs::create($validated);
        }

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Why Choose Us section updated successfully!');
    }
}