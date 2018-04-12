<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    protected $table = 'seguidores';
    
    protected $fillable = [
        
        'id_usuario',
        'seguidor',         
        
        'actived',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }
}
