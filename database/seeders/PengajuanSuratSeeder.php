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
        DB::table('pengajuan_surats')->insert([
            [
                'nomor_surat' => '1/SIk/HIMA-TI/V/2025',
                'slug' => '1-SIk-HIMA-TI-V-2025',
                'tipe_surat' => 'SIk',
                'struktur_id' => 1,
                'tujuan_surat_id' => 1,
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'detail_surat' => json_encode([
                    'nama_cp' => 'Nia',
                    'nomor_cp' => '08085080',
                    'nama_kegiatan' => 'Kulper',
                    'tujuan_kegiatan' => 'Mempresentasikan dan menyuarakan dan mempersatukan mahasiswa jurusan teknologi informasi',
                    'tanggal_pelaksana' => '2025-05-02',
                    'waktu_pelaksana' => '01:00:00',
                    'tempat_pelaksana' => 'Auditorium Polnes',
                    'tanggal_selesai' => '2025-05-09',
                    'waktu_selesai' => '02:00:00'
                ]),
            ],
            [
                'nomor_surat' => '2/SPm/Kpm/HIMA-TI/V/2025',
                'slug' => '2-SPm-Kpm-HIMA-TI-V-2025',
                'tipe_surat' => 'SPm',
                'struktur_id' => 3,
                'tujuan_surat_id' => 2,
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'detail_surat' => json_encode([
                    'nama_cp' => 'Nia',
                    'nomor_cp' => '08085080',
                    'nama_kegiatan' => 'Kulper',
                    'tujuan_kegiatan' => 'Mempresentasikan dan menyuarakan dan mempersatukan mahasiswa jurusan teknologi informasi',
                    'tanggal_pelaksana' => '2025-05-02',
                    'waktu_pelaksana' => '01:00:00',
                    'tempat_pelaksana' => 'Auditorium Polnes',
                    'tanggal_selesai' => '2025-05-09',
                    'waktu_selesai' => '02:00:00',
                    'lampiran' => [
                        [
                            'nim' => null,
                            'nama' => 'Sound System',
                            'kelas' => null,
                            'no_hp' => null,
                            'prodi' => null,
                            'jumlah' => '2',
                            'jabatan' => null
                        ],
                        [
                            'nim' => null,
                            'nama' => 'Bendera Polnes',
                            'kelas' => null,
                            'no_hp' => null,
                            'prodi' => null,
                            'jumlah' => '1',
                            'jabatan' => null
                        ]
                    ]
                ])
            ],
            [
                'nomor_surat' => '3/Und/Agm/HIMA-TI/V/2025',
                'slug' => '3-Und-Agm-HIMA-TI-V-2025',
                'tipe_surat' => 'Und',
                'struktur_id' => 2,
                'tujuan_surat_id' => 3,
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'detail_surat' => json_encode([
                    'nomor_surat' => '1/SIk/HIMA-TI/V/2025',
                    'slug' => '1-SIk-HIMA-TI-V-2025',
                    'tipe_surat' => 'SIk',
                    'struktur_id' => 1,
                    'pengesahan_id' => 5,
                    'status' => 'disetujui',
                    'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                    'detail_surat' => [
                        'nama_cp' => 'Nia',
                        'nomor_cp' => '08085080',
                        'nama_kegiatan' => 'Kulper',
                        'tujuan_kegiatan' => 'memperastukan dan memperkukuhkan para mahasiswa',
                        'tanggal_pelaksana' => '2025-05-02',
                        'waktu_pelaksana' => '01:00:00',
                        'tempat_pelaksana' => 'Auditorium Polnes',
                        'tanggal_selesai' => '2025-05-09',
                        'waktu_selesai' => '02:00:00',
                        'lampiran' => [
                            [
                                'nim' => null,
                                'nama' => 'UKM Jurnalistik',
                                'kelas' => null,
                                'no_hp' => null,
                                'prodi' => null,
                                'jumlah' => '2',
                                'jabatan' => null
                            ],
                            [
                                'nim' => null,
                                'nama' => 'BEM Polnes',
                                'kelas' => null,
                                'no_hp' => null,
                                'prodi' => null,
                                'jumlah' => '1',
                                'jabatan' => null
                            ]
                        ]
                    ],
                ])
            ],
            [
                'nomor_surat' => '4/Spn/HIMA-TI/V/2025',
                'slug' => '4-Spn-HIMA-TI-V-2025',
                'tipe_surat' => 'Spn',
                'struktur_id' => 2,
                'tujuan_surat_id' => 4,
                'status' => 'disetujui',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'detail_surat' => json_encode([
                    'nomor_surat' => '1/SIk/HIMA-TI/V/2025',
                    'slug' => '1-SIk-HIMA-TI-V-2025',
                    'tipe_surat' => 'SIk',
                    'struktur_id' => 1,
                    'pengesahan_id' => 5,
                    'status' => 'disetujui',
                    'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                    'detail_surat' => [
                        'lampiran' => [
                            [
                                'nim' => '236152003',
                                'nama' => 'Wahab Syahranie',
                                'kelas' => null,
                                'no_hp' => null,
                                'prodi' => 'Teknik Informatika',
                                'jumlah' => '2',
                                'jabatan' => 'Ketua Umum'
                            ],
                            [
                                'nim' => '236512000',
                                'nama' => 'Abbizar Mulia',
                                'kelas' => null,
                                'no_hp' => null,
                                'prodi' => 'Teknik Komputer',
                                'jumlah' => '1',
                                'jabatan' => 'Wakil Ketua Umum'
                            ]
                        ]
                    ],
                ])
            ],
        ]);
    }
}
