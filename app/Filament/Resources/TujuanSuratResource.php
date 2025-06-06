<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TujuanSuratResource\Pages;
use App\Filament\Resources\TujuanSuratResource\RelationManagers;
use App\Models\TujuanSurat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TujuanSuratResource extends Resource
{
    protected static ?string $model = TujuanSurat::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Surat';
    protected static ?string $navigationLabel = 'Tujuan Surat';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tujuan')
                    ->label('Masukan Tujuan Surat')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Tujuan surat')
            ->description("Buat tujuan surat anda disini.")
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Tujuan Baru'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('Nomor')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('tujuan')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTujuanSurats::route('/'),
        ];
    }
}
