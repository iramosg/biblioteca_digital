<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedesSociaisUsuarios extends Model
{
    protected $table = 'redes_sociais_usuarios';
    
    protected $fillable = [
        
        'id_usuario',
        'facebook',
        'twitter',
        'google_plus',
        'instagram',            
        'tumblr',
        'blog',
        'site',
        'linkedin',
        'vk',            
        
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }
}
