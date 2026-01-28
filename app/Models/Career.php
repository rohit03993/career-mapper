<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'hero_image',
        'featured_image',
        'features',
        'scope',
        'who_can_pursue',
        'what_you_get',
        'order',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
