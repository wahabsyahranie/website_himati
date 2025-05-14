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
                'bidang' => 'Kepemimpinan',
                'prioritas' => 1,
                'type_nomor_induk' => 'NIM',
                'nomor_induk' => '2361520031',
                'nomor_telepon' => '081234567891',
            ],
            [
                'nama' => 'Aulia Nurrahma',
                'jabatan' => 'Sekretaris Umum',
                'bidang' => 'Administrasi',
                'prioritas' => 2,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '198706252019032001',
                'nomor_telepon' => '081345678902',
            ],
            [
                'nama' => 'Muhammad Rafi',
                'jabatan' => 'Bendahara Umum',
                'bidang' => 'Keuangan',
                'prioritas' => 3,
                'type_nomor_induk' => 'NIM',
                'nomor_induk' => '2361520032',
                'nomor_telepon' => '081456789013',
            ],
            [
                'nama' => 'Siti Maulida',
                'jabatan' => 'Koordinator Bidang',
                'bidang' => 'Pengembangan SDM',
                'prioritas' => 4,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '197512082010121002',
                'nomor_telepon' => '081567890124',
            ],
            [
                'nama' => 'Ilham Pratama',
                'jabatan' => 'Pembina Ormawa',
                'bidang' => 'Kemahasiswaan',
                'prioritas' => 5,
                'type_nomor_induk' => 'NIP',
                'nomor_induk' => '198009302007101003',
                'nomor_telepon' => '081678901235',
            ],
        ]);
    }
}
