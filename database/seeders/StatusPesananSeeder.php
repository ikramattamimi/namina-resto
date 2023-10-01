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
    }
}
