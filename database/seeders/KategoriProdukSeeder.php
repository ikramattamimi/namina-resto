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
                'gambar' => 'drink-toastngopi.png'
            ],
            [
                'dapur_id' => 2,
                'nama' => 'Cemilan',
                'gambar' => 'cemilan.png'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Food by ToastNgopi',
                'gambar' => 'food-toastngopi.png'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Ikan segar',
                'gambar' => 'ikan.png'
            ],
            [
                'dapur_id' => 1,
                'nama' => 'Menu Utama',
                'gambar' => 'makanan.png'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Minuman',
                'gambar' => 'minuman.png'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Rokok',
                'gambar' => 'rokok.png'
            ],
            [
                'dapur_id' => 2,
                'nama' => 'Snack',
                'gambar' => 'makanan.png'
            ],
            [
                'dapur_id' => 3,
                'nama' => 'Lain lain',
                'gambar' => 'lainnya.png'
            ],
        ]);
    }
}
