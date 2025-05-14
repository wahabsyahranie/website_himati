<?php

namespace App\Filament\Pages\Auth;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getNimFormComponent(),
                        $this->getTahunFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getTeleponFormComponent(),
                        $this->getProdiFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
