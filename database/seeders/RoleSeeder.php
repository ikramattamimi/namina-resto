<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->insert([
            'nama' => 'admin',
        ]);

        DB::table('role_users')->insert([
            'nama' => 'kasir',
        ]);

        DB::table('role_users')->insert([
            'nama' => 'staff gudang',
        ]);
    }
}
