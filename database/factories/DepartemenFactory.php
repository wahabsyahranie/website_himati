<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departemen>
 */
class DepartemenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => fake()->randomElement(['BPI', 'Kpm', 'Agm', 'Min', 'Hum', 'Min', 'Dan']),
            'nama_lengkap' => fake()->name(),
            'nama_pendek' => fake()->name(),
            'deskripsi' => fake()->name(),
            'prioritas' => 1,
        ];
    }
}
