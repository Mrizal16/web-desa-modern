<?php

namespace App\Http\Controllers;

use App\Models\LetterType;

class LetterRequestController extends Controller
{
    public function create()
    {
        $letterTypes = LetterType::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('warga.letters.create', compact('letterTypes'));
    }
}