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
                'nama' => 'Cash',
                'saldo' => 0
            ],
            [
                'nama' => 'Debit',
                'saldo' => 0
            ],
            [
                'nama' => 'Bahan Baku',
                'saldo' => 0
            ],
        ]);
    }
}
