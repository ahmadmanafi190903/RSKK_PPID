<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'nama' => 'Beranda',
                'url' => '#',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Profil',
                'url' => '#',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Publik',
                'url' => '#',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Formulir',
                'url' => '#',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
