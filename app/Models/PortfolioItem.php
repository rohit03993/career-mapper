<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title',
        'portfolio_category_id',
        'image',
        'thumbnail',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Relationship with category
    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    // Scope for active portfolio items ordered by display order
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
