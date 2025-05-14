<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaduans')->insert([
            [
                'judul' => 'Kuliah Perdana Mahasiswa TI 2023',
                'deskripsi' => 'Acara pembukaan resmi tahun ajaran baru untuk mahasiswa jurusan Teknologi Informasi.',
                'tujuan' => 'jurusan',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9', // ID Wahab
                'slug' => 'kuliah-perdana-mahasiswa-ti-2023',
                'gambar' => 'pengaduan/pengaduan-spzttRHXvNRpnXY78iz2HZGxK2Qky47A50djUzKq.png',
            ],
            [
                'judul' => 'Pelatihan Dosen TI Mengenai AI',
                'deskripsi' => 'Kegiatan pelatihan untuk dosen mengenai pengembangan kecerdasan buatan dalam kurikulum.',
                'tujuan' => 'dosen',
                'user_id' => '01jv7pqks6n8zz8psysam0ewka', // ID Eva
                'slug' => 'pelatihan-dosen-ti-mengenai-ai',
                'gambar' => 'pengaduan/pengaduan-spzttRHXvNRpnXY78iz2HZGxK2Qky47A50djUzKq.png',
            ],
            [
                'judul' => 'Rapat Koordinasi HMJ TI',
                'deskripsi' => 'Rapat bulanan HMJ TI membahas program kerja semester depan.',
                'tujuan' => 'hmj ti',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkb', // ID Rizki
                'slug' => 'rapat-koordinasi-hmj-ti',
                'gambar' => 'pengaduan/pengaduan-spzttRHXvNRpnXY78iz2HZGxK2Qky47A50djUzKq.png',
            ],
            [
                'judul' => 'Lomba Desain UI/UX untuk Mahasiswa',
                'deskripsi' => 'Ajang kompetisi desain UI/UX untuk seluruh mahasiswa TI sebagai sarana kreativitas.',
                'tujuan' => 'jurusan',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc', // ID Dewi
                'slug' => 'lomba-desain-uiux-untuk-mahasiswa',
                'gambar' => 'pengaduan/pengaduan-spzttRHXvNRpnXY78iz2HZGxK2Qky47A50djUzKq.png',
            ],
            [
                'judul' => 'Seminar Keprofesian Dosen TI',
                'deskripsi' => 'Seminar untuk dosen-dosen TI terkait penguatan peran akademisi di era digital.',
                'tujuan' => 'dosen',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd', // ID Fajar
                'slug' => 'seminar-keprofesian-dosen-ti',
                'gambar' => 'pengaduan/pengaduan-spzttRHXvNRpnXY78iz2HZGxK2Qky47A50djUzKq.png',
            ],
        ]);
    }
}
