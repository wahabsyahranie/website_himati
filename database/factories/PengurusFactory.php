<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengurus>
 */
class PengurusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_induk' => fake()->randomNumber(8),
            'jabatan' => fake()->randomElement(['Ketua Umum', 'Wakil Ketua Umum', 'Sekretaris Umum', 'Bendahara Umum']),
            'periode' => fake()->year(),
            'mahasiswa_id' => Mahasiswa::factory(),
        ];
    }
}
