<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apparatus extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}