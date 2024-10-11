<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'icon' => 'icons/info_berkala.png',
                'judul' => 'Informasi Berkala',
                'deskripsi' => 'Informasi yang rutin diterbitkan oleh RSUD Kesehatan Kerja Provinsi Jawa Barat. Termasuk laporan tahunan, rencana strategis, dan kegiatan rutin lainnya.',
                'url' => '/informasi-publik/13',
            ],
            [
                'icon' => 'icons/info_serta_merta.png',
                'judul' => 'Informasi Serta Merta',
                'deskripsi' => 'Informasi yang harus segera disampaikan kepada masyarakat, terutama dalam situasi darurat atau bencana yang memerlukan tindakan segera.',
                'url' => '/informasi-publik/14',
            ],
            [
                'icon' => 'icons/info_setiap_saat.png',
                'judul' => 'Informasi Setiap Saat',
                'deskripsi' => 'Informasi yang selalu tersedia dan dapat diakses oleh masyarakat, seperti peraturan, prosedur pelayanan, dan tarif layanan kesehatan.   ',
                'url' => '/informasi-publik/15',
            ],
            [
                'icon' => 'icons/info_dikecualikan.png',
                'judul' => 'Informasi Dikecualikan',
                'deskripsi' => 'Informasi yang tidak dapat disebarluaskan secara umum sesuai dengan ketentuan perundang-undangan, seperti data pasien dan informasi yang bersifat rahasia.',
                'url' => '/informasi-publik/16',
            ],
        ];
    
        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }

        DB::table('cards')->insert($data);
    }
}
