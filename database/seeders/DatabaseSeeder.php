<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformasiPublik;
use App\Models\InformasiPublikDetail;
use App\Models\Kategori;
use App\Models\KategoriInformasi;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            // MemperolehInformasiSeeder::class,
            // MendapatkanSalinanInformasiSeeder::class,
            StatusSeeder::class,
            // AlasanPengajuanSeeder::class,
            UserSeeder::class,
            // KategoriSeeder::class,
            MenuSeeder::class,
            SubmenuSeeder::class,
            QuestAnswarSeeder::class,
            SosmedSeeder::class,
            BackgroundImageSeeder::class,
            ReferencesSeeder::class,
            PengajuanKeberatanSeeder::class,
            PermohonanInformasiSeeder::class,
        ]);

        InformasiPublik::factory(50)->create();
        InformasiPublikDetail::factory(250)->recycle(InformasiPublik::all())->create();
        Rating::factory()->count(2)->create();
        // InformasiPublikDetail::factory()->count(100)->create();
    }
}
