<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformasiPublik;
use App\Models\InformasiPublikDetail;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            SubmenuSeeder::class,
            QuestAnswerSeeder::class,
            SosmedSeeder::class,
            BackgroundImageSeeder::class,
            ReferencesSeeder::class,
            PengajuanKeberatanSeeder::class,
            PermohonanInformasiSeeder::class,
            CardSeeder::class,
            VideoSeeder::class,
            ContactSeeder::class,
            InformasiSeeder::class,
            BeritaSeeder::class,
            InfoServiceSeeder::class,
            InfoBannerSeeder::class
        ]);

        InformasiPublik::factory(50)->create();
        InformasiPublikDetail::factory(250)->recycle(InformasiPublik::all())->create();
        Rating::factory()->count(2)->create();
        // InformasiPublikDetail::factory()->count(100)->create();
    }
}
