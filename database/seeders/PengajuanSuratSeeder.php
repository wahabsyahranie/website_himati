<?php

namespace Database\Seeders;

use App\Models\PengajuanSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengajuanSurat::factory(10)->create();
    }
}
