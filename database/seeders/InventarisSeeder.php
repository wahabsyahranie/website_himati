<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventaris')->insert([
            [
                'nama' => 'Toa',
                'harga' => 500000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Toa portabel dengan baterai isi ulang, dilengkapi charger bawaan. Kondisi prima dan siap digunakan untuk kebutuhan suara yang optimal.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Sound System',
                'harga' => 2000000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Sistem suara profesional dengan kualitas audio jernih dan daya keluaran tinggi, ideal untuk berbagai acara indoor maupun outdoor.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Sound System dan Mic',
                'harga' => 3000000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Paket lengkap sound system beserta mikrofon berkualitas tinggi, memberikan solusi audio yang sempurna untuk presentasi dan pertunjukan.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Lampu Sorot',
                'harga' => 2500000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Lampu sorot LED dengan pencahayaan kuat dan tahan lama, cocok untuk pencahayaan panggung dan area outdoor.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Stand Mic',
                'harga' => 2000000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Stand microphone yang kokoh dan mudah disesuaikan, memberikan kenyamanan bagi pengguna dalam berbagai acara.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Cajon',
                'harga' => 2000000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Instrumen cajon berkualitas dengan suara resonan yang hangat, cocok untuk musik akustik dan pertunjukan panggung.',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Gitar',
                'harga' => 1500000,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
                'deskripsi' => 'Gitar akustik dengan suara kaya dan build quality yang handal, ideal untuk latihan maupun penampilan live.',
                'status' => 'tersedia',
            ],
        ]);
    }
}
