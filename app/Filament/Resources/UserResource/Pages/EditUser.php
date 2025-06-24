<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //Custom Edit Form
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->model($this->getRecord())
                    ->statePath($this->getFormStatePath())
                    ->columns($this->hasInlineLabels() ? 1 : 2)
                    ->inlineLabel($this->hasInlineLabels())
                    ->operation('edit')
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getTeleponFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmFormComponent(),
                        $this->getTipeFormComponent(),
                        $this->getRoleFormComponent(),
                        $this->getFieldMhsFormComponent(),
                        $this->getFieldDsnFormComponent(),
                        $this->getFieldOrmFormComponent(),
                    ])
            ),
        ];
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
                ->required()
                ->autocomplete(false)
                ->maxLength(255);
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
                ->email()
                ->autocomplete(false)
                ->required()
                ->maxLength(255);
    }

    protected function getTeleponFormComponent(): Component
    {
        return TextInput::make('nomor_telepon')
                ->tel()
                ->required()
                ->autocomplete(false)
                ->maxLength(255);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
                ->confirmed('password_confirmation')
                ->password()
                ->visible(fn () => auth()->user()?->id === $this->record->id)
                ->required()
                ->maxLength(255);
    }

    protected function getPasswordConfirmFormComponent(): Component
    {
        return TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->visible(fn () => auth()->user()?->id === $this->record->id)
                ->maxLength(255);
    }

    protected function getTipeFormComponent(): Component
    {
        return Select::make('tipe_akun')
                ->required()
                ->live()
                ->label('Tipe Akun')
                ->options([
                    'mahasiswa' => 'mahasiswa',
                    'dosen' => 'dosen',
                    'ormawa' => 'ormawa',
                ]);
    }

    protected function getRoleFormComponent(): Component
    {
        return CheckboxList::make('roles')
                ->relationship('roles', 'name')
                ->columns(4)
                ->gridDirection('row');
    }

    protected function getFieldMhsFormComponent(): Component
    {
        return Fieldset::make('mahasiswa')
                ->visible(fn (Get $get) => $get('tipe_akun') === 'mahasiswa')
                ->label('Detail Mahasiswa')
                ->relationship('mahasiswa')
                ->schema([
                    TextInput::make('nim')
                        ->label('NIM')
                        ->required(),
                    TextInput::make('tahun_masuk')
                        ->required(),
                    Select::make('prodi')
                        ->options(fn() => [
                            'TI' => 'Teknik Informatika',
                            'TK' => 'Teknik Komputer',
                            'TIM' => 'Teknik Informatika Multimedia',
                            'TRK' => 'Teknologi Rekayasa Komputer',
                        ])
                        ->columnSpanFull()
                        ->required(),
                    ]);
    }

    protected function getFieldDsnFormComponent(): Component
    {
        return Fieldset::make('dosen')
                ->visible(fn (Get $get) => $get('tipe_akun') === 'dosen')
                ->label('Detail Dosen')
                ->relationship('dosen')
                ->schema([
                    TextInput::make('nip')
                        ->label('NIP')
                        ->required(),
                    TextInput::make('jabatan')
                        ->required(),
                ]);
    }

    protected function getFieldOrmFormComponent(): Component
    {
        return Fieldset::make('ormawa')
                ->visible(fn (Get $get) => $get('tipe_akun') === 'ormawa')
                ->label('Detail Ormawa')
                ->relationship('ormawa')
                ->schema([
                    TextInput::make('nama_pendek')
                        ->label('Nama Singkat')
                        ->required(),
                    FileUpload::make('lambang')
                        ->required()
                        ->disk('public')
                        ->imageEditor()
                        ->image()
                        ->imageCropAspectRatio('1:1')
                        ->directory('ormawa')
                        ->getUploadedFileNameForStorageUsing(
                            fn (TemporaryUploadedFile $file): string => 'ormawa-' . $file->hashName()
                        ),
                ]);
    }
}
