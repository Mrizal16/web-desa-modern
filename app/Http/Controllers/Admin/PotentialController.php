<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        return view('admin.potentials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('potentials', 'public');
        }

        Potential::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil ditambahkan.');
    }

    public function edit(Potential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, Potential $potential)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $potential->image;

        if ($request->hasFile('image')) {
            if ($potential->image) {
                Storage::disk('public')->delete($potential->image);
            }

            $imagePath = $request->file('image')
                ->store('potentials', 'public');
        }

        $potential->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil diperbarui.');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->image) {
            Storage::disk('public')->delete($potential->image);
        }

        $potential->delete();

        return redirect()
            ->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil dihapus.');
    }
}