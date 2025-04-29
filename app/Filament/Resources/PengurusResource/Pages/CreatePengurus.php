<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengurusResource;
use App\HandlesDepartemen;
use App\Models\DetailPengurus;
use Filament\Support\Exceptions\Halt;

class CreatePengurus extends CreateRecord
{
    protected static string $resource = PengurusResource::class;
}
