<?php

namespace App\Console\Commands;

use App\Models\Penyewaan;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class kurangiStoks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kurangi-stoks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengurangi stok penyewaan berdasarkan tanggal penyewaan hari ini';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();

        $penyewaanHariIni = Penyewaan::with('detail_penyewaans.inventaris')
            ->whereDate('tanggal_pinjam', $today)
            ->whereNull('pengurangan_stok_at')
            ->where('status', 'disetujui')
            ->get();

        if ($penyewaanHariIni->isEmpty()) {
            $this->info('Tidak ada penyewaan yang dimulai hari ini.');
            return 0;
        }

        foreach ($penyewaanHariIni as $penyewaan) {
            foreach ($penyewaan->detail_penyewaans as $detail) {
                $inventaris = $detail->inventaris;

                if ($inventaris) {
                    if ($inventaris->stok >= $detail->jumlah) {
                        $inventaris->stok -= $detail->jumlah;
                        $inventaris->save();

                        $this->info("Stok dikurangi untuk inventaris {$inventaris->nama} sebanyak {$detail->jumlah}");
                    } else {
                        $this->warn("Stok tidak cukup untuk inventaris {$inventaris->nama}. Dibutuhkan: {$detail->jumlah}, tersedia: {$inventaris->stok}");
                    }
                }
            }

            // Tandai bahwa stok sudah dipotong untuk penyewaan ini
            $penyewaan->pengurangan_stok_at = now();
            $penyewaan->save();
        }

        $this->info('Proses pengurangan stok selesai.');
        return 0;
    }
}
