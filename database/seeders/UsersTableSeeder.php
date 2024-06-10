<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Admin
          User::create([
            'name' => 'Admin CRM',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'phone' => '081171828932',
            'address' => 'Jl. Mayor Syamsu No. 1',
            'city' => 'Garut',
            'postal_code' => '44161',
            'img_url' => '/admin.jpg',
            'role' => 'admin',
        ]);

        // User
        User::create([
            'name' => 'User CRM',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'phone' => '089271682028',
            'address' => 'Jl. Raya Samarang 1',
            'city' => 'Garut',
            'postal_code' => '44191',
            'img_url' => '/user.jpg',
            'role' => 'user',
        ]);
    }
}
