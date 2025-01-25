<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a regular user
        User::create([
            'name' => 'John Doe',
            'username' => 'john_doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('password123'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);

        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'username' => 'admin_user',
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified admin user
            'password' => Hash::make('adminpassword'), // Hash the password
            'usertype' => 'admin', // Admin user
        ]);

        // You can create more users if needed, either as 'user' or 'admin'.
    }
}
