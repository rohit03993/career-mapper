<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'image',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Scope for active team members ordered by display order
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}