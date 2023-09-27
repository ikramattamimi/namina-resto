<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produks')->insert([
            [
                'dapur_id' => 1,
                'nama' => 'Coffee by ToastNgopi',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 2,
                'nama' => 'Cemilan',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Food by ToastNgopi',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Ikan segar',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Menu Utama',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Minuman',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Rokok',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 2,
                'nama' => 'Snack',
                'gambar' => 'makanan.jpg'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Lain lain',
                'gambar' => 'makanan.jpg'
            ],
        ]);
    }
}
