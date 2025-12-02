<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $fillable = [
        'title',
        'intro_text',
        'items',
        'conclusion_text',
        'image',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
    ];
}
