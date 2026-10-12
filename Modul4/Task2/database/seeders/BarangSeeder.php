<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            ['id' => 1, 'nama' => 'Buku Tulis', 'harga' => 5000, 'stok' => 10],
            ['id' => 2, 'nama' => 'Pulpen', 'harga' => 3000, 'stok' => 20],
            ['id' => 3, 'nama' => 'Penggaris', 'harga' => 4000, 'stok' => 15],
            ['id' => 4, 'nama' => 'Pensil 2B', 'harga' => 2500, 'stok' => 25],
            ['id' => 5, 'nama' => 'Penghapus', 'harga' => 1500, 'stok' => 30],
        ]);
    }
}
