<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = 'Data Pengguna';

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->label('Semua'),
            'mahasiswa' => Tab::make()
                ->label('Mahasiswa')
                ->modifyQueryUsing(fn (Builder $query) => $query->has('mahasiswa')),
                // ->modifyQueryUsing(fn (Builder $query) => $query->where('tipe_akun', 'mahasiswa')),
                // ->modifyQueryUsing(fn (Builder $query) => $query->doesntHave('ormawa')),
                // ->modifyQueryUsing(fn (Builder $query) => $query->where('tipe_akun', 'ormawa')),
            'dosen' => Tab::make()
                ->label('Dosen')
                ->modifyQueryUsing(fn (Builder $query) => $query->has('dosen')),
                // ->modifyQueryUsing(fn (Builder $query) => $query->where('tipe_akun', 'dosen')),
            // 'pengurus' => Tab::make()
            //     ->label('Pengurus')
            //     ->modifyQueryUsing(fn (Builder $query) => $query->has('pengurus')),
            'ormawa' => Tab::make()
                ->label('Ormawa')
                ->modifyQueryUsing(fn (Builder $query) => $query->has('ormawa')),
        ];
    }

    
}
