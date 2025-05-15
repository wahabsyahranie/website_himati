<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatans')->insert([
            [
                'nama' => 'Rapat Umum Awal Tahun',
                'tanggal_pelaksana' => '2025-01-15 09:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat umum',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
            ],
            [
                'nama' => 'Rapat Koordinasi Panitia SERASI',
                'tanggal_pelaksana' => '2025-02-10 13:30:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat panitia',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
            ],
            [
                'nama' => 'Pelaksanaan SERASI 2025',
                'tanggal_pelaksana' => '2025-03-20 08:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'proker primer',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
            ],
            [
                'nama' => 'Pembuatan Konten Sosial Media',
                'tanggal_pelaksana' => '2025-02-25 15:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'proker sekunder',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
            ],
            [
                'nama' => 'Rapat Evaluasi Tengah Periode',
                'tanggal_pelaksana' => '2025-04-05 10:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat umum',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
            ],
        ]);
    }
}
