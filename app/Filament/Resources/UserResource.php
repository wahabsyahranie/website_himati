<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Exports\UserExporter;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Filament\Actions\Exports\Enums\ExportFormat;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

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
                Forms\Components\TextInput::make('name')
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
                ExportAction::make()
                    ->exporter(UserExporter::class)
                    ->label('Ekspor Data'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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
                        return \App\Models\User::query()
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
                    ExportBulkAction::make()
                        ->exporter(UserExporter::class)
                        ->label('Ekspor Data'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
