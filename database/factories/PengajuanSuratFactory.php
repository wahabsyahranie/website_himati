<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
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
            'type' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            'kota' => fake()->city(),
            'tanggal_pembuatan' => fake()->date(),
            'nomor_surat' => fake()->randomDigit(),
            'lampiran' => '-',
            'perihal' => fake()->word(),
            'Tertuju' => fake()->word(),
            'isi' => fake()->text(),
            'tanggal_pelaksana' => fake()->date(),
            'waktu_pelaksana' => fake()->time(),
            'tempat_pelaksana' => fake()->word(),
            'penutup' => fake()->paragraph(),
            'nama_cp' => fake()->name(),
            'nomor_cp' => fake()->randomNumber(),
            'slug' => fake()->slug(),
            'mahasiswa_id' => Mahasiswa::factory(),
        ];
    }
}
