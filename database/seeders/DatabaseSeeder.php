<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\StrukturSeeder;

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
            StrukturSeeder::class,
            MahasiswaSeeder::class,
            PengurusSeeder::class,
            InventarisSeeder::class,
            KegiatanSeeder::class,
            PengesahanSeeder::class,
            ReviewSeeder::class,
            // PengajuanSuratSeeder::class,
            PenyewaanSeeder::class,
            ShieldSeeder::class,
        ]);
    }
}
