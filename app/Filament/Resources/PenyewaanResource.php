<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyewaanResource\Pages;
use App\Filament\Resources\PenyewaanResource\RelationManagers;
use App\Models\Penyewaan;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenyewaanResource extends Resource
{
    protected static ?string $model = Penyewaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal_pinjam')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_kembali')
                    ->required(),
                Forms\Components\Select::make('ormawa_id')
                    ->relationship('ormawa', 'nama')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('detail_penyewaans')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('inventaris_id')
                            ->relationship('inventaris', 'nama')
                            ->required(),
                        Forms\Components\TextInput::make('jumlah')
                            ->required(),
                    ])
                    ->grid(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_pinjam')
                    ->label('Tanggal Pinjam')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->sortable(),
                Tables\Columns\TextColumn::make('ormawa.nama')
                    ->label('Ormawa')
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
            'index' => Pages\ListPenyewaans::route('/'),
            'create' => Pages\CreatePenyewaan::route('/create'),
            'edit' => Pages\EditPenyewaan::route('/{record}/edit'),
        ];
    }
}
