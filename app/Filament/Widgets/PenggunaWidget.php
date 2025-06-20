<?php

namespace App\Filament\Widgets;

use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class PenggunaWidget extends BaseWidget
{
    use InteractsWithPageFilters, HasWidgetShield;

    // public static function canView(): bool
    // {
    //     return Auth::user()?->can('widget_PenggunaWidget') ?? false;
    // }

    protected function getStats(): array
    {
        $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];
        $name = $this->filters['name'];

        return [
            Stat::make('Mahasiswa', \App\Models\User::has('mahasiswa')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->where('name', 'like', "%{$name}%"))
                ->count()),
            Stat::make('Dosen', \App\Models\User::has('dosen')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->where('name', 'like', "%{$name}%"))
                ->count()),
            Stat::make('Pengurus Aktif', \App\Models\Pengurus::where('status', 'pengurus')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->whereHas('user', fn ($q) => $q->where('name', 'like', "%{$name}%")))
                ->count()),
            Stat::make('Ormawa', \App\Models\User::has('ormawa')
                ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
                ->when($name, fn ($query) => $query->where('name', 'like', "%{$name}%"))
                ->count()),
            // Stat::make('Pengurus Terdaftar', \App\Models\Pengurus::whereIn('status', ['pengurus', 'alb'])
            //     ->when($start, fn ($query) => $query->whereDate('created_at', '>=', $start))
            //     ->when($end, fn ($query) => $query->whereDate('created_at', '<=', $end))
            //     ->when($name, fn ($query) => $query->whereHas('user', fn ($q) => $q->where('name', 'like', "%{$name}%")))
            //     ->count()),
        ];
    }
}
