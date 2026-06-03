<?php

namespace App\Models;

use Filament\Models\Contracts\HasName; // 💡 IMPORTANTE: Adicione este import
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasName // 💡 IMPORTANTE: Adicione o "implements HasName"
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nome',
        'login',
        'senha',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    // Avisa o Laravel que o campo de segurança é 'login'
    public function getAuthIdentifierName()
    {
        return 'login';
    }

    // Avisa o Laravel onde está a senha criptografada
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * 💡 O TOQUE FINAL: Diz ao Filament para usar a coluna 'nome' no painel visual
     */
    public function getFilamentName(): string
    {
        return $this->nome;
    }
}