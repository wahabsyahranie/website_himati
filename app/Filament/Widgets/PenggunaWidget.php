<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PenggunaWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];
        $name = $this->filters['name'];

        return [
            Stat::make('Mahasiswa', \App\Models\User::where('tipe_akun', 'mahasiswa')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->where('name', 'like', "%{$name}%"))
                ->count()),
            Stat::make('Pengurus Aktif', \App\Models\Pengurus::where('status', 'pengurus')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->whereHas('user', fn ($q) => $q->where('name', 'like', "%{$name}%")))
                ->count()),
            Stat::make('Pengurus Terdaftar', \App\Models\Pengurus::whereIn('status', ['pengurus', 'alb'])
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->whereHas('user', fn ($q) => $q->where('name', 'like', "%{$name}%")))
                ->count()),
        ];
    }
}
