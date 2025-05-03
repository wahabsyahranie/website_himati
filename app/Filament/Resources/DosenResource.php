<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Filament\Resources\DosenResource\RelationManagers;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Dosen';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->label('NIP')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->tel()
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Dosen'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->iconColor('primary')
                    ->limit(13)
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin')
                    ->copyMessageDuration(1500)
                    ->icon('heroicon-m-phone'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\selectFilter::make('jabatan')
                    ->options(function () {
                        return \App\Models\Dosen::query()
                            ->pluck('jabatan', 'jabatan')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
