<?php

namespace Database\Seeders;

use App\Models\Pengesahan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengesahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengesahans')->insert([
            [
                'nama' => 'Wahab Syahranie',
                'jabatan' => 'Ketua Umum',
                'bidang' => 'HMJ TI',
                'prioritas' => 4,
                'type_nomor_induk' => 'NIM',
                'nomor_induk' => '2361520003',
                'nomor_telepon' => '081234567891',
            ],
            [
                'nama' => 'Yemima Meilinda',
                'jabatan' => 'Sekretaris Umum',
                'bidang' => 'HMJ TI',
                'prioritas' => 5,
                'type_nomor_induk' => 'NIM',
                'nomor_induk' => '236651002',
                'nomor_telepon' => '081345678902',
            ],
            [
                'nama' => 'Davien',
                'jabatan' => 'Kepala Departemen',
                'bidang' => 'Minat dan Bakat',
                'prioritas' => 5,
                'type_nomor_induk' => 'NIM',
                'nomor_induk' => '2361520004',
                'nomor_telepon' => '081456789013',
            ],
            [
                'nama' => 'Rheo Malani S.Kom, M.Kom',
                'jabatan' => 'Ketua Jurusan',
                'bidang' => 'Teknologi Informasi',
                'prioritas' => 2,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '197512082010121002',
                'nomor_telepon' => '081567890124',
            ],
            [
                'nama' => 'Dwi Titi Maesaroh',
                'jabatan' => 'Pembina Mahasiswa',
                'bidang' => 'Teknologi Informasi',
                'prioritas' => 3,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '198009302007101003',
                'nomor_telepon' => '081678901235',
            ],
            [
                'nama' => 'Suparno MT',
                'jabatan' => 'Wadir III',
                'bidang' => 'Bidang Kemahasiswaan dan Alumni',
                'prioritas' => 1,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '198009302007101005',
                'nomor_telepon' => '081678901235',
            ],
        ]);
    }
}
