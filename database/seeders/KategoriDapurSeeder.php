<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDapurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_dapurs')->insert([
            [
                'nama' => 'main',
            ],
            [
                'nama' => 'cemilan',
            ],
            [
                'nama' => 'bar',
            ],
        ]);
    }
}
