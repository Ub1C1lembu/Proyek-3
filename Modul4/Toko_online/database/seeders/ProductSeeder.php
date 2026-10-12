<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['id_barang' => 'BRG-001', 'nama_barang' => 'Laptop Asus ROG', 'deskripsi' => 'Laptop gaming kencang', 'harga' => 15000000, 'stok' => 10, 'gambar' => 'images/Laptop-Asus-ROG.png'],
            ['id_barang' => 'BRG-002', 'nama_barang' => 'Mouse Logitech G502', 'deskripsi' => 'Mouse gaming enak', 'harga' => 750000, 'stok' => 20, 'gambar' => 'images/Mouse-Logitech-G502.png'],
            ['id_barang' => 'BRG-003', 'nama_barang' => 'Keyboard Mechanical', 'deskripsi' => 'Keyboard blue switch', 'harga' => 500000, 'stok' => 15, 'gambar' => 'images/Keyboard-Mechanical.png'],
            ['id_barang' => 'BRG-004', 'nama_barang' => 'Monitor LG 24 Inch', 'deskripsi' => 'Monitor IPS 75Hz', 'harga' => 1800000, 'stok' => 5, 'gambar' => 'images/Monitor-LG-24-Inch.png'],
            ['id_barang' => 'BRG-005', 'nama_barang' => 'Headset Razer', 'deskripsi' => 'Headset gaming surround', 'harga' => 900000, 'stok' => 8, 'gambar' => 'images/Headset-Razer.png'],
            ['id_barang' => 'BRG-006', 'nama_barang' => 'Mousepad RGB', 'deskripsi' => 'Mousepad lebar anti slip', 'harga' => 150000, 'stok' => 30, 'gambar' => 'images/Mousepad-RGB.png'],
            ['id_barang' => 'BRG-007', 'nama_barang' => 'Kabel HDMI 2 Meter', 'deskripsi' => 'Kabel display port ke HDMI', 'harga' => 75000, 'stok' => 50, 'gambar' => 'images/Kabel-HDMI-2-Meter.png'],
            ['id_barang' => 'BRG-008', 'nama_barang' => 'Flashdisk 64GB', 'deskripsi' => 'Flashdisk sandisk ori', 'harga' => 120000, 'stok' => 25, 'gambar' => 'images/Flashdisk-64GB.png'],
            ['id_barang' => 'BRG-009', 'nama_barang' => 'Webcam 1080p', 'deskripsi' => 'Kamera untuk zoom meeting', 'harga' => 450000, 'stok' => 12, 'gambar' => 'images/Webcam-1080p.png'],
            ['id_barang' => 'BRG-010', 'nama_barang' => 'Hardisk Eksternal 1TB', 'deskripsi' => 'HDD eksternal WD', 'harga' => 850000, 'stok' => 0, 'gambar' => 'images/Hardisk-Eksternal-1TB.png'], // Sengaja stok 0 untuk test kondisi tidak bisa dibeli
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
