<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    // Se a sua coluna de ID no banco de dados ainda for 'id_usuario', mantenha a linha abaixo.
    // Se você mudou para o padrão do Laravel ('id'), pode apagar esta linha.
    protected $primaryKey = 'id_usuario'; 

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 🟢 CORREÇÃO 1: Identificador único de autenticação do Laravel.
     * Como a coluna no banco agora é 'email', precisamos retornar 'email' aqui.
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    /**
     * 🟢 CORREÇÃO 2: Onde está a senha criptografada.
     * Como a coluna agora é 'password', o método padrão do Laravel já resolve. 
     * Se você quiser deixar explícito por segurança, mude para retornar $this->password.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * 🟢 CORREÇÃO 3: Diz ao Filament qual coluna exibir no painel visual.
     * Como você mudou a coluna do banco de 'nome' para 'name', altere aqui também.
     */
    public function getFilamentName(): string
    {
        return $this->name;
    }
}