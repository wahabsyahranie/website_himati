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
                'mahasiswa_id' => 1,
                'struktur_id' => 1,
            ],
            [
                'nomor_induk' => '10000002',
                'jabatan' => 'anggota_departemen',
                'periode' => '2024',
                'mahasiswa_id' => 2,
                'struktur_id' => 3,
            ],
            [
                'nomor_induk' => '10000003',
                'jabatan' => 'anggota_departemen',
                'periode' => '2024',
                'mahasiswa_id' => 3,
                'struktur_id' => 5,
            ],
            [
                'nomor_induk' => '10000004',
                'jabatan' => 'bendahara_umum',
                'periode' => '2024',
                'mahasiswa_id' => 4,
                'struktur_id' => 1,
            ],
            [
                'nomor_induk' => '10000005',
                'jabatan' => 'wakil_ketua_umum',
                'periode' => '2024',
                'mahasiswa_id' => 5,
                'struktur_id' => 1,
            ],
        ]);
    }
}
