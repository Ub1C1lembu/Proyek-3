<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id_user' => 'USR-001',
            'nama_lengkap' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'username' => 'budi',
            'password' => Hash::make('rahasia123'),
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Sudirman No. 1, Jakarta'
        ]);

        User::create([
            'id_user' => 'USR-002',
            'nama_lengkap' => 'Andi Wijaya',
            'email' => 'andi@example.com',
            'username' => 'andi',
            'password' => Hash::make('password123'),
            'no_hp' => '089876543210',
            'alamat' => 'Jl. Melati No. 5, Bandung'
        ]);
    }
}
