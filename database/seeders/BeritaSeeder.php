<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'image/RSKK-Jabar1.jpg',
                'judul' => 'Technology allows profit to serve the community',
                'deskripsi' => 'We re going to be pulling up to the hotel in just a few minutes. Please sit back and enjoy the view of the ocean',
                'url' => '#',
            ],
            [
                'image' => 'image/RSKK-Jabar2.jpg',
                'judul' => 'Tips to Lowering Freight Shipping Costs',
                'deskripsi' => 'We re going to be pulling up to the hotel in just a few minutes. Please sit back and enjoy the view of the ocean',
                'url' => '#',
            ],
            [
                'image' => 'image/RSKK-Jabar3.jpg',
                'judul' => '10 Best IT Technology Solution Agency 2024',
                'deskripsi' => 'We re going to be pulling up to the hotel in just a few minutes. Please sit back and enjoy the view of the ocean',
                'url' => '#',
            ],
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        DB::table('berita')->insert($data);
    }
}
