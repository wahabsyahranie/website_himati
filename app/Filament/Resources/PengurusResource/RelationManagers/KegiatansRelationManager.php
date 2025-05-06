<?php

namespace App\Filament\Resources\PengurusResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class KegiatansRelationManager extends RelationManager
{
    protected static string $relationship = 'absenKegiatanNotAlpas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->paginated([10, 25, 50, 100, 'all'])
            // ->extremePaginationLinks()
            ->recordTitleAttribute('detail')
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->state(function ($livewire, $rowLoop) {
                        $page = $livewire->getTablePage();
                        $perPage = $livewire->getTableRecordsPerPage();
                        return ($rowLoop->iteration + ($page - 1) * $perPage);
                    }),
                Tables\Columns\TextColumn::make('kegiatan.nama')
                    ->label('Nama Kegiatan'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'hadir' => 'success',
                        'ijin' => 'warning',
                        'alpa' => 'danger',
                        default => 'secondary',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Presensi')
                    ->iconColor('primary')
                    ->icon('heroicon-m-calendar-days')
                    ->formatStateUsing(function ($state) {
                        Carbon::setLocale('id');
                        $tanggal = Carbon::parse($state)->translatedFormat('l, d F Y');
                        $waktu = Carbon::parse($state)->translatedFormat('H:i');
                        return ($tanggal) . ' | ' . ($waktu);
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
