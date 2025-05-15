<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('strukturs')->insert([
            [
                'kode' => 'BPI',
                'nama_pendek' => 'BPI',
                'nama_lengkap' => 'Badan Pengurus Inti',
                'deskripsi' => 'Badan Pengurus Inti merupakan struktur inti organisasi yang bertanggung jawab dalam mengkoordinasikan seluruh kegiatan dan departemen di bawahnya.',
                'prioritas' => 4,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Agm',
                'nama_pendek' => 'Agama',
                'nama_lengkap' => 'Keagamaan',
                'deskripsi' => 'Departemen Agama bertugas mengelola kegiatan keagamaan, membina spiritualitas anggota, dan menyelenggarakan perayaan hari besar keagamaan.',
                'prioritas' => 3,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Kpm',
                'nama_pendek' => 'KPSDM',
                'nama_lengkap' => 'Kaderisasi Pengembangan SDM',
                'deskripsi' => 'Departemen Kaderisasi dan PSDM fokus pada pengembangan potensi, pelatihan kepemimpinan, dan kaderisasi mahasiswa untuk membentuk generasi yang kompeten.',
                'prioritas' => 5,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Min',
                'nama_pendek' => 'Minba',
                'nama_lengkap' => 'Minat dan Bakat',
                'deskripsi' => 'Departemen Minat dan Bakat memfasilitasi dan mengembangkan potensi non-akademik mahasiswa melalui kegiatan seni, olahraga, dan hobi.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Hum',
                'nama_pendek' => 'Humed',
                'nama_lengkap' => 'Hubungan Masyarakat dan Media',
                'deskripsi' => 'Departemen Humas dan Media bertugas membangun citra organisasi, menjalin komunikasi dengan pihak luar, serta mengelola konten informasi dan media sosial.',
                'prioritas' => 6,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Rt',
                'nama_pendek' => 'RT',
                'nama_lengkap' => 'Rumah Tangga',
                'deskripsi' => 'Departemen Rumah Tangga bertanggung jawab dalam pengelolaan logistik, perlengkapan, dan kebutuhan operasional internal organisasi.',
                'prioritas' => 1,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ],
            [
                'kode' => 'Dan',
                'nama_pendek' => 'Danus',
                'nama_lengkap' => 'Dana dan Usaha',
                'deskripsi' => 'Departemen Dana dan Usaha bertugas merancang dan menjalankan kegiatan usaha serta penggalangan dana untuk menunjang keuangan organisasi.',
                'prioritas' => 7,
                'gambar' => 'departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg',
            ]
        ]);
    }
}
