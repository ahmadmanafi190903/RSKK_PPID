<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tentang Kami',
                'url' => '#',
            ],
            [
                'nama' => 'Solusi IT',
                'url' => '#',
            ],
            [
                'nama' => 'Tim Kami',
                'url' => '#',
            ],
            [
                'nama' => 'Layanan Kami',
                'url' => '#',
            ],
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        DB::table('informasi')->insert($data);
    }
}
