<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TujusanSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tujuan_surats')->insert([
            [
                'tujuan' => 'Ketua Jurusan Teknologi Informasi'
            ],
            [
                'tujuan' => 'Wakil Direktur I Bidang Akademik Politeknik Negeri Samarinda'
            ],
            [
                'tujuan' => 'Wakil Direktur II Bidang Umum dan Keuangan Politeknik Negeri Samarinda'
            ],
            [
                'tujuan' => 'Wakil Direktur III Bidang Kemahasiswaan dan Alumni Politeknik Negeri Samarinda'
            ],
            [
                'tujuan' => 'Wakil Direktur IV Bidang Kerjasama dan Hubungan Masyarakat Politeknik Negeri Samarinda'
            ],
            [
                'tujuan' => 'Direktur Politeknik Negeri Samarinda'
            ]
        ]);
    }
}
