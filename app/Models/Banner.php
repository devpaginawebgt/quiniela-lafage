<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'url',
        'module_id',
        'line_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [ 'is_active' => 'boolean' ];
    }

    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }
}
