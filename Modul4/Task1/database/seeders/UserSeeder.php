<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username'    => 'budi',
            'password'    => 'rahasia123', // otomatis di-hash karena cast 'hashed' di model
            'nama_lengkap' => 'Budi Santoso'
        ]);

        User::create([
            'username'    => 'andi',
            'password'    => 'rahasia456',
            'nama_lengkap' => 'Andi Wijaya'
        ]);
    }
}
