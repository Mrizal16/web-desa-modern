<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    protected $fillable = [
        'request_number',
        'user_id',
        'letter_type_id',
        'purpose',
        'status',
        'admin_note',
        'delivery_method',
        'pickup_status',
        'pdf_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function letterType()
    {
        return $this->belongsTo(LetterType::class);
    }
}