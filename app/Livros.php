<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $table = 'livros';
    
    protected $fillable = [
        
        'id_usuario',
        'titulo',
        'ano',
        'descricao',
        'preco',
        'download_previo',
        'download',
        'isbn',            
        
        'actived',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }
}
