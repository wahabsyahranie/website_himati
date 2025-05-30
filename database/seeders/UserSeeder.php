<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => '01jv7pqks6n8zz8psysam0ewk9',
                'name' => 'Wahab',
                'email' => 'wahab@polnes.com',
                'password' => Hash::make('123'),
                'nomor_telepon' => '081258765977',
                'tipe_akun' => 'mahasiswa',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewka',
                'name' => 'Eva',
                'email' => 'eva@polnes.com',
                'password' => Hash::make('123'),
                'nomor_telepon' => '081234567890',
                'tipe_akun' => 'mahasiswa',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkb',
                'name' => 'Rizki',
                'email' => 'rizki@polnes.com',
                'password' => Hash::make('123'),
                'nomor_telepon' => '081298765432',
                'tipe_akun' => 'mahasiswa',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkc',
                'name' => 'Dwi Titi Maesaroh M.Pd',
                'email' => 'dwi@polnes.com',
                'password' => Hash::make('123'),
                'nomor_telepon' => '081212345678',
                'tipe_akun' => 'dosen',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkd',
                'name' => 'Aam Shodiqul S.Kom, M.Kom',
                'email' => 'aam@polnes.com',
                'password' => Hash::make('123'),
                'nomor_telepon' => '081276543210',
                'tipe_akun' => 'dosen',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewke',
                'name' => 'Abdullah Hanif S.Kom, M.Kom',
                'email' => 'hanif@polnes.ac.id',
                'password' => Hash::make('bemti123'),
                'nomor_telepon' => '081234567890',
                'tipe_akun' => 'dosen',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkf',
                'name' => 'Dewan Perwakilan Mahasiswa',
                'email' => 'dpm@polnes.ac.id',
                'password' => Hash::make('dpmiti123'),
                'nomor_telepon' => '082345678901',
                'tipe_akun' => 'ormawa',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkg',
                'name' => 'Badan Eksekutif Mahasiswa',
                'email' => 'bem@polnes.ac.id',
                'password' => Hash::make('himatif123'),
                'nomor_telepon' => '083456789012',
                'tipe_akun' => 'ormawa',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkh',
                'name' => 'Himpunan Mahasiswa Jurusan Teknologi Informasi',
                'email' => 'himati@polnes.ac.id',
                'password' => Hash::make('ukmpc123'),
                'nomor_telepon' => '084567890123',
                'tipe_akun' => 'ormawa',
            ],
        ]);
    }
}
