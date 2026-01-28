<?php

namespace App\Http\Controllers;

use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('careers.index', compact('careers'));
    }

    public function show($slug)
    {
        $career = Career::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedCareers = Career::where('is_active', true)
            ->where('id', '!=', $career->id)
            ->orderBy('order')
            ->limit(6)
            ->get();

        return view('careers.show', compact('career', 'relatedCareers'));
    }
}
