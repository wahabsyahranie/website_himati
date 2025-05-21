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
                'tanggal_pelaksana' => '2025-05-24 09:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat umum',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nama' => 'Rapat Koordinasi Panitia SERASI',
                'tanggal_pelaksana' => '2025-05-27 13:30:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat panitia',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nama' => 'Pelaksanaan SERASI 2025',
                'tanggal_pelaksana' => '2025-05-17 08:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'proker primer',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nama' => 'Pembuatan Konten Sosial Media',
                'tanggal_pelaksana' => '2025-05-19 15:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'proker sekunder',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
            [
                'nama' => 'Rapat Evaluasi Tengah Periode',
                'tanggal_pelaksana' => '2025-05-28 10:00:00',
                'status' => 0,
                'jenis_kegiatan' => 'rapat umum',
                'tempat_pelaksanaan' => 'Aula Teknologi Informasi',
                'tujuan_rapat' => 'Membahas Progress kepanitiaan portech',
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
            ],
        ]);
    }
}
