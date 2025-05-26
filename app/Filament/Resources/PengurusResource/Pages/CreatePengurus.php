<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\Pengurus;
use App\HandlesDepartemen;
use App\Models\DetailPengurus;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengurusResource;
use Illuminate\Validation\ValidationException;

class CreatePengurus extends CreateRecord
{
    protected static string $resource = PengurusResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $exists = Pengurus::where('mahasiswa_id', $data['mahasiswa_id'])
            ->exists();

        if ($exists) {
            Notification::make()
                ->title('Data Pengurus sudah ada!')
                ->danger()
                ->send();
            throw ValidationException::withMessages([
                'user_id' => ['Data pengurus ini sudah terdaftar.'],
            ]);
        }
        return $data;
    }
}
