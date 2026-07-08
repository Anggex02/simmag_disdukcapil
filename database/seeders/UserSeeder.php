<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@simmag.com',
            'password' => Hash::make('admin123'),
            'role' => 'superadmin',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Operator',
            'email' => 'operator@simmag.com',
            'password' => Hash::make('operator123'),
            'role' => 'operator',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Mentor',
            'email' => 'mentor@simmag.com',
            'password' => Hash::make('mentor123'),
            'role' => 'mentor',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@simmag.com',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
            'is_active' => true,
        ]);
    }
}