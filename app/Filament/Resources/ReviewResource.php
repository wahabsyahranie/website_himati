<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ReviewResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReviewResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Review';
    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('quote')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->helperText("Pisahkan title dengan tanda koma ,"),
                // Forms\Components\Select::make('penguruses_id')
                //     ->label('Nama Pengurus')
                //     ->relationship('pengurus', 'id')
                //     ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name)
                //     ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Review Pengguna')
            ->description('Kelola data review disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Review'),
            ])
            ->columns([
                Tables\Columns\ImageColumn::make('pengurus.gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('quote')
                    ->limit(25),
                Tables\Columns\TextColumn::make('pengurus.user.name')
                    ->searchable()
                    ->limit(25),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(function ($record) {
                        return match ($record->status) {
                            'ditampilkan' => 'success',
                            'disembunyikan' => 'info',
                            default => 'warning',
                        };
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(function () {
                        return \App\Models\Review::query()
                            ->pluck('status', 'status')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('sembunyikan')
                        ->color('info')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Review $record) => $record->status !== 'disembunyikan')
                        ->action(function (Review $record) {
                            $record->update(['status' => 'disembunyikan']);
                        }),
                    Tables\Actions\Action::make('tampilkan')
                        ->color('success')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Review $record) => $record->status !== 'ditampilkan')
                        ->action(function (Review $record) {
                            $record->update(['status' => 'ditampilkan']);
                        }),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
