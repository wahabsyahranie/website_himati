<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pengaduan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PengaduanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\PengaduanResource\Widgets\PengaduanOverview;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Layanan Umum';
    protected static ?string $navigationLabel = 'Advokasi';
    protected static ?int $navigationSort = 6;

    //MEMBUAT BADGE ANGKA PADA SIDE PANEL
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'ditinjau')->count();
    }
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Pengaduan yang masih ditinjau';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->autocomplete(false)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(7)
                    ->autocomplete(false)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar')
                    ->helperText("Uploading an image is optional if none is available.")
                    ->disk('public')
                    ->imageEditor()
                    ->image()
                    ->imageCropAspectRatio('2:1')
                    ->directory('pengaduan')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 'pengaduan-' . $file->hashName()
                    ),
                Forms\Components\Select::make('tujuan')
                    ->native(false)
                    ->required()
                    ->options([
                        'jurusan' => 'Jurusan',
                        'dosen' => 'Dosen',
                        'hmj ti' => 'HMJ TI',
                    ]),
                Forms\Components\Select::make('user_id')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->label('Pelapor')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Pengaduan'),
            ])
            ->query(
                static::getEloquentQuery()
                    ->with('user') // Eager load relasi di sini
            )
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->square(),
                Tables\Columns\TextColumn::make('judul')
                    ->limit(25)
                    ->searchable()
                    ->description(fn (Pengaduan $record): string => $record->user->name, position: 'above'),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()->color(function ($record) {
                        return match ($record->status) {
                            'dipublikasikan' => 'success',
                            'ditolak' => 'danger',
                            default => 'warning',
                        };
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(function () {
                        return \App\Models\Pengaduan::query()
                            ->pluck('status', 'status')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    // Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('tolak')
                        ->label('Tolak')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Pengaduan $record) => $record->status !== 'ditolak')
                        ->action(function (Pengaduan $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('setujui')
                        ->label('Publikasikan')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Pengaduan $record) => $record->status !== 'dipublikasikan')
                        ->action(function (Pengaduan $record) {
                            $record->update(['status' => 'dipublikasikan']);
                        }),
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
