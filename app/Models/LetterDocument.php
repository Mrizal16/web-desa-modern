<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterDocument extends Model
{
    protected $fillable = [
        'request_id',
        'document_type',
        'file_name',
        'file_path',
    ];

    public function letterRequest()
    {
        return $this->belongsTo(
            LetterRequest::class,
            'request_id'
        );
    }
}