<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPenyewaanResource\Pages;
use App\Filament\Resources\DetailPenyewaanResource\RelationManagers;
use App\Models\DetailPenyewaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPenyewaanResource extends Resource
{
    protected static ?string $model = DetailPenyewaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('penyewaan.ormawa.nama')
                    ->label('Ormawa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('inventaris.nama')
                    ->label('Inventaris')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah'),
                Tables\Columns\TextColumn::make('penyewaan.tanggal_pinjam')
                    ->label('Tanggal Pinjam'),
                Tables\Columns\TextColumn::make('penyewaan.tanggal_kembali')
                    ->label('Tanggal Kembali'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetailPenyewaans::route('/'),
            'create' => Pages\CreateDetailPenyewaan::route('/create'),
            'edit' => Pages\EditDetailPenyewaan::route('/{record}/edit'),
        ];
    }
}
