<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\Pengaduan;
use App\Models\PengajuanSurat;
use App\Models\Pengesahan;
use App\Models\Pengurus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'wahab',
            'email' => 'wahab@polnes.com',
            'password' => '123',
        ]);

        $this->call([OrmawaSeeder::class, InventarisSeeder::class, MahasiswaSeeder::class, PengesahanSeeder::class, KegiatanSeeder::class]);

        Pengaduan::factory(100)->recycle([
            Mahasiswa::all()
        ])->create();

        PengajuanSurat::factory(10)->recycle([
            Mahasiswa::all(),
            Pengesahan::all()
        ])->create();

        Pengurus::factory(100)->recycle([
            Mahasiswa::all(),
        ])->create();

    }
}
