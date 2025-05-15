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
                'type' => 'SIk',
                'struktur_id' => 1,
                'nomor_surat' => '001/TI/HMJ/2025',
                'lampiran' => '-',
                'perihal' => 'Pengajuan Izin Seminar Teknologi',
                'pengesahan_id' => 1,
                'isi' => 'Pengajuan izin kegiatan seminar teknologi informasi untuk mahasiswa TI angkatan 2023.',
                'tanggal_pelaksana' => '2025-06-10',
                'waktu_pelaksana' => '08:00:00',
                'tanggal_selesai' => '2025-06-10',
                'waktu_selesai' => '12:00:00',
                'tempat_pelaksana' => 'Aula Gedung Polnes',
                'nama_cp' => 'Wahab Ramadhan',
                'nomor_cp' => '081234567891',
                'slug' => 'izin-seminar-teknologi',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9', // Wahab
            ],
            [
                'type' => 'SPm',
                'struktur_id' => 2,
                'nomor_surat' => '002/TI/HMJ/2025',
                'lampiran' => '-',
                'perihal' => 'Permohonan Tempat Kegiatan Rapat',
                'pengesahan_id' => 2,
                'isi' => 'Kami bermaksud mengajukan pemakaian ruang sidang untuk kegiatan rapat panitia kegiatan besar HMJ.',
                'tanggal_pelaksana' => '2025-06-11',
                'waktu_pelaksana' => '13:00:00',
                'tanggal_selesai' => '2025-06-11',
                'waktu_selesai' => '15:00:00',
                'tempat_pelaksana' => 'Ruang Rapat TI',
                'nama_cp' => 'Dewi Lestari',
                'nomor_cp' => '081345678902',
                'slug' => 'permohonan-tempat-rapat',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc', // Dewi
            ],
            [
                'type' => 'ST',
                'struktur_id' => 3,
                'nomor_surat' => '003/TI/HMJ/2025',
                'lampiran' => '-',
                'perihal' => 'Surat Tugas Delegasi Workshop',
                'pengesahan_id' => 3,
                'isi' => 'Menugaskan 5 mahasiswa untuk mengikuti workshop desain UI/UX tingkat nasional di Surabaya.',
                'tanggal_pelaksana' => '2025-06-15',
                'waktu_pelaksana' => '07:00:00',
                'tanggal_selesai' => '2025-06-17',
                'waktu_selesai' => '17:00:00',
                'tempat_pelaksana' => 'Universitas Negeri Surabaya',
                'nama_cp' => 'Rudi Santoso',
                'nomor_cp' => '081456789013',
                'slug' => 'surat-tugas-workshop',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb', // Rizki
            ],
            [
                'type' => 'Und',
                'struktur_id' => 4,
                'nomor_surat' => '004/TI/HMJ/2025',
                'lampiran' => '-',
                'perihal' => 'Undangan Rapat Koordinasi Divisi',
                'pengesahan_id' => 4,
                'isi' => 'Undangan kepada seluruh divisi untuk hadir dalam rapat koordinasi pada tanggal 20 Juni 2025.',
                'tanggal_pelaksana' => '2025-06-20',
                'waktu_pelaksana' => '10:00:00',
                'tanggal_selesai' => '2025-06-20',
                'waktu_selesai' => '12:00:00',
                'tempat_pelaksana' => 'Ruang 302 Gedung TI',
                'nama_cp' => 'Siti Maulida',
                'nomor_cp' => '081567890124',
                'slug' => 'undangan-rapat-divisi',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd', // Fajar
            ],
            [
                'type' => 'Spe',
                'struktur_id' => 5,
                'nomor_surat' => '005/TI/HMJ/2025',
                'lampiran' => '-',
                'perihal' => 'Permohonan Pengesahan Proposal Kegiatan',
                'pengesahan_id' => 5,
                'isi' => 'Proposal kegiatan Entrepreneur Day 2025 diajukan untuk mendapatkan pengesahan dari pihak jurusan.',
                'tanggal_pelaksana' => '2025-07-01',
                'waktu_pelaksana' => '08:00:00',
                'tanggal_selesai' => '2025-07-03',
                'waktu_selesai' => '16:00:00',
                'tempat_pelaksana' => 'Lapangan Polnes',
                'nama_cp' => 'Ilham Pratama',
                'nomor_cp' => '081678901235',
                'slug' => 'proposal-entrepreneur-day',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka', // Eva
            ],
        ]);
    }
}
