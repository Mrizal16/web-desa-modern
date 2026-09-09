<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apparatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApparatusController extends Controller
{
    public function index()
    {
        $apparatuses = Apparatus::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.apparatuses.index', compact('apparatuses'));
    }

    public function create()
    {
        return view('admin.apparatuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('apparatus', 'public');
        }

        Apparatus::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'photo' => $photoPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.apparatuses.index')
            ->with('success', 'Aparatur berhasil ditambahkan.');
    }

    public function edit(Apparatus $apparatus)
    {
        return view('admin.apparatuses.edit', compact('apparatus'));
    }

    public function update(Request $request, Apparatus $apparatus)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $photoPath = $apparatus->photo;

        if ($request->hasFile('photo')) {

            if ($apparatus->photo) {
                Storage::disk('public')->delete($apparatus->photo);
            }

            $photoPath = $request->file('photo')
                ->store('apparatus', 'public');
        }

        $apparatus->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'photo' => $photoPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.apparatuses.index')
            ->with('success', 'Aparatur berhasil diperbarui.');
    }

    public function destroy(Apparatus $apparatus)
    {
        if ($apparatus->photo) {
            Storage::disk('public')->delete($apparatus->photo);
        }

        $apparatus->delete();

        return redirect()
            ->route('admin.apparatuses.index')
            ->with('success', 'Aparatur berhasil dihapus.');
    }
}