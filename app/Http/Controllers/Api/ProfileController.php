<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load('resident');

        return response()->json([
            'message' => 'Profil berhasil diambil.',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'resident' => $user->resident,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $resident = $user->resident;

        if (!$resident) {
            return response()->json([
                'message' => 'Data warga tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'birth_date' => [
                'required',
                'date',
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
            ],
            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        DB::transaction(function () use (
            $user,
            $resident,
            $validated
        ) {
            $user->update([
                'name' => $validated['name'],
            ]);

            $resident->update([
                'name' => $validated['name'],
                'birth_date' => $validated['birth_date'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
            ]);
        });

        $user->load('resident');

        return response()->json([
            'message' => 'Profil berhasil diperbarui.',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'resident' => $user->resident,
            ],
        ]);
    }
}