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
                'nama' => 'Botol Minum Polnes',
                'harga' => 259999.99,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
            ],
            [
                'nama' => 'Tote Bag Polnes',
                'harga' => 190999.99,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
            ],
            [
                'nama' => 'Notebook Polnes',
                'harga' => 140999.99,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
            ],
            [
                'nama' => 'Stiker Logo TI',
                'harga' => 49999.99,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
            ],
            [
                'nama' => 'Gantungan Kunci HMJ TI',
                'harga' => 79899.99,
                'gambar' => 'produk/produk-BsOULTLS2JdPFXrcaGgD8IhWRQCVa7YW4CnudkS9.png',
            ],
        ]);
    }
}
