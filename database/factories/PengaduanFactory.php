<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->name(),
            'deskripsi' => fake()->text(),
            'tujuan' => fake()->randomElement(['jurusan', 'dosen', 'hmj ti']),
            'mahasiswa_id' => Mahasiswa::factory(),
        ];
    }
}
