<?php

namespace Database\Factories;

use App\Models\KategoriInformasi;
use Database\Seeders\KategoriSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformasiPublik>
 */
class InformasiPublikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ringkasan_informasi' => $this->faker->sentence(10),
            'pejabat_penguasa_informasi' => $this->faker->name,
            'penanggung_jawab_informasi' => $this->faker->name,
            'bentuk_informasi_cetak' => $this->faker->boolean,
            'bentuk_informasi_digital' => $this->faker->boolean,
            'jangka_waktu_penyimpanan' => $this->faker->randomElement(['1 tahun', '5 tahun', '10 tahun', 'Permanen']),
            'kategori_informasi_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
