<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['status' => 'dikirim'],
            ['status' => 'diproses'],
            ['status' => 'ditolak'],
            ['status' => 'diterima'],
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }
    
        DB::table('status')->insert($data);
    }
}
