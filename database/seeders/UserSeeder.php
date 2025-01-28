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
            'name' => 'Adit Kurniawan',
            'username' => 'ditt_adit',
            'email' => 'adit@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('adit123'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);
        User::create([
            'name' => 'Ilham Maulana',
            'username' => 'ilham_maulana',
            'email' => 'ilhamham@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('namakuilham123'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);
        User::create([
            'name' => 'Toni Sukmawan',
            'username' => 'sukmaton97',
            'email' => 'sukma@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('hillenburg37'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);
        User::create([
            'name' => 'Siti Rahmawati',
            'username' => 'rahma_siti',
            'email' => 'rahmawatisiti@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('sitirahma88'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);
        User::create([
            'name' => 'Andi Saputra',
            'username' => 'andi_saputra',
            'email' => 'andi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('andi123'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Budi Prasetyo',
            'username' => 'budi_prasetyo',
            'email' => 'budi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('budiprasetyo456'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Citra Dewi',
            'username' => 'citra_dewi',
            'email' => 'citra@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('citra2025'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Dewi Lestari',
            'username' => 'dewi_lestari',
            'email' => 'dewi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dewiL123'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Fajar Setiawan',
            'username' => 'fajar_setiawan',
            'email' => 'fajar@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('fajar456'),
            'usertype' => 'user',
        ]);
        User::create([
            'name' => 'User EduCourse',
            'username' => 'user',
            'email' => 'user@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified user
            'password' => Hash::make('user123'), // Hash the password
            'usertype' => 'user', // Default 'user'
        ]);

        // Create an admin user
        User::create([
            'name' => 'Rosalinda Putri',
            'username' => 'linrosa97',
            'email' => 'linrosa_rosalinda@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified admin user
            'password' => Hash::make('adminpassword'), // Hash the password
            'usertype' => 'admin', // Admin user
        ]);
        User::create([
            'name' => 'Admin EduCourse',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // Set email_verified_at for a verified admin user
            'password' => Hash::make('admin123'), // Hash the password
            'usertype' => 'admin', // Admin user
        ]);

        // You can create more users if needed, either as 'user' or 'admin'.
    }
}
