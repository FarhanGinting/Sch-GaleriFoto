<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun pertama dengan role_id = 1
        User::create([
            'name' => 'User One',
            'email' => 'userone@example.com',
            'password' => Hash::make('password123'), // Enkripsi password
            'namalengkap' => 'Nama Lengkap User One',
            'alamat' => 'Alamat User One',
            'role_id' => 1,
        ]);

        // Membuat akun kedua dengan role_id = 2
        User::create([
            'name' => 'User Two',
            'email' => 'usertwo@example.com',
            'password' => Hash::make('password456'), // Enkripsi password
            'namalengkap' => 'Nama Lengkap User Two',
            'alamat' => 'Alamat User Two',
            'role_id' => 2,
        ]);
    }
}
