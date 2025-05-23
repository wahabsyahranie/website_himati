<?php

namespace App\Filament\Widgets;

use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class ZCalendarWidget extends FullCalendarWidget
{
    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */

    //// MENAMPILKAN KEGIATAN
    public function fetchEvents(array $fetchInfo): array
    {
        return Kegiatan::query()
            // ->where('starts_at', '>=', $fetchInfo['start'])
            // ->where('ends_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Kegiatan $event) => [
                    'id' => $event->id,
                    'title' => $event->nama,
                    'description' => $event->tujuan_rapat,
                    'start' => $event->tanggal_pelaksana,
                    // 'url' => KegiatanResource::getUrl(name: 'view', parameters: ['record' => $event]),
                    'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }

    //// MEMBUAT FORM BUAT KEGAIATAN
    public Model | string | null $model = Kegiatan::class;
    
    public function getFormSchema(): array
    {
        return [
            // TextInput::make('user_id')
            //     ->label('Pembuat')
            //     ->default(auth()->id())
            //     ->disabled()
            //     ->dehydrated(true),
            TextInput::make('nama')
                ->label('Nama Kegiatan'),
            Select::make('jenis_kegiatan')
                ->native(false)
                ->required()
                ->options([
                    'rapat umum' => 'Rapat Umum',
                    'rapat panitia' => 'Rapat Panitia',
                    'proker primer' => 'Proker Primer',
                    'proker sekunder' => 'Proker Sekunder',
                ]),
            TextInput::make('tempat_pelaksanaan')
                ->required()
                ->autocomplete(false)
                ->maxLength(255),
            TextInput::make('tujuan_rapat')
                ->required()
                ->autocomplete(false)
                ->columnSpanFull()
                ->placeholder('Membahas progres selama 1 bulan sebelumnya...'),
            Grid::make()
                ->schema([
                    DateTimePicker::make('tanggal_pelaksana')
                    ->columnSpanFull(),
                ]),
        ];
    }

    //// MEMBUAT MODAL EDIT
    protected function modalActions(): array
    {
        return [
            EditAction::make()
                ->mountUsing(
                    function (Kegiatan $record, Form $form, array $arguments) {
                        $form->fill([
                            'nama' => $record->nama,
                            // 'user_id' => $record->user_id,
                            'nama' => $record->nama,
                            'jenis_kegiatan' => $record->jenis_kegiatan,
                            'tempat_pelaksanaan' => $record->tempat_pelaksanaan,
                            'tujuan_rapat' => $record->tujuan_rapat,
                            'tanggal_kegiatan' => $arguments['kegiatan']['tanggal_pelaksana'] ?? $record->tanggal_pelaksana,
                        ]);
                    }
                ),
            DeleteAction::make(),
        ];
    }

    //// HEADER ACTION AND MUTATE
    protected function headerActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $user = auth()->id();
                    $data['user_id'] = $user;
                    return $data;
                })
        ];
    }

    protected function getConfig(): array
    {
        return [
            'headerToolbar' => [
                'left' => 'prev,next',
                'center' => 'title',
                'right' => 'dayGridMonth,timeGridWeek,timeGridDay',
            ],
        ];
    }
}
