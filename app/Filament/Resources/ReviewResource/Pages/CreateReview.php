<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $titles = $data['title'];
        // Ubah jadi array (meskipun hanya satu item)
        $titlesArray = array_map('trim', explode(',', $titles));
        // Ubah jadi array of associative arrays
        $data['title'] = array_map(function ($title) {
            return ['title' => $title];
        }, $titlesArray);

        return $data;
    }
}
