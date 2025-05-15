<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Struktur;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StrukturResource\Pages;
use App\Filament\Resources\StrukturResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class StrukturResource extends Resource
{
    protected static ?string $model = Struktur::class;
    // protected static ?string $navigationIcon  = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Struktur Organisasi';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required(),
                Forms\Components\TextInput::make('nama_pendek')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->disk('public')
                    ->imageEditor()
                    ->image()
                    ->imageCropAspectRatio('1:1')
                    ->directory('struktur')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 'struktur-' . $file->hashName()
                    ),
                Forms\Components\Select::make('prioritas')
                    ->required()
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                        6 => '6',
                        7 => '7',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('kode'),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStruktur::route('/'),
            'create' => Pages\CreateStruktur::route('/create'),
            'edit' => Pages\EditStruktur::route('/{record}/edit'),
        ];
    }
}
