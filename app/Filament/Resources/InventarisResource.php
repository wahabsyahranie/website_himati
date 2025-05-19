<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Inventaris;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InventarisResource\Pages;
use App\Filament\Resources\InventarisResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    // protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Inventaris';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Inventaris')
                    ->autocomplete(false)
                    ->required(),
                // Forms\Components\TextInput::make('stok')
                //     ->label('Stok Inventaris')
                //     ->autocomplete(false)
                //     ->required(),
                Forms\Components\TextInput::make('harga')
                    ->label('Harga Sewa / Hari')
                    ->autocomplete(false)
                    ->required()
                    ->prefix('Rp.')
                    ->numeric()
                    ->maxValue(42949672.95),
                Forms\Components\TextArea::make('deskripsi')
                    ->label('Deskripsi Barang')
                    ->cols(5)
                    ->rows(5)
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                ->disk('public')
                ->imageEditor()
                ->image()
                ->imageCropAspectRatio('1:1')
                ->directory('produk')
                ->getUploadedFileNameForStorageUsing(
                    fn (TemporaryUploadedFile $file): string => 'produk-' . $file->hashName()
                ),
            ]);
    }

    /**
     * Define the table columns that should be shown for this resource.
     *
     * @param  \Filament\Tables\Table  $table
     * @return \Filament\Tables\Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->heading('Data inventaris')
            ->description('Kelola inventaris HMJ TI disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Inventaris'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->sortable()
                    // ->prefix('Rp. '),
                    ->money('IDR', locale: 'nl'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(function ($record) {
                        return match ($record->status) {
                            'tersedia' => 'success',
                            'rusak' => 'danger',
                            default => 'gray',
                        };
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('Tandai Tersedia')
                        ->color('success')
                        ->icon('heroicon-o-check-circle') 
                        ->visible(fn (Inventaris $record) => $record->status !== 'tersedia')
                        ->action(function (Inventaris $record) {
                            $record->update(['status' => 'tersedia']);
                        }),
                    Tables\Actions\Action::make('Tandai Rusak')
                        ->color('danger')
                        ->icon('heroicon-o-x-circle')
                        ->visible(fn (Inventaris $record) => $record->status !== 'rusak')
                        ->action(function (Inventaris $record) {
                            $record->update(['status' => 'rusak']);
                        }),
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
            RelationManagers\DetailPenyewaansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInventaris::route('/'),
            'create' => Pages\CreateInventaris::route('/create'),
            'edit' => Pages\EditInventaris::route('/{record}/edit'),
        ];
    }
}
