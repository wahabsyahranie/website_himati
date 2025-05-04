<?php

namespace App\Filament\Resources\PengaduanResource\Widgets;

use App\Models\Pengaduan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PengaduanOverview extends BaseWidget
{
    // protected ?string $heading = 'Analytics';
    protected ?string $description = 'Gambaran umum statistik layanan pengaduan.';
    protected static bool $isLazy = false;

    //CARD WIDGET
    protected function getStats(): array
    {
        //Ambil jumlah pengaduan per status
        $pengaduanCount = Pengaduan::selectRaw('COUNT(*) as total, SUM(CASE WHEN status = "dipublikasikan" THEN 1 ELSE 0 END) AS dipublikasikan, SUM(CASE WHEN status = "ditolak" THEN 1 ELSE 0 END) AS ditolak, SUM(CASE WHEN status = "ditinjau" THEN 1 ELSE 0 END) AS ditinjau')->first();
        
        // Ambil jumlah pengaduan per tanggal dari semua data
        $chartData = Pengaduan::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')->groupBy('tanggal')->orderBy('tanggal')->pluck('total', 'tanggal')->toArray();

        return [
            Stat::make('', $pengaduanCount->total)
                ->color('info')
                ->description('Total pengaduan')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->chart($chartData),

            Stat::make('', $pengaduanCount->ditinjau)
                ->color('warning')
                ->description('Ditinjau'),
 
            Stat::make('', $pengaduanCount->dipublikasikan)
                ->color('success')
                ->description('Dipublikasikan'),
 
            Stat::make('', $pengaduanCount->ditolak)
                ->color('danger')
                ->description('Ditolak'),
        ];
    }
}
