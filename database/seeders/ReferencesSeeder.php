<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [                'slug' => 'status',
                'nama' => 'ditolak' 
            ],
            [                'slug' => 'status',
                'nama' => 'dikirim' 
            ],
            [                'slug' => 'status',
                'nama' => 'diproses' 
            ],
            [                'slug' => 'status',
                'nama' => 'diterima' 
            ],
            [                'slug' => 'memperoleh',
                'nama' => 'melihat/membaca/mendengar' 
            ],
            [                'slug' => 'memperoleh',
                'nama' => 'mendapatkan salinan informasi sofcopy' 
            ],
            [                'slug' => 'memperoleh',
                'nama' => 'mendapatkan salinan informasi hardcopy' 
            ],
            [                'slug' => 'mendapat',
                'nama' => 'mengambil langsung' 
            ],
            [                'slug' => 'mendapat',
                'nama' => 'email' 
            ],
            [                'slug' => 'pengajuan',
                'nama' => 'permohonan informasi ditolak' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'informasi berkala tidak disediakan ' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'permintaan informasi tidak ditanggapi' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'ermintaan informasi ditanggapi tidak sebagaimana yang diminta' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'permintaan informasi tidak dipenuhi' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'biaya yang dikenakan tidak wajar' 
            ],
            [
                'slug' => 'pengajuan',
                'nama' => 'informasi disampaikan melebihi jangka waktu yang ditentukan' 
            ],
            [
                'slug' => 'informasi',
                'nama' => 'Berkala' 
            ],
            [
                'slug' => 'informasi',
                'nama' => 'Serta Merta' 
            ],
            [
                'slug' => 'informasi',
                'nama' => 'Setiap Saat' 
            ],
            [
                'slug' => 'informasi',
                'nama' => 'Dikecualikan' 
            ],
            [
                'slug' => 'penyimpanan',
                'nama' => 'selama masih berlaku' 
            ],
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        DB::table('references')->insert($data);
    }
}
