<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestBooking extends Model
{
    protected $fillable = [
        'test_page_id',
        'name',
        'contact_number',
        'email',
        'message',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function testPage(): BelongsTo
    {
        return $this->belongsTo(TestPage::class);
    }
}
