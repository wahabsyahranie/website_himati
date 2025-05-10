<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\Pengaduan;
use App\Models\PengajuanSurat;
use App\Models\Pengesahan;
use App\Models\Pengurus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'wahab',
            'email' => 'wahab@polnes.com',
            'password' => '123',
        ]);

        $this->call([OrmawaSeeder::class, InventarisSeeder::class, MahasiswaSeeder::class, PengesahanSeeder::class, KegiatanSeeder::class]);

        Pengaduan::factory(100)->recycle([
            Mahasiswa::all()
        ])->create();

        PengajuanSurat::factory(10)->recycle([
            Mahasiswa::all(),
            Pengesahan::all()
        ])->create();

        Pengurus::factory(100)->recycle([
            Mahasiswa::all(),
        ])->create();

        Departemen::factory()->createMany([
            [
                'kode' => 'BPI',
                'nama' => 'Badan Pengurus Inti',
                'deskripsi' => 'Badan Pengurus Inti merupakan struktur inti organisasi yang bertanggung jawab dalam mengkoordinasikan seluruh kegiatan dan departemen di bawahnya.',
                'prioritas' => 1,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Agm',
                'nama' => 'Agama',
                'deskripsi' => 'Departemen Agama bertugas mengelola kegiatan keagamaan, membina spiritualitas anggota, dan menyelenggarakan perayaan hari besar keagamaan.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Kpm',
                'nama' => 'Kaderisasi Pengembangan Sumber Daya Mahasiswa',
                'deskripsi' => 'Departemen Kaderisasi dan PSDM fokus pada pengembangan potensi, pelatihan kepemimpinan, dan kaderisasi mahasiswa untuk membentuk generasi yang kompeten.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Min',
                'nama' => 'Minat dan Bakat',
                'deskripsi' => 'Departemen Minat dan Bakat memfasilitasi dan mengembangkan potensi non-akademik mahasiswa melalui kegiatan seni, olahraga, dan hobi.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Hum',
                'nama' => 'Hubungan Masyarakat dan Media',
                'deskripsi' => 'Departemen Humas dan Media bertugas membangun citra organisasi, menjalin komunikasi dengan pihak luar, serta mengelola konten informasi dan media sosial.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Rt',
                'nama' => 'Rumah Tangga',
                'deskripsi' => 'Departemen Rumah Tangga bertanggung jawab dalam pengelolaan logistik, perlengkapan, dan kebutuhan operasional internal organisasi.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ],
            [
                'kode' => 'Dan',
                'nama' => 'Dana dan Usaha',
                'deskripsi' => 'Departemen Dana dan Usaha bertugas merancang dan menjalankan kegiatan usaha serta penggalangan dana untuk menunjang keuangan organisasi.',
                'prioritas' => 2,
                'gambar' => 'departemen/departemen-am83xCHZaeI4weJJJ44DWoY7enUmY8Z28dLaiMOv.jpg',
            ]
        ]);
    }
}
