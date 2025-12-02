<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';
    
    protected $fillable = [
        'title',
        'paragraph_1',
        'paragraph_2',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}