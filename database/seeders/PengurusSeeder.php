<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penguruses')->insert([
            [
                'nomor_induk' => '10000001',
                'jabatan' => 'ketua_umum',
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'struktur_id' => 1,
            ],
            [
                'nomor_induk' => '10000002',
                'jabatan' => 'anggota_departemen',
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'struktur_id' => 3,
            ],
            [
                'nomor_induk' => '10000003',
                'jabatan' => 'anggota_departemen',
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb',
                'struktur_id' => 5,
            ],
            [
                'nomor_induk' => '10000004',
                'jabatan' => 'bendahara_umum',
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc',
                'struktur_id' => 1,
            ],
            [
                'nomor_induk' => '10000005',
                'jabatan' => 'wakil_ketua_umum',
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd',
                'struktur_id' => 1,
            ],
        ]);
    }
}
