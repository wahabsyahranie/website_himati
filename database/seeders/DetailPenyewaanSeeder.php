<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_penyewaans')->insert([
            [
                'penyewaan_id' => 1,
                'inventaris_id' => 1,
            ],
            [
                'penyewaan_id' => 1,
                'inventaris_id' => 3,
            ],
            [
                'penyewaan_id' => 1,
                'inventaris_id' => 1,
            ],
            [
                'penyewaan_id' => 2,
                'inventaris_id' => 3,
            ],
            [
                'penyewaan_id' => 3,
                'inventaris_id' => 3,
            ],
            [
                'penyewaan_id' => 3,
                'inventaris_id' => 4,
            ],
        ]);
    }
}
