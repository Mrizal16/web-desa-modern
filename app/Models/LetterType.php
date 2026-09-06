<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'allow_pdf',
        'allow_pickup',
        'is_active',
    ];

    protected $casts = [
        'allow_pdf' => 'boolean',
        'allow_pickup' => 'boolean',
        'is_active' => 'boolean',
    ];
}