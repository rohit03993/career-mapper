<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'location',
        'center_1',
        'center_2',
        'center_3',
        'center_4',
        'office_address',
        'email',
        'phone',
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}