<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [

            'nome',
            'sobrenome',
            'senha',
            'email',
            'tipo',            
            'foto',
            'capa',
            'assinatura',
            'url_amigavel',           
            
            'actived',
            'userIdCreated',
            'userIdUpdated'
    ];
}
