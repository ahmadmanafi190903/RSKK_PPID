<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanKeberatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajuan_keberatan')->insert([
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'alamat' => 'Jl. Melati No. 10, Jakarta',
                'pekerjaan' => 'Pegawai Swasta',
                'no_telepon' => '081234567890',
                'tujuan_penggunaan_informasi' => 'Penyusunan laporan tahunan',
                'id_alasan_pengajuan' => 1,
                'id_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti@gmail.com',
                'alamat' => 'Jl. Mawar No. 23, Bandung',
                'pekerjaan' => 'Wiraswasta',
                'no_telepon' => '081298765432',
                'tujuan_penggunaan_informasi' => 'Analisis tren penjualan',
                'id_alasan_pengajuan' => 2,
                'id_status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Andi Wijaya',
                    'email' => 'andi@gmail.com',
                'alamat' => 'Jl. Anggrek No. 5, Surabaya',
                'pekerjaan' => 'PNS',
                'no_telepon' => '081234567891',
                'tujuan_penggunaan_informasi' => 'Optimalisasi stok barang',
                'id_alasan_pengajuan' => 3,
                'id_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Kurniawati',
                'email' => 'rina@gmail.com',
                'alamat' => 'Jl. Kenanga No. 12, Medan',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'no_telepon' => '081345678912',
                'tujuan_penggunaan_informasi' => 'Meningkatkan kualitas layanan',
                'id_alasan_pengajuan' => 4,
                'id_status' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Manafi',
                'email' => 'ahmad@gmail.com',
                'alamat' => 'Jl. Dahlia No. 7, Makassar',
                'pekerjaan' => 'Pengusaha',
                'no_telepon' => '081567890123',
                'tujuan_penggunaan_informasi' => 'Monitoring dan evaluasi proyek',
                'id_alasan_pengajuan' => 5,
                'id_status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
