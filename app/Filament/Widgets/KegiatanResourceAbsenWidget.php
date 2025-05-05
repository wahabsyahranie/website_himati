<?php

namespace App\Filament\Widgets;

use App\Models\AbsenKegiatan;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class KegiatanResourceAbsenWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengurus Aktif', \App\Models\Pengurus::where('status', 'pengurus')->count()),
            // Stat::make('Total Pengurus Hadir', \App\Models\AbsenKegiatan::where('kegiatan_id', $kegiatan?->id)
            //     ->where('keterangan', 'hadir')
            //     ->count())
            //     ->description('Jumlah pengurus yang hadir pada kegiatan ini'),
        ];
    }
}
