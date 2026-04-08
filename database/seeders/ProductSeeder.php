<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $produk = [
        ['nama' => 'TV Samsung 43"', 'deskripsi' => 'TV LED 4K', 'harga' => 4500000],
        ['nama' => 'Kulkas LG 2 Pintu', 'deskripsi' => 'Kulkas hemat listrik', 'harga' => 3500000],
        ['nama' => 'AC Daikin 1/2 PK', 'deskripsi' => 'AC dingin cepat', 'harga' => 3200000],
        ['nama' => 'Mesin Cuci Panasonic', 'deskripsi' => 'Top loading 8kg', 'harga' => 2800000],
        ['nama' => 'Microwave Sharp', 'deskripsi' => '20 liter digital', 'harga' => 1500000],
        ['nama' => 'Rice Cooker Miyako', 'deskripsi' => 'Kapasitas 1.8L', 'harga' => 450000],
        ['nama' => 'Blender Philips', 'deskripsi' => '400W', 'harga' => 600000],
        ['nama' => 'Setrika Ular', 'deskripsi' => 'Setrika uap', 'harga' => 250000],
        ['nama' => 'Kipas Angin Sekai', 'deskripsi' => '16 inch', 'harga' => 350000],
        ['nama' => 'Dispenser Miyako', 'deskripsi' => '2 tombol', 'harga' => 800000],
    ];
    foreach ($produk as $p) {
        DB::table('tblproducts')->insert($p);
    }
}
}
