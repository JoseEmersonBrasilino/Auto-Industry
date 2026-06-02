<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;

class Estoque extends Model
{
    protected $fillable = [
        'id_movimentacao','id_produto','tipo_movimentacao', 'quantidade','nivel_minimo', 'data_movimentacao'
    ];

    public function estoque(){
        return $this->belongsTo(Estoque::class,'produto_id' );
    }
}