<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekenings')->insert([
            [
                'nama' => 'BCA',
                'nomor' => 23438384,
                'saldo' => 30000000
            ],
            [
                'nama' => 'BRI',
                'nomor' => 99345720458725,
                'saldo' => 86600000
            ],
        ]);
    }
}
