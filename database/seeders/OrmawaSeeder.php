<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'nama_pendek' => 'DPM',
                'lambang' => 'dpm.png',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkf',
            ],
            [
                'nama_pendek' => 'BEM',
                'lambang' => 'bem.png',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkg',
            ],
            [
                'nama_pendek' => 'HMJ TI',
                'lambang' => 'hmjti.png',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkh',
            ],
        ]);
    }
}
