<?php

namespace App\Filament\Resources\PenyewaanResource\Widgets;

use App\Models\Penyewaan;
use Illuminate\Support\Carbon;
use App\Models\DetailPenyewaan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PenyewaanOverview extends BaseWidget
{
    protected ?string $description = 'Gambaran umum statistik layanan penyewaan.';

    protected function getStats(): array
    {
        //Ambil jumlah penyewaan per status
        $totalPenyewaan = Penyewaan::selectRaw('SUM(CASE WHEN status = "disetujui" THEN 1 ELSE 0 END) AS disetujui')->first();


        // Total pendapatan: jumlahkan harga dari relasi ke model Inventaris
        $totalPendapatan = DetailPenyewaan::whereHas('penyewaan', function ($query) {
            $query->where('status', 'disetujui');
            })
            ->with('inventaris', 'penyewaan') // perlu relasi penyewaan untuk tanggal
            ->get()
            ->sum(function ($detail) {
                $hargaPerHari = optional($detail->inventaris)->harga ?? 0;
                $tanggalPinjam = optional($detail->penyewaan)->tanggal_pinjam;
                $tanggalKembali = optional($detail->penyewaan)->tanggal_kembali;

                if ($tanggalPinjam && $tanggalKembali) {
                    $jumlahHari = Carbon::parse($tanggalPinjam)->diffInDays(Carbon::parse($tanggalKembali)) + 1;
                } else {
                    $jumlahHari = 0;
                }

                return $hargaPerHari * $jumlahHari;
            });

        return [
            Stat::make('', $totalPenyewaan->disetujui)
                ->color('info')
                ->description('Jumlah permintaan disetujui')
                ->descriptionIcon('heroicon-m-check-circle', IconPosition::Before),
            // Stat::make('', $totalBarangDisewa)
            //     ->color('success')
            //     ->description('Jumlah inventaris yang disewa')
            //     ->descriptionIcon('heroicon-m-cube', IconPosition::Before),
            Stat::make('', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'))
                ->color('success')
                ->description('Total pendapatan')
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before),
        ];
    }
}
