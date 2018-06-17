<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends SuperModel
{
    protected $table = 'publicacoes';
    
    protected $fillable = [
        
        'id',
        'usuario_id',
        'perfil_id',         
        
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }

    public function perfil(){
        return $this->belongsTo('App\Usuarios');
    }
}
