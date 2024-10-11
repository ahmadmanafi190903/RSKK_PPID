<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'icon' => '<i class="fal fa-map-marker-alt"></i>',
                'address' => '94 Roa Malaka, West Jakarta City, UK',
            ],
            [
                'icon' => '<i class="fal fa-phone"></i>',
                'address' => '(022)7798778',
            ],
            [
                'icon' => '<i class="fal fa-envelope"></i>',
                'address' => 'rskk@jabarprov.go.id',
            ]
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        DB::table('contacts')->insert($data);
    }
}
