<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrmawaResource\Pages;
use App\Filament\Resources\OrmawaResource\RelationManagers;
use App\Models\Ormawa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrmawaResource extends Resource
{
    protected static ?string $model = Ormawa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Ormawa';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Ormawa')
                    ->required(),
                Forms\Components\TextInput::make('username')
                    ->label('Username')
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->password(),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon / Humas')
                    ->required()
                    ->tel(),
                Forms\Components\TextInput::make('email')
                    ->label('Email Ormawa')
                    ->required()
                    ->email(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon / Humas'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
            ])
            ->filters([

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
            'index' => Pages\ListOrmawas::route('/'),
            'create' => Pages\CreateOrmawa::route('/create'),
            'edit' => Pages\EditOrmawa::route('/{record}/edit'),
        ];
    }
}
