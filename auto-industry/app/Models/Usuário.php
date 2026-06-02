<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuário;

class Usuário extends Model
{
    protected $fillable = [
        'id_usuario', 'nome', 'login','senha'
    ];

    public function usuario(){
        return $this->belongsTo(Usuário::class,'produto_id' );
    }
}