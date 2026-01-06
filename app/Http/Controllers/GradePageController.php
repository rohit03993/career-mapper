<?php

namespace App\Http\Controllers;

use App\Models\GradePage;
use Illuminate\Http\Request;

class GradePageController extends Controller
{
    public function show($slug)
    {
        $gradePage = GradePage::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        
        return view('grade-pages.show', compact('gradePage', 'slug'));
    }
}
