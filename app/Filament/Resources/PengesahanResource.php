<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengesahanResource\Pages;
use App\Filament\Resources\PengesahanResource\RelationManagers;
use App\Models\Pengesahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengesahanResource extends Resource
{
    protected static ?string $model = Pengesahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Pengesahan';
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
                Forms\Components\TextInput::make('bidang')
                    ->label('Bidang/Jurusan/Detail Jabatan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\Select::make('type_nomor_induk')
                    ->label('Tipe Nomor Induk')
                    ->required()
                    ->native(false)
                    ->options([
                        'NIM' => 'NIM',
                        'NIP' => 'NIP'
                    ]),
                Forms\Components\TextInput::make('nomor_induk')
                    ->label('Nomor Induk')
                    ->numeric()
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->tel()
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('prioritas')
                    ->label('Level Prioritas')
                    ->native(false)
                    ->required()
                    ->options([
                        1 => '1 (Pimpinan PTN)', 
                        2 => '2 (Pimpinan Jurusan)',
                        3 => '3 (Pembina)',
                        4 => '4 (Ketua Organisasi)',
                        5 => '5 (Sekretaris/Kepala Departemen/Ketua Panitia)'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pengesahan'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prioritas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_induk')
                    ->label('Nomor Induk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->iconColor('primary')
                    ->limit(13)
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin')
                    ->copyMessageDuration(1500)
                    ->icon('heroicon-m-phone')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\selectFilter::make('jabatan')
                    ->options(function () {
                        return \App\Models\Pengesahan::query()
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
            'index' => Pages\ListPengesahans::route('/'),
            'create' => Pages\CreatePengesahan::route('/create'),
            'edit' => Pages\EditPengesahan::route('/{record}/edit'),
        ];
    }
}
