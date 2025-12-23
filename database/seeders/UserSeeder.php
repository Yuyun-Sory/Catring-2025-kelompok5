<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin Utama',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '081234567890',
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Operator 1',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('operator123'),
                'phone' => '081111111111',
                'role' => 'operator',
                'status' => 'active',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'phone' => '082222222222',
                'role' => 'user',
                'status' => 'inactive',
                'email_verified_at' => null,
            ],
        ]);
    }
}
