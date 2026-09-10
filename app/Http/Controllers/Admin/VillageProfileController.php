<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function edit()
    {
        $profile = VillageProfile::firstOrCreate(
            ['id' => 1],
            [
                'village_name' => 'Desa Sidorejo',
            ]
        );

        return view('admin.village-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = VillageProfile::firstOrCreate(
            ['id' => 1],
            [
                'village_name' => 'Desa Sidorejo',
            ]
        );

        $validated = $request->validate([
            'village_name' => 'required|string|max:255',

            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'population' => 'nullable|integer|min:0',
            'families' => 'nullable|integer|min:0',
            'hamlets' => 'nullable|integer|min:0',
            'rt' => 'nullable|integer|min:0',
            'rw' => 'nullable|integer|min:0',

            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_hours' => 'nullable|string|max:255',
            'maps_embed' => 'nullable|string',
        ]);

        $imagePath = $profile->image;

        if ($request->hasFile('image')) {

            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }

            $imagePath = $request->file('image')
                ->store('village-profile', 'public');
        }

        $profile->update([
            'village_name' => $validated['village_name'],

            'description' => $validated['description'] ?? null,
            'vision' => $validated['vision'] ?? null,
            'mission' => $validated['mission'] ?? null,

            'image' => $imagePath,

            'population' => $validated['population'] ?? null,
            'families' => $validated['families'] ?? null,
            'hamlets' => $validated['hamlets'] ?? null,
            'rt' => $validated['rt'] ?? null,
            'rw' => $validated['rw'] ?? null,

            'address' => $validated['address'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'service_hours' => $validated['service_hours'] ?? null,
            'maps_embed' => $validated['maps_embed'] ?? null,
        ]);

        return redirect()
            ->route('admin.village-profile.edit')
            ->with('success', 'Profil dan kontak desa berhasil diperbarui.');
    }
}