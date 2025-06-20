<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\UserExporter;
use App\Filament\Imports\UserImporter;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Filament\Actions\Exports\Enums\ExportFormat;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Pengguna';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Forms\Components\Select::make('tipe_akun')
                    ->required()
                    ->live()
                    ->label('Tipe Akun')
                    ->options([
                        'mahasiswa' => 'mahasiswa',
                        'dosen' => 'dosen',
                        'ormawa' => 'ormawa',
                    ]),
                Forms\Components\CheckboxList::make('roles')
                    ->relationship('roles', 'name')
                    ->columns(4)
                    ->gridDirection('row'),
                Forms\Components\Fieldset::make('mahasiswa')
                    ->visible(fn (Get $get) => $get('tipe_akun') === 'mahasiswa')
                    ->label('Detail Mahasiswa')
                    ->relationship('mahasiswa')
                    ->schema([
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required(),
                        Forms\Components\TextInput::make('tahun_masuk')
                            ->required(),
                        Forms\Components\Select::make('prodi')
                            ->options(fn() => [
                                'TI' => 'Teknik Informatika',
                                'TK' => 'Teknik Komputer',
                                'TIM' => 'Teknik Informatika Multimedia',
                                'TRK' => 'Teknologi Rekayasa Komputer',
                            ])
                            ->columnSpanFull()
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('dosen')
                    ->visible(fn (Get $get) => $get('tipe_akun') === 'dosen')
                    ->label('Detail Dosen')
                    ->relationship('dosen')
                    ->schema([
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->required(),
                        Forms\Components\TextInput::make('jabatan')
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('ormawa')
                    ->visible(fn (Get $get) => $get('tipe_akun') === 'ormawa')
                    ->label('Detail Ormawa')
                    ->relationship('ormawa')
                    ->schema([
                        Forms\Components\TextInput::make('nama_pendek')
                            ->label('Nama Singkat')
                            ->required(),
                        Forms\Components\FileUpload::make('lambang')
                            ->required()
                            ->disk('public')
                            ->imageEditor()
                            ->image()
                            ->imageCropAspectRatio('1:1')
                            ->directory('ormawa')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => 'ormawa-' . $file->hashName()
                            ),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Data pengguna')
            ->description('Kelola pengguna website disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pengguna'),
                ExportAction::make()
                    ->visible(fn() => Auth::user()->hasAnyRole(['super_admin', 'admin']))
                    ->exporter(UserExporter::class)
                    ->label('Ekspor Data'),
                // ImportAction::make()
                //     ->visible(fn() => Auth::user()->hasAnyRole(['super_admin', 'admin']))
                //     ->importer(UserImporter::class)
                //     ->label('Impor Data'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->limit(20)
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('userDetail.nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('userDetail.prodi')
                    ->label('Prodi')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('userDetail.tahun_masuk')
                    ->label('Tahun Masuk')
                    ->limit(4)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('prodi')
                    ->relationship('mahasiswa', 'prodi'),
                    Tables\Filters\SelectFilter::make('tahun_masuk')
                    ->relationship('mahasiswa', 'tahun_masuk'),
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
