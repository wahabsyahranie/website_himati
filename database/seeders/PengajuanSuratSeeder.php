<?php

namespace Database\Seeders;

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
                'tipe_surat' => 'SPm',
                'struktur_id' => 1,
                'nomor_surat' => '001/TI/HMJ/2025',
                'pengesahan_id' => 1,
                'nama_kegiatan' => 'Kuliah Perdana 2025',
                'tujuan_kegiatan' => 'Membangun kerjasama, kolaborasi, dan pengenalan awal jurusan kepada mahasiswa baru.',
                'tanggal_pelaksana' => '2025-06-10',
                'waktu_pelaksana' => '08:00:00',
                'tanggal_selesai' => '2025-06-10',
                'waktu_selesai' => '12:00:00',
                'tempat_pelaksana' => 'Aula Gedung Polnes',
                'nama_cp' => 'Wahab Ramadhan',
                'nomor_cp' => '081234567891',
                'slug' => 'peminjaman-kuliah-perdana',
                'status' => 'disetujui',
                'lampiran' => json_encode([
                    ['nama_barang' => 'sound system', 'jumlah' => 2],
                    ['nama_barang' => 'bendera polnes', 'jumlah' => 1],
                ]),
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],

            // Surat Izin Kegiatan (SIK)
            [
                'tipe_surat' => 'SIk',
                'struktur_id' => 2,
                'nomor_surat' => '002/TI/HMJ/2025',
                'pengesahan_id' => 2,
                'nama_kegiatan' => 'Workshop Keorganisasian',
                'tujuan_kegiatan' => 'Meningkatkan kapasitas pengurus dalam manajemen organisasi.',
                'tanggal_pelaksana' => '2025-07-05',
                'waktu_pelaksana' => '09:00:00',
                'tanggal_selesai' => '2025-07-05',
                'waktu_selesai' => '15:00:00',
                'tempat_pelaksana' => 'Ruang 201 Gedung TI',
                'nama_cp' => 'Aisyah Zahra',
                'nomor_cp' => '082112345678',
                'slug' => 'izin-workshop-keorganisasian',
                'status' => 'disetujui',
                'lampiran' => null,
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],

            // Surat Undangan (Und)
            [
                'tipe_surat' => 'Und',
                'struktur_id' => 3,
                'nomor_surat' => '003/TI/HMJ/2025',
                'pengesahan_id' => 3,
                'nama_kegiatan' => 'Diskusi Ormawa TI',
                'tujuan_kegiatan' => 'Membangun komunikasi dan sinergi antar organisasi mahasiswa jurusan TI.',
                'tanggal_pelaksana' => '2025-07-20',
                'waktu_pelaksana' => '13:00:00',
                'tanggal_selesai' => '2025-07-20',
                'waktu_selesai' => '15:00:00',
                'tempat_pelaksana' => 'Ruang 301 Gedung TI',
                'nama_cp' => 'Rizky Pratama',
                'nomor_cp' => '089876543210',
                'slug' => 'undangan-diskusi-ormawa-ti',
                'status' => 'disetujui',
                'lampiran' => json_encode([
                    ['nama_ormawa' => 'HIMA SI'],
                    ['nama_ormawa' => 'UKM Fotografi'],
                    ['nama_ormawa' => 'BEM TI'],
                ]),
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
        ]);
    }
}
