<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name',
        'description',
        'vision',
        'mission',
        'image',

        'population',
        'families',
        'hamlets',
        'rt',
        'rw',

        'address',
        'email',
        'phone',
        'service_hours',
        'maps_embed',
    ];
}