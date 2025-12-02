<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'testimonial',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Scope for active testimonials ordered by display order
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}