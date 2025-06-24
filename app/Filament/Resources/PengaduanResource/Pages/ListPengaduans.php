<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use Illuminate\Support\Facades\Auth;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PengaduanResource;
use App\Filament\Resources\PengaduanResource\Widgets\PengaduanOverview;

class ListPengaduans extends ListRecords
{
    protected static string $resource = PengaduanResource::class;
    protected static ?string $title = 'Daftar Pengaduan';

    //Membuat Tab Filter
    public function getTabs(): array
    {
        if (Auth::user()?->hasAnyRole(['admin', 'super_admin'])) {
            $tabs = [
                'all' => Tab::make()
                    ->label('Semua')
            ];
        }

        $tabs['milik saya'] = Tab::make()
                ->label('Advokasi Saya')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->id()));
        $tabs['diverifikasi'] = Tab::make()
                ->label('dipublikasikan')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'dipublikasikan'));

        return $tabs;
    }

    //MEMBUAT WIDGET
    protected function getHeaderWidgets(): array
    {
        return [
            PengaduanOverview::class,
        ];
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
