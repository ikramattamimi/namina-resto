<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pesanans')->insert([
<<<<<<< HEAD
            [
                'nama' => 'Pending',
            ],
            [
                'nama' => 'Proses',
            ],
            [
                'nama' => 'Dibayar',
            ],
            [
                'nama' => 'Dibatalkan',
            ],
            [
                'nama' => 'Invoice',
            ],
=======
            'nama' => "Pending",
        ]);

        DB::table('status_pesanans')->insert([
            'nama' => "Proses",
        ]);

        DB::table('status_pesanans')->insert([
            'nama' => "Dibayar",
        ]);

        DB::table('status_pesanans')->insert([
            'nama' => "Dibatalkan",
        ]);

        DB::table('status_pesanans')->insert([
            'nama' => "Invoice",
>>>>>>> wahid2
        ]);
    }
}
