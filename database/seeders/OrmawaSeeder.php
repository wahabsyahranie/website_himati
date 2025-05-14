<?php

namespace Database\Seeders;

use App\Models\Ormawa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ormawas')->insert([
            [
                'nama' => 'BEM',
                'email' => 'bemti@polnes.ac.id',
                'password' => Hash::make('bemti123'),
                'nomor_telepon' => '081234567890',
                'username' => 'bem_ti',
            ],
            [
                'nama' => 'DPM',
                'email' => 'dpmiti@polnes.ac.id',
                'password' => Hash::make('dpmiti123'),
                'nomor_telepon' => '082345678901',
                'username' => 'dpm_ti',
            ],
            [
                'nama' => 'HIMATIF',
                'email' => 'himatif@polnes.ac.id',
                'password' => Hash::make('himatif123'),
                'nomor_telepon' => '083456789012',
                'username' => 'himatif_polnes',
            ],
            [
                'nama' => 'UKM Programming Club',
                'email' => 'ukmpc@polnes.ac.id',
                'password' => Hash::make('ukmpc123'),
                'nomor_telepon' => '084567890123',
                'username' => 'ukm_prog',
            ],
            [
                'nama' => 'MAPALA Merapi',
                'email' => 'mapala@polnes.ac.id',
                'password' => Hash::make('merapi123'),
                'nomor_telepon' => '085678901234',
                'username' => 'mapala_merapi',
            ],
        ]);
    }
}
