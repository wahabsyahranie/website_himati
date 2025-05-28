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
                'jabatan' => 'Ketua Umum HMJ TI',
                'prioritas' => 4,
                'sumberable_type' => 'App\Models\Pengurus',
                'sumberable_id' => 1,
            ],
            [
                'jabatan' => 'Ketua Panitia Portech',
                'prioritas' => 5,
                'sumberable_type' => 'App\Models\Pengurus',
                'sumberable_id' => 2,
            ],
            [
                'jabatan' => 'Pembina Mahasiswa',
                'prioritas' => 3,
                'sumberable_type' => 'App\Models\Dosen',
                'sumberable_id' => 1,
            ],
            [
                'jabatan' => 'Pembina Mahasiswa',
                'prioritas' => 3,
                'sumberable_type' => 'App\Models\Dosen',
                'sumberable_id' => 2,
            ],
            [
                'jabatan' => 'Pembina Mahasiswa',
                'prioritas' => 3,
                'sumberable_type' => 'App\Models\Dosen',
                'sumberable_id' => 3,
            ],
        ]);
    }
}
