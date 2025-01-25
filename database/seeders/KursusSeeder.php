<?php

namespace Database\Seeders;

use App\Models\Kursus;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KursusSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 5 kursus dengan data dummy
        Kursus::create([
            'id_kursus' => Str::uuid(),
            'nama_kursus' => 'Kursus Pemrograman Laravel',
            'deskripsi' => 'Belajar Laravel dari dasar hingga mahir.',
            'harga' => 1000000,
            'status_kursus' => 'active',
            'jumlah_siswa_yang_terdaftar' => 10,
            'tgl_dibuat' => now(),
        ]);

        Kursus::create([
            'id_kursus' => Str::uuid(),
            'nama_kursus' => 'Kursus Pemrograman Python',
            'deskripsi' => 'Pelajari bahasa pemrograman Python untuk berbagai keperluan.',
            'harga' => 800000,
            'status_kursus' => 'active',
            'jumlah_siswa_yang_terdaftar' => 5,
            'tgl_dibuat' => now(),
        ]);

        Kursus::create([
            'id_kursus' => Str::uuid(),
            'nama_kursus' => 'Kursus Web Development Fullstack',
            'deskripsi' => 'Membangun website dari frontend hingga backend.',
            'harga' => 1500000,
            'status_kursus' => 'active',
            'jumlah_siswa_yang_terdaftar' => 12,
            'tgl_dibuat' => now(),
        ]);

        Kursus::create([
            'id_kursus' => Str::uuid(),
            'nama_kursus' => 'Kursus Data Science',
            'deskripsi' => 'Menggunakan data untuk mengambil keputusan bisnis.',
            'harga' => 2000000,
            'status_kursus' => 'inactive',
            'jumlah_siswa_yang_terdaftar' => 3,
            'tgl_dibuat' => now(),
        ]);

        Kursus::create([
            'id_kursus' => Str::uuid(),
            'nama_kursus' => 'Kursus Desain Grafis dengan Adobe Photoshop',
            'deskripsi' => 'Belajar desain grafis menggunakan Adobe Photoshop.',
            'harga' => 1200000,
            'status_kursus' => 'active',
            'jumlah_siswa_yang_terdaftar' => 8,
            'tgl_dibuat' => now(),
        ]);
    }
}
