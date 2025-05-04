<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class PengesahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->jobTitle(),
            'bidang' => $this->faker->jobTitle(),
            'prioritas' => $this->faker->numerify('#'),
            'type_nomor_induk' => $this->faker->name(),
            'nomor_induk' => $this->faker->unique()->numerify('##########'),
            'nomor_telepon' => $this->faker->phoneNumber(),
        ];
    }
}
