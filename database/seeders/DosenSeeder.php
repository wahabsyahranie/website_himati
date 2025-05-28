<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosens')->insert([
            [
                'nip' => '902080580',
                'jabatan' => 'Pembina Mahasiswa',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkc',
            ],
            [
                'nip' => '902080580',
                'jabatan' => 'Pembina Mahasiswa',
                'user_id' => '01jv7pqks6n8zz8psysam0ewkd',
            ],
            [
                'nip' => '902080580',
                'jabatan' => 'Pembina Mahasiswa',
                'user_id' => '01jv7pqks6n8zz8psysam0ewke',
            ],
        ]);
    }
}
