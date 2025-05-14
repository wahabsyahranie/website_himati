<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pengurus;
use Filament\Forms\Form;
use Filament\Tables\Table;
use DeepCopy\Filter\Filter;
use Filament\Resources\Resource;
use Filament\Forms\FormsComponent;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\PengurusExporter;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\PengurusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Filament\Resources\PengurusResource\RelationManagers\KegiatansRelationManager;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    // protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Pengurus HMJ TI';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Nama Mahasiswa')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('nomor_induk')
                    ->label('Nomor Induk Anggota')
                    ->autocomplete(false)
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('jabatan')
                    ->searchable()
                    ->required()
                    ->native(false)
                    ->options([
                        'ketua umum' => 'Ketua Umum',
                        'wakil Ketua Umum' => 'Wakil Ketua Umum',
                        'sekretaris umum' => 'Sekretaris Umum',
                        'bendahara umum' => 'Bendahara Umum',
                        'kepala departemen' => 'Kepala Departemen',
                        'sekretaris departemen' => 'Sekretaris Departemen',
                        'anggota departemen' => 'Anggota Departemen',
                    ]),
                Forms\Components\TextInput::make('periode')
                    ->required()
                    ->autocomplete(false)
                    ->numeric(),
                Forms\Components\Select::make('departemen')
                    ->searchable()
                    ->multiple()
                    ->required()
                    ->placeholder('Pilih Departemen')
                    ->options([
                        'kpsdm' => 'KPSDM',
                        'agama' => 'Agama',
                        'minba' => 'MINBA',
                        'humed' => 'HUMED',
                        'danus' => 'DANUS',
                        'drt' => 'DRT',
                    ]),
                Forms\Components\TextInput::make('status')
                    ->label('Status Keanggotaan')
                    ->default('Pengurus')
                    ->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pengurus'),
                ExportAction::make()
                    ->exporter(PengurusExporter::class)
                    ->label('Ekspor Data'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nomor_induk')
                    ->label('NIA')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('periode')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departemen')
                    ->badge()
                    ->limitList(1)
                    ->color(function ($state) {
                        return match ($state) {
                            'minba' => 'warning',
                            'kpsdm' => 'success',
                            'agama' => 'info',
                            'humed' => 'danger',
                            'danus' => 'info',
                            default => 'success',
                        };
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color(function ($state) {
                        return match ($state) {
                            'alb' => 'info',
                            'keluar' => 'danger',
                            'pengurus' => 'success',
                            default => 'warning',
                        };
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('periode')
                    ->options(function () {
                        return \App\Models\Pengurus::query()
                            ->pluck('periode', 'periode')
                            ->unique()
                            ->sort()
                            ->toArray();
                    }),
                SelectFilter::make('jabatan')
                    ->options(function () {
                        return \App\Models\Pengurus::query()
                            ->pluck('jabatan', 'jabatan')
                            ->unique()
                            ->sort()
                            ->toArray();
                    }),
                SelectFilter::make('status')
                    ->options(function () {
                        return \App\Models\Pengurus::query()
                            ->pluck('status', 'status')
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
                    Tables\Actions\Action::make('alb')
                        ->label('Tandai ALB')
                        ->icon('heroicon-m-user')
                        ->color('info')
                        ->tooltip('Tandai sebagai Anggota Luar Biasa')
                        ->visible(fn (Pengurus $record) => $record->status === 'pengurus')
                        ->requiresConfirmation()
                        ->action(fn (Pengurus $record) => $record->update(['status' => 'alb'])),

                    Tables\Actions\Action::make('keluar')
                        ->label('Tandai Keluar')
                        ->icon('heroicon-o-user-minus')
                        ->color('danger')
                        ->tooltip('Tandai sebagai bukan pengurus')
                        ->visible(fn (Pengurus $record) => $record->status !== 'keluar')
                        ->requiresConfirmation()
                        ->action(fn (Pengurus $record) => $record->update(['status' => 'keluar'])),

                    Tables\Actions\Action::make('pengurus')
                        ->label('Tandai Pengurus Aktif')
                        ->icon('heroicon-m-user-plus')
                        ->color('success')
                        ->tooltip('Tandai sebagai pengurus aktif')
                        ->visible(fn (Pengurus $record) => $record->status !== 'pengurus')
                        ->requiresConfirmation()
                        ->action(fn (Pengurus $record) => $record->update(['status' => 'pengurus'])),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(PengurusExporter::class)
                        ->label('Ekspor Data'),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KegiatansRelationManager::class,
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
