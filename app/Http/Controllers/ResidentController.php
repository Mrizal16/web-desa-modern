<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        $resident = $user->resident;

        return view('warga.profile', compact('user', 'resident'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $resident = $user->resident;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:1000',
        ]);

        $user->update([
            'name' => $validated['name'],
        ]);

        $resident->update([
            'name' => $validated['name'],
            'birth_date' => $validated['birth_date'],
            'phone' => $validated['phone'],
            'address' => $validated['address'] ?? null,
        ]);

        return back()->with(
            'success',
            'Profil berhasil diperbarui.'
        );
    }
}