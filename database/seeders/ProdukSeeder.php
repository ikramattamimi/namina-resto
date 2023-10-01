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
                'stok' => 100,
                'harga_jual' => 50000,
                'gambar' => 'hamburger.jpg',
                'diskon' => '10%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD002',
                'nama' => 'Pizza',
                'stok' => 75,
                'harga_jual' => 75000,
                'gambar' => 'pizza.jpg',
                'diskon' => '5%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD003',
                'nama' => 'Pasta',
                'stok' => 50,
                'harga_jual' => 60000,
                'gambar' => 'pasta.jpg',
                'diskon' => '15%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD004',
                'nama' => 'Sushi',
                'stok' => 120,
                'harga_jual' => 55000,
                'gambar' => 'sushi.jpg',
                'diskon' => '8%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'DR001',
                'nama' => 'Coffee',
                'stok' => 90,
                'harga_jual' => 70000,
                'gambar' => 'coffee.jpg',
                'diskon' => '12%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'DR002',
                'nama' => 'Tea',
                'stok' => 60,
                'harga_jual' => 60000,
                'gambar' => 'tea.jpg',
                'diskon' => '10%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD005',
                'nama' => 'Steak',
                'stok' => 80,
                'harga_jual' => 70000,
                'gambar' => 'steak.jpg',
                'diskon' => '5%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD006',
                'nama' => 'Salad',
                'stok' => 70,
                'harga_jual' => 80000,
                'gambar' => 'salad.jpg',
                'diskon' => '10%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'DR003',
                'nama' => 'Smoothie',
                'stok' => 110,
                'harga_jual' => 75000,
                'gambar' => 'smoothie.jpg',
                'diskon' => '5%',
            ],
            [
                'kategori_produk_id' => random_int(1, 9),
                'kode' => 'FD007',
                'nama' => 'Fries',
                'stok' => 95,
                'harga_jual' => 60000,
                'gambar' => 'fries.jpg',
                'diskon' => '8%',
            ],
        ];

        // Insert the data into the produk table
        foreach ($products as $product) {
            DB::table('produks')->insert($product);
        }
    }
}
