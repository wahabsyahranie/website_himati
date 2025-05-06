<?php

namespace App\Console\Commands;

use App\Models\Penyewaan;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class KembalikanStoks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kembalikan-stoks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengembalikan stok inventaris berdasarkan penyewaan yang selesai hari ini';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();

        $penyewaanSelesai = Penyewaan::with('detail_penyewaans.inventaris')
            ->whereDate('tanggal_kembali', $today)
            ->whereNull('pengembalian_stok_at')
            ->get();

        if ($penyewaanSelesai->isEmpty()) {
            $this->info('Tidak ada penyewaan yang selesai hari ini.');
            return 0;
        }

        foreach ($penyewaanSelesai as $penyewaan) {
            foreach ($penyewaan->detail_penyewaans as $detail) {
                $inventaris = $detail->inventaris;

                if ($inventaris) {
                    $inventaris->stok += $detail->jumlah;
                    $inventaris->save();

                    $this->info("Stok dikembalikan untuk inventaris {$inventaris->nama} sebanyak {$detail->jumlah}");
                }
            }

            // Tandai bahwa stok sudah dikembalikan untuk penyewaan ini
            $penyewaan->pengembalian_stok_at = now();
            $penyewaan->save();
        }

        $this->info('Proses pengembalian stok selesai.');
        return 0;
    }
}
