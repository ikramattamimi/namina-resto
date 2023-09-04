<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myData = [
            [
                'nama' => 'Jonas',
                'no_hp' => '082333223322', // Unik?
            ],
            [
                'nama' => 'Katharina',
                'no_hp' => '082333223234',
            ],
            [
                'nama' => 'Martha',
                'no_hp' => '082332498322',
            ],
            [
                'nama' => 'Mikkel',
                'no_hp' => '089256393743',
            ],
            [
                'nama' => 'Ulrich',
                'no_hp' => '082348526349',
            ]
        ];

        DB::table('pelanggans')->insert($myData);
    }
}
