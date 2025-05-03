<?php

namespace App\Filament\Resources\KegiatanResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Forms\FormsComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AbsenKegiatansRelationManager extends RelationManager
{
    protected static string $relationship = 'absen_kegiatans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('penguruses_id')
                    ->label('Pilih Pengurus')
                    ->searchable()
                    ->required()
                    ->columnSpanFull()
                    ->options(
                        \App\Models\Pengurus::with('mahasiswa')
                            ->get()
                            ->sortBy(fn($pengurus) => $pengurus->mahasiswa->nama)
                            ->pluck('mahasiswa.nama', 'id')
                    ),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('detail')
            ->columns([
                Tables\Columns\TextColumn::make('pengurus.mahasiswa.nama')
                    ->label('Nama Pengurus'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Absen')
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
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
