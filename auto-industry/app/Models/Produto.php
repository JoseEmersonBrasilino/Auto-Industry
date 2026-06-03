<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    /**
     * Define a tabela explicitamente (boa prática).
     *
     * @var string
     */
    protected $table = 'produtos';

    /**
     * Atributos que podem ser preenchidos em massa.
     * Já corrigidos com o 'tempo_vida_util_horas' definitivo.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome', 
        'codigo_id', 
        'fabricante_fornecedor', 
        'preco', 
        'num_serie', 
        'compatibilidade_robo', 
        'localizacao_almoxarifado',
        'tempo_vida_util_horas',
    ];

    /**
     * Relacionamento: Um produto pertence a um Usuário (User).
     * Vincula o produto à sua nova tabela 'users' através do ID correspondente.
     */
    public function user()
    {
        // Se a sua tabela de produtos tiver uma coluna 'id_usuario' ou 'user_id', 
        // mapeamos ela aqui como chave estrangeira.
        return $this->belongsTo(User::class, 'id_usuario');
    }
}