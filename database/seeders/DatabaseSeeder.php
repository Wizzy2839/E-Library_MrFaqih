<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun ADMIN
        User::create([
            'nama_lengkap' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@sekolah.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'alamat' => 'Ruang Server',
        ]);

        // 2. Akun SISWA
        User::create([
            'nama_lengkap' => 'Siswa Teladan',
            'username' => 'siswa01',
            'email' => 'siswa@sekolah.sch.id',
            'password' => Hash::make('password'),
            'role' => 'user',
            'alamat' => 'Jl. Pendidikan No. 1',
        ]);

        // 3. Data BUKU Dummy
        Book::create([
            'title' => 'Filosofi Teras',
            'writer' => 'Henry Manampiring',
            'publisher' => 'Kompas',
            'publication_year' => 2019,
            'stock' => 5,
        ]);
        
        Book::create([
            'title' => 'Atomic Habits',
            'writer' => 'James Clear',
            'publisher' => 'Penguin',
            'publication_year' => 2018,
            'stock' => 3,
        ]);
    }
}