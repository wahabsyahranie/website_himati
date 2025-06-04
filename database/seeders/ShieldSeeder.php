<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ////ROLES
        DB::table('roles')->insert([
            [
                'name' => 'super_admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'pengurus',
                'guard_name' => 'web',
            ],
            [
                'name' => 'mahasiswa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'ormawa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'dosen',
                'guard_name' => 'web',
            ],
        ]);
        
        ////MODEL HAS ROLES
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => '01jv7pqks6n8zz8psysam0ewk9'
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => '01jv7pqks6n8zz8psysam0ewka'
            ],
            [
                'role_id' => 3,
                'model_type' => 'App\Models\User',
                'model_id' => '01jv7pqks6n8zz8psysam0ewkb'
            ],
            [
                'role_id' => 4,
                'model_type' => 'App\Models\User',
                'model_id' => '01jv7pqks6n8zz8psysam0ewkc'
            ],
        ]);
    }
}
