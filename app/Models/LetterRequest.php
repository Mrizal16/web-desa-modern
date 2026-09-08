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
        'final_delivery_method',
        'result_file_path',
        'completed_at',
        'pickup_status',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function letterType()
    {
        return $this->belongsTo(LetterType::class);
    }

    public function documents()
    {
        return $this->hasMany(LetterDocument::class, 'request_id');
    }
}