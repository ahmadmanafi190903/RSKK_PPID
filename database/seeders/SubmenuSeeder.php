<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('submenus')->insert([
            [
                'nama' => 'Informasi Berkala',
                'url' => '#',
                'status' => '1',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Setiap Saat',
                'url' => '#',
                'status' => '1',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Serta Merta',
                'url' => '#',
                'status' => '1',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Dikecualikan',
                'url' => '#',
                'status' => '1',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Permohonan Informasi',
                'url' => '/permohonan',
                'status' => '1',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengajuan Keberatan',
                'url' => '/pengajuan',
                'status' => '1',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Riwayat Permohonan',
                'url' => '/riwayat',
                'status' => '1',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
