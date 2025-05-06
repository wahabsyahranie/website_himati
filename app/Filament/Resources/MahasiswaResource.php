<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;
    // protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Mahasiswa';
    protected static ?int $navigationSort = 1;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(9)
                    ->autocomplete(false),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->tel()
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->confirmed('password_confirmation')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_masuk')
                    ->required()
                    ->autocomplete(false),
                Forms\Components\Select::make('prodi')
                    ->required()
                    ->native(false)
                    ->options([
                        'TI' => 'D3 - Teknik Informatika',
                        'TK' => 'D3 - Teknik Komputer',
                        'TIM' => 'D4 - Teknik Informatika dan Multimedia',
                        'TRK' => 'D4 -  Teknologi Rekayasa Komputer',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Mahasiswa'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->limit(20)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_masuk')
                    ->label('Tahun Masuk')
                    ->limit(4)
                    ->sortable(),
                Tables\Columns\TextColumn::make('prodi'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->limit(15)
                    ->iconColor('primary')
                    ->icon('heroicon-m-envelope')
                    ->copyable()
                    ->copyMessage('Alamat email disalin')
                    ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->limit(13)
                    ->searchable()
                    ->sortable()
                    ->iconColor('primary')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin')
                    ->copyMessageDuration(1500),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('prodi')
                    ->options([
                        'TI' => 'D3 - Teknik Informatika',
                        'TK' => 'D3 - Teknik Komputer',
                        'TIM' => 'D4 - Teknik Informatika dan Multimedia',
                        'TRK' => 'D4 -  Teknologi Rekayasa Komputer',
                    ]),
                Tables\Filters\SelectFilter::make('tahun_masuk')
                    ->options(function () {
                        return \App\Models\Mahasiswa::query()
                            ->pluck('tahun_masuk', 'tahun_masuk')
                            ->unique()
                            ->sort()
                            ->toArray();
                    }),
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
            RelationManagers\PengaduansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
