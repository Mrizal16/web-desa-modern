<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:residents,nik',
            'no_kk' => 'required|digits:16',
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        DB::transaction(function () use ($validated) {

            $roleWarga = Role::where('name', 'Warga')->firstOrFail();

            $user = User::create([
                'role_id' => $roleWarga->id,
                'name' => $validated['name'],
                'email' => $validated['email'] ?? null,
                'password' => Hash::make($validated['password']),
            ]);

            Resident::create([
                'user_id' => $user->id,
                'nik' => $validated['nik'],
                'no_kk' => $validated['no_kk'],
                'name' => $validated['name'],
                'birth_date' => $validated['birth_date'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
            ]);
        });

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role?->name === 'Admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('warga.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}