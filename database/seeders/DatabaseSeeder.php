<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformasiPublik;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            MemperolehInformasiSeeder::class,
            MendapatkanSalinanInformasiSeeder::class,
            StatusSeeder::class,
            AlasanPengajuanSeeder::class,
            PermohonanInformasiSeeder::class,
            PengajuanKeberatanSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            MenuSeeder::class,
            SubmenuSeeder::class
        ]);

        InformasiPublik::factory()->count(50)->create();
        Rating::factory()->count(2)->create();
    }
}
