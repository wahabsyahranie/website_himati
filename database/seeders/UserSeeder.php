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
                'nim' => '236152003',
                'tahun_masuk' => '2023',
                'prodi' => 'TI',
                'nomor_telepon' => '081258765977',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewka',
                'name' => 'Eva',
                'email' => 'eva@polnes.com',
                'password' => Hash::make('123'),
                'nim' => '236152004',
                'tahun_masuk' => '2023',
                'prodi' => 'TI',
                'nomor_telepon' => '081234567890',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkb',
                'name' => 'Rizki',
                'email' => 'rizki@polnes.com',
                'password' => Hash::make('123'),
                'nim' => '236152005',
                'tahun_masuk' => '2023',
                'prodi' => 'TI',
                'nomor_telepon' => '081298765432',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkc',
                'name' => 'Zahra',
                'email' => 'dewi@polnes.com',
                'password' => Hash::make('123'),
                'nim' => '236152006',
                'tahun_masuk' => '2023',
                'prodi' => 'TI',
                'nomor_telepon' => '081212345678',
            ],
            [
                'id' => '01jv7pqks6n8zz8psysam0ewkd',
                'name' => 'Abi',
                'email' => 'fajar@polnes.com',
                'password' => Hash::make('123'),
                'nim' => '236152007',
                'tahun_masuk' => '2023',
                'prodi' => 'TI',
                'nomor_telepon' => '081276543210',
            ],
        ]);
    }
}
