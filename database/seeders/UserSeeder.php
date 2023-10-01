<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'nama' => 'Jonas',
                'username' => 'jonas',
                'password' => Hash::make('jonas123'),
            ],
            [
                'role_id' => 1,
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
            ],
            [
                'role_id' => 2,
                'nama' => 'Kasir',
                'username' => 'kasir',
                'password' => Hash::make('kasir123'),
            ],
            [
                'role_id' => 3,
                'nama' => 'Gudang',
                'username' => 'gudang',
                'password' => Hash::make('gudang123'),
            ],
        ]);
    }
}
