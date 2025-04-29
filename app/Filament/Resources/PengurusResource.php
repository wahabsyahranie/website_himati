<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Pengurus;
use DeepCopy\Filter\Filter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Pengurus HMJ TI';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_induk')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('jabatan')
                    ->options([
                        'Ketua Umum' => 'Ketua Umum',
                        'Wakil Ketua Umum' => 'Wakil Ketua Umum',
                        'Sekretaris Umum' => 'Sekretaris Umum',
                        'Bendahara Umum' => 'Bendahara Umum',
                        'Kepala Departemen' => 'Kepala Departemen',
                        'Sekretaris Departemen' => 'Sekretaris Departemen',
                        'Anggota Departemen' => 'Anggota Departemen',
                    ]),
                Forms\Components\Select::make('mahasiswa_id')
                    ->relationship('mahasiswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('periode')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_induk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mahasiswa.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('periode')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('jabatan')
                    ->options(function () {
                        return \App\Models\Pengurus::query()
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
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
