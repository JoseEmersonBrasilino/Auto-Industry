<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;

class Login extends BaseLogin
{
    // Substitui o input visual de Email para customizar o rótulo
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('E-mail') // 👈 Alterado para 'E-mail' para combinar com seu banco atual
            ->email()        // 👈 Garante que o usuário digite um formato de e-mail válido
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    // Mapeia os dados do formulário para as credenciais corretas
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email'    => $data['email'], // 👈 CORRIGIDO: Chave 'email' recebendo o valor de 'email'
            'password' => $data['password'],
        ];
    }
}