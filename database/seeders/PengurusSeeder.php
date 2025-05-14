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
                'jabatan' => 'ketua umum', // Menggunakan jabatan sesuai enum migrasi
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nomor_induk' => '10000002',
                'jabatan' => 'wakil ketua umum', // Menggunakan jabatan sesuai enum migrasi
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
            ],
            [
                'nomor_induk' => '10000003',
                'jabatan' => 'sekretaris umum', // Menggunakan jabatan sesuai enum migrasi
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb',
            ],
            [
                'nomor_induk' => '10000004',
                'jabatan' => 'bendahara umum', // Menggunakan jabatan sesuai enum migrasi
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc',
            ],
            [
                'nomor_induk' => '10000005',
                'jabatan' => 'kepala departemen', // Menggunakan jabatan sesuai enum migrasi
                'periode' => '2024',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd',
            ],
        ]);
    }
}
