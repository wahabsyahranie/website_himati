<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KegiatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KegiatanResource\RelationManagers;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Kelola Layanan';
    protected static ?string $navigationLabel = 'Jadwal Kegiatan';
    protected static ?int $navigationSort = 9;
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::where('status', 1)->count();
    // }
    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return 'Kegiatan yang sedang berlangsung';
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_pelaksana')
                    ->label('Tanggal & Waktu Pelaksanaan')
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('jenis_kegiatan')
                    ->native(false)
                    ->required()
                    ->options([
                        'rapat umum' => 'Rapat Umum',
                        'rapat panitia' => 'Rapat Panitia',
                        'proker primer' => 'Proker Primer',
                        'proker sekunder' => 'Proker Sekunder',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Kegiatan'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kegiatan')
                    ->description(fn (Kegiatan $record): string => $record->jenis_kegiatan, position: 'above')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pelaksana')
                    ->label('Tanggal & Waktu Pelaksanaan')
                    ->sortable()
                    ->iconColor('primary')
                    ->icon('heroicon-m-calendar-days')
                    ->formatStateUsing(function ($state) {
                        Carbon::setLocale('id');
                        $tanggal = Carbon::parse($state)->translatedFormat('l, d F Y');
                        $waktu = Carbon::parse($state)->translatedFormat('H:i');
                        return ($tanggal) . ' | ' . ($waktu);
                    }),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Kegiatan')
                    ->options([
                        1 => 'Dibuka',
                        0 => 'Ditutup',
                    ]),
                SelectFilter::make('jenis_kegiatan')
                    ->label('Jenis Kegiatan')
                    ->options(function () {
                        return \App\Models\Kegiatan::query()
                            ->pluck('jenis_kegiatan', 'jenis_kegiatan')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AbsenKegiatansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
