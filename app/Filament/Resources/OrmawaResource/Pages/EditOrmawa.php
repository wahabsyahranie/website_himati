<?php

namespace App\Filament\Resources\OrmawaResource\Pages;

use App\Filament\Resources\OrmawaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrmawa extends EditRecord
{
    protected static string $resource = OrmawaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
