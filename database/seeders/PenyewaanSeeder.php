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
                'ormawa_id' => 1,
                'pengurangan_stok_at' => null,
                'pengembalian_stok_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal_pinjam' => '2025-06-05',
                'tanggal_kembali' => '2025-06-07',
                'status' => 'diproses',
                'ormawa_id' => 2,
                'pengurangan_stok_at' => now(),
                'pengembalian_stok_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal_pinjam' => '2025-06-10',
                'tanggal_kembali' => '2025-06-12',
                'status' => 'disetujui',
                'ormawa_id' => 3,
                'pengurangan_stok_at' => now(),
                'pengembalian_stok_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal_pinjam' => '2025-06-15',
                'tanggal_kembali' => null,
                'status' => 'ditolak',
                'ormawa_id' => 4,
                'pengurangan_stok_at' => null,
                'pengembalian_stok_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal_pinjam' => '2025-06-20',
                'tanggal_kembali' => '2025-06-22',
                'status' => 'selesai',
                'ormawa_id' => 5,
                'pengurangan_stok_at' => now()->subDays(2),
                'pengembalian_stok_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
