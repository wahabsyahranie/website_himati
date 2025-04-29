<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->randomNumber(8),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'tahun_masuk' => fake()->year(),
            'nomor_telepon' => fake()->phoneNumber(),
            'prodi' => fake()->randomElement(['TI', 'TK', 'TIM', 'TRK']),
        ];
    }
}
