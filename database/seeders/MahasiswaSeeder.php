<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nim' => '236152003',
                'tahun_masuk' => '2023',
                'prodi' => 'ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nim' => '236152004',
                'tahun_masuk' => '2023',
                'prodi' => 'ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
            ],
            [
                'nim' => '236152005',
                'tahun_masuk' => '2023',
                'prodi' => 'ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb',
            ],
            [
                'nim' => '236152006',
                'tahun_masuk' => '2023',
                'prodi' => 'ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc',
            ],
            [
                'nim' => '236152007',
                'tahun_masuk' => '2023',
                'prodi' => 'ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd',
            ],
        ]);
    }
}
