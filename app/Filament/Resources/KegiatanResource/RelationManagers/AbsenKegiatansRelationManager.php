<?php

namespace App\Filament\Resources\KegiatanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    ->options(
                        \App\Models\Pengurus::with('mahasiswa')
                            ->get()
                            ->sortBy(fn($pengurus) => $pengurus->mahasiswa->nama)
                            ->pluck('mahasiswa.nama', 'id')
                    ),
                Forms\Components\TextInput::make('jabatan_kegiatan')
                    ->label('Jabatan di Kegiatan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('detail')
            ->columns([
                Tables\Columns\TextColumn::make('jabatan_kegiatan')
                    ->label('Jabatan di Kegiatan'),
                Tables\Columns\TextColumn::make('pengurus.mahasiswa.nama')
                    ->label('Nama Pengurus'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Absen')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
