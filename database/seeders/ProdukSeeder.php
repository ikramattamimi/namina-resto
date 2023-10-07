<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'kategori_produk_id' => random_int(1, 9), // Random category between 1 and 9
                'kode' => 'FD001',
                'nama' => 'Hamburger',
                'harga_jual' => 50000,
                'gambar' => 'lainnya.png',
                'diskon' => '10%',
                'is_active' => true
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD002',
                'nama' => 'Pizza',
                'harga_jual' => 75000,
                'gambar' => 'lainnya.png',
                'diskon' => '5%',
                'is_active' => true
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD003',
                'nama' => 'Pasta',
                'harga_jual' => 60000,
                'gambar' => 'lainnya.png',
                'diskon' => '15%',
                'is_active' => true
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD004',
                'nama' => 'Sushi',
                'harga_jual' => 55000,
                'gambar' => 'cemilan.png',
                'diskon' => '8%',
                'is_active' => false
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'DR001',
                'nama' => 'Jus Mangga',
                'harga_jual' => 70000,
                'gambar' => 'jus mangga.jpg',
                'diskon' => '12%',
                'is_active' => false
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'DR002',
                'nama' => 'Bakso',
                'harga_jual' => 60000,
                'gambar' => 'bakso.jpg',
                'diskon' => '10%',
                'is_active' => false
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD005',
                'nama' => 'Ayam Bakar',
                'harga_jual' => 70000,
                'gambar' => 'ayam bakar.jpg',
                'diskon' => '5%',
                'is_active' => false
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD006',
                'nama' => 'Ikan',
                'harga_jual' => 80000,
                'gambar' => 'ikan.png',
                'diskon' => '10%',
                'is_active' => true
            ],
        ];

        // Insert the data into the produk table
        foreach ($products as $product) {
            DB::table('produks')->insert($product);
        }
    }
}
