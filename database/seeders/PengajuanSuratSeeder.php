<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\PengajuanSurat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengajuanSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = '01jv7pqks6n8zz8psysam0ewk9';

        $detailSurat = [
            'lampiran' => [
                [
                    'nim' => '23646184',
                    'nama' => 'abizar',
                    'kelas' => null,
                    'no_hp' => '03850850',
                    'prodi' => 'teknk',
                    'jumlah' => null,
                    'jabatan' => 'wakil ketua'
                ],
                [
                    'nim' => '39551850',
                    'nama' => 'erte',
                    'kelas' => null,
                    'no_hp' => '082580528',
                    'prodi' => 'teknik informatika',
                    'jumlah' => null,
                    'jabatan' => 'staff'
                ],
            ]
        ];

        for ($i = 1; $i <= 5; $i++) {
            DB::table('pengajuan_surats')->insert([
                'nomor_surat' => "00$i/ABC/2025",
                'slug' => Str::slug("surat ke $i"),
                'tipe_surat' => 'Pengajuan',
                'struktur_id' => 1, // pastikan id ini ada
                'pengesahan_id' => 1, // pastikan id ini ada
                'tandatangan' => null,
                'status' => 'ditinjau',
                'user_id' => $userId,
                'detail_surat' => json_encode($detailSurat),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
