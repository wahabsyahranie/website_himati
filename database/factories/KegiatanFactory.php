<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'tanggal_pelaksana' => fake()->dateTime(),
            'status' => 0,
            'jenis_kegiatan' => fake()->randomElement(['rapat umum', 'rapat panitia', 'proker primer', 'proker sekunder']),
        ];
    }
}
