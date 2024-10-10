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
                'url' => '/informasi-publik/13',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Serta Merta',
                'url' => '/informasi-publik/14',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Setiap Saat',
                'url' => '/informasi-publik/15',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Informasi Dikecualikan',
                'url' => '/informasi-publik/16',
                'menu_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Permohonan Informasi',
                'url' => '/permohonan',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengajuan Keberatan',
                'url' => '/pengajuan',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Riwayat Permohonan',
                'url' => '/riwayat',
                'menu_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
