<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'quote' => 'Kaderisasi adalah tugas, Regenerasi adalah tanggung jawab. Di HIMA TI kalian akan merasakan sudut pandang dan pengalaman berpetualang dari segi mahasiswa',
                'status' => 'ditampilkan',
                'penguruses_id' => 1,
                'title' => json_encode([
                    ['title' => 'Ketua Umum HMJ TI 2024/2025'],
                    ['title' => 'Developer Website HMJ TI'],
                    ['title' => 'Founder Ruang Ujian dan Kajian'],
                ]),
            ],
            [
                'quote' => 'Berorganisasi itu seni menata rasa, logika, dan aksi dalam satu harmoni.',
                'status' => 'ditampilkan',
                'penguruses_id' => 2,
                'title' => json_encode([
                    ['title' => 'Kepala Departemen Kastrat'],
                    ['title' => 'Koordinator Kajian Mingguan TI'],
                ]),
            ],
            [
                'quote' => 'Kita tidak sedang sibuk, kita sedang bertumbuh bersama.',
                'status' => 'disembunyikan',
                'penguruses_id' => 3,
                'title' => json_encode([
                    ['title' => 'Kepala Departemen Sosmas'],
                    ['title' => 'Ketua Aksi Sosial Ramadhan 2025'],
                ]),
            ],
            [
                'quote' => 'Organisasi adalah laboratorium kepemimpinan mahasiswa.',
                'status' => 'disembunyikan',
                'penguruses_id' => 4,
                'title' => json_encode([
                    ['title' => 'Kepala Departemen Minat dan Bakat'],
                    ['title' => 'PJ TI CUP 2025'],
                ]),
            ],
            [
                'quote' => 'Informasi yang baik dimulai dari komunikasi yang sehat.',
                'status' => 'disembunyikan',
                'penguruses_id' => 5,
                'title' => json_encode([
                    ['title' => 'Kepala Departemen Kominfo'],
                    ['title' => 'PJ Konten Sosial Media HMJ TI'],
                ]),
            ],

        ]);
    }
}
