<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penyewaans')->insert([
            [
                'tanggal_pinjam' => '2025-06-01',
                'tanggal_kembali' => '2025-06-03',
                'status' => 'ditinjau',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'nomor_pesanan' => 'PE-275755705',
            ],
            [
                'tanggal_pinjam' => '2025-06-05',
                'tanggal_kembali' => '2025-06-07',
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'nomor_pesanan' => 'PE-275755705',
            ],
            [
                'tanggal_pinjam' => '2025-06-10',
                'tanggal_kembali' => '2025-06-12',
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb',
                'nomor_pesanan' => 'PE-275755705',
            ],
        ]);
    }
}
