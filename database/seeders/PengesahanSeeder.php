<?php

namespace Database\Seeders;

use App\Models\Pengesahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengesahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengesahan::factory(5)->create();
    }
}
