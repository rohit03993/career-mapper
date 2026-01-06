<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradePage extends Model
{
    protected $fillable = [
        'slug',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'features',
        'button_text',
        'feature_links',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'feature_links' => 'array',
        'is_active' => 'boolean',
    ];
}
