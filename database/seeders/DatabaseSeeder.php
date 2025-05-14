<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PengaduanSeeder::class,
            PengurusSeeder::class,
            DepartemenSeeder::class,
            InventarisSeeder::class,
            OrmawaSeeder::class,
            KegiatanSeeder::class,
            PengesahanSeeder::class,
            PengajuanSuratSeeder::class,
            PenyewaanSeeder::class,
        ]);
    }
}
