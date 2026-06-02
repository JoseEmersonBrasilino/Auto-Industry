<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Produto extends Model
{
    protected $fillable = [
        'nome','codigo_id','fabricante_fornecedor', 'preco','num_serie', 'compatibilidade_robo','tempo_vida_util_horas','localizacao_almoxarifado'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class,'produto_id' );
    }
}