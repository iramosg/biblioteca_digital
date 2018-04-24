<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingLivro extends SuperModel
{
    protected $table = 'ranking_livros';
    
    protected $fillable = [
        
        'id_usuario',
        'id_livro',
        'ranking',            
        
        'actived',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }
    
    public function livro(){
        return $this->belongsTo('App\Livros');
    }
}
