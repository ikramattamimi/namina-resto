<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'status_pesanan_id' => rand(1, 5), // Memilih angka acak antara 1 hingga 5
                'id_pelanggan' => rand(1, 10), // Ganti dengan rentang ID pelanggan yang sesuai
                'kode' => 'PSN00' . $i,
                'no_meja' => rand(1, 10), // Memilih nomor meja secara acak
                'catatan' => 'Catatan pesanan ke-' . $i,
                'total_bayar' => rand(100000, 500000), // Total bayar acak antara 100,000 dan 500,000
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data ke tabel pesanans
        DB::table('pesanans')->insert($data);
    }
}
