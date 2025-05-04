<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Pengesahan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanSurat>
 */
class PengajuanSuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['SIk', 'SPm', 'ST', 'Spe', 'Und',
            'Peng', 'ST']),
            'departemen' => fake()->randomElement(['Agm', 'Kpm', 'Min', 'Hum', 'Rt', 'Dan']),
            'nomor_surat' => fake()->randomDigit(),
            'lampiran' => '-',
            'perihal' => fake()->word(),
            'pengesahan_id' => Pengesahan::factory(),
            'isi' => fake()->text(),
            'tanggal_pelaksana' => fake()->date(),
            'waktu_pelaksana' => fake()->time(),
            'tanggal_selesai' => fake()->date(),
            'waktu_selesai' => fake()->time(),
            'tempat_pelaksana' => fake()->word(),
            'nama_cp' => fake()->name(),
            'nomor_cp' => fake()->randomNumber(),
            'slug' => fake()->slug(),
            'mahasiswa_id' => Mahasiswa::factory(),
        ];
    }
}
