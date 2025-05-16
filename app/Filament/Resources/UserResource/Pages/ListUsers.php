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
            ->modifyQueryUsing(fn (Builder $query) => $query->has('userDetail')),
        'ormawa' => Tab::make()
            ->label('Ormawa')
            ->modifyQueryUsing(fn (Builder $query) => $query->doesntHave('userDetail')),
    ];
}

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
