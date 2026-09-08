<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = User::with('resident')
            ->whereHas('resident')
            ->latest()
            ->get();

        return view('admin.warga.index', compact('residents'));
    }

    public function show(User $user)
    {
        if (!$user->resident) {
            abort(404);
        }

        $user->load([
            'resident',
            'letterRequests.letterType',
        ]);

        return view('admin.warga.show', compact('user'));
    }
}