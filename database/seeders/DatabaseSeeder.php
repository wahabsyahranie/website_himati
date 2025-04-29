<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'wahab',
            'email' => 'wahab@polnes.com',
            'password' => '123',
        ]);

        $this->call([
            OrmawaSeeder::class,
            InventarisSeeder::class,
            MahasiswaSeeder::class,
        ]);
    }
}
