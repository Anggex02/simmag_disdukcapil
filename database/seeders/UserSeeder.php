<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@simmag.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'operator@simmag.com'],
            [
                'name' => 'Operator',
                'password' => Hash::make('password123'),
                'role' => 'operator',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'mentor@simmag.com'],
            [
                'name' => 'Mentor',
                'password' => Hash::make('password123'),
                'role' => 'mentor',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'mahasiswa@simmag.com'],
            [
                'name' => 'Mahasiswa',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'is_active' => true,
            ]
        );
    }
}