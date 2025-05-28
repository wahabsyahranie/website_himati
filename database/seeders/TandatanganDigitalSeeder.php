<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TandatanganDigitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tandatangan_digitals')->insert([
            [
                'pengesahan_id' => 1,
                'pengajuan_surat_id' => 1,
                'nomor_registrasi' => 'REG-08258058',
                'status' => 'disetujui',
            ],
            [
                'pengesahan_id' => 3,
                'pengajuan_surat_id' => 1,
                'nomor_registrasi' => 'REG-0825807184',
                'status' => 'diproses',
            ],
            [
                'pengesahan_id' => 2,
                'pengajuan_surat_id' => 2,
                'nomor_registrasi' => 'REG-08258582-5',
                'status' => 'disetujui',
            ],
            [
                'pengesahan_id' => 4,
                'pengajuan_surat_id' => 2,
                'nomor_registrasi' => 'REG-0825052350',
                'status' => 'diproses',
            ],
            [
                'pengesahan_id' => 2,
                'pengajuan_surat_id' => 3,
                'nomor_registrasi' => 'REG-0825801590',
                'status' => 'disetujui',
            ],
            [
                'pengesahan_id' => 5,
                'pengajuan_surat_id' => 3,
                'nomor_registrasi' => 'REG-0825805320',
                'status' => 'diproses',
            ],
            [
                'pengesahan_id' => 1,
                'pengajuan_surat_id' => 4,
                'nomor_registrasi' => 'REG-08258052757',
                'status' => 'disetujui',
            ],
            [
                'pengesahan_id' => 5,
                'pengajuan_surat_id' => 4,
                'nomor_registrasi' => 'REG-082580777297',
                'status' => 'diproses',
            ],
        ]);
    }
}
