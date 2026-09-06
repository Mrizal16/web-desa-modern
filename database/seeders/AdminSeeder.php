<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        User::updateOrCreate(
            [
                'email' => 'admin@desa.test',
            ],
            [
                'role_id' => $adminRole->id,
                'name' => 'Administrator Desa',
                'password' => Hash::make('admin12345'),
            ]
        );
    }
}