<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;

class Login extends BaseLogin
{
    // Substitui o input visual de Email para Login
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('login')
            ->label('Login')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    // Mapeia os dados do formulário para as credenciais corretas
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'login' => $data['login'],
            'password'  => $data['password'],
        ];
    }
}