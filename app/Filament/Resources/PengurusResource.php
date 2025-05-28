<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pengurus;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\PengurusEnum;
use DeepCopy\Filter\Filter;
use Filament\Resources\Resource;
use Filament\Forms\FormsComponent;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\PengurusExporter;
use App\Filament\Imports\PengurusImporter;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\PengurusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\PengurusResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
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
                    ->label('NIM Mahasiswa')
                    ->relationship('user.mahasiswa', 'nim')
                    ->searchable()
                    // ->preload()
                    ->required(),
                Forms\Components\TextInput::make('nomor_induk')
                    ->label('Nomor Induk Anggota')
                    ->autocomplete(false)
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('jabatan')
                    ->required()
                    ->native(false)
                    ->options(collect(PengurusEnum::cases())
                        ->mapWithKeys(fn ($enum) => [$enum->value => $enum->label()])
                        ->toArray()
                    ),
                Forms\Components\TextInput::make('periode')
                    ->required()
                    ->autocomplete(false)
                    ->numeric(),
                Forms\Components\Select::make('struktur_id')
                    ->searchable()
                    ->preload()
                    ->relationship('struktur', 'nama_pendek')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->label('Status Keanggotaan')
                    ->default('Pengurus')
                    ->disabled(),
                Forms\Components\FileUpload::make('gambar')
                    ->disk('public')
                    ->imageEditor()
                    ->image()
                    ->imageCropAspectRatio('1:1')
                    ->directory('pengurus')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 'pengurus-' . $file->hashName()
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Data pengurus')
            ->description('Kelola pengurus HMJ TI disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pengurus'),
                ExportAction::make()
                    ->disabled(fn() => !Auth::user()->hasAnyRole(['super_admin', 'admin']))
                    ->exporter(PengurusExporter::class)
                    ->label('Ekspor Data'),
                ImportAction::make()
                    ->disabled(fn() => !Auth::user()->hasAnyRole(['super_admin', 'admin']))
                    ->importer(PengurusImporter::class)
                    ->label('Impor Data'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->circular(),
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
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state->label()),
                Tables\Columns\TextColumn::make('periode')
                    ->sortable(),
                Tables\Columns\TextColumn::make('struktur.nama_pendek')
                    ->label('Struktur')
                    ->badge()
                    ->limitList(1)
                    ->color(function ($state) {
                        return match ($state) {
                            'Minba' => 'warning',
                            'KPSDM' => 'success',
                            'Agama' => 'info',
                            'Humed' => 'danger',
                            'Danus' => 'info',
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
                    ->options(collect(PengurusEnum::cases())->mapWithKeys(fn ($case) => [
                        $case->value => $case->label()
                    ])->toArray()
                    ),
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
                        ->visible(fn (Pengurus $record) =>
                            Auth::user()->hasAnyRole(['super_admin', 'admin']) &&
                            $record->status === 'pengurus'
                        )
                        ->label('ALB')
                        ->icon('heroicon-m-user')
                        ->color('info')
                        ->tooltip('Tandai sebagai Anggota Luar Biasa')
                        ->requiresConfirmation()
                        ->action(fn (Pengurus $record) => $record->update(['status' => 'alb'])),

                    Tables\Actions\Action::make('keluar')
                        ->label('Keluar')
                        ->icon('heroicon-o-user-minus')
                        ->color('danger')
                        ->tooltip('Tandai sebagai bukan pengurus')
                        ->visible(fn (Pengurus $record) =>
                            Auth::user()->hasAnyRole(['super_admin', 'admin']) &&
                            $record->status === 'pengurus'
                        )
                        ->requiresConfirmation()
                        ->action(fn (Pengurus $record) => $record->update(['status' => 'keluar'])),

                    Tables\Actions\Action::make('pengurus')
                        ->label('Aktif')
                        ->icon('heroicon-m-user-plus')
                        ->color('success')
                        ->tooltip('Tandai sebagai pengurus aktif')
                        ->visible(fn (Pengurus $record) =>
                            Auth::user()->hasAnyRole(['super_admin', 'admin']) &&
                            $record->status != 'pengurus'
                        )
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
