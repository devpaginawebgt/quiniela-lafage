<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'image',
        'country_code',
        'area_code',
        'timezone',
        'is_active'
    ];

    protected function casts(): array
    {
        return [ 'is_active' => 'boolean' ];
    }
}
