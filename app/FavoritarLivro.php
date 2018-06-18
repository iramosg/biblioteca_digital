<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritarLivro extends SuperModel
{
    protected $table = 'favoritar_livros';
    
    protected $fillable = [
        
        'id_usuario',
        'id_livro',            
        
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
    
    public static function salvar($userid,$livroid)
    {  
        
        $salvar = new FavoritarLivro();
        $salvar->usuario_id = $userid;
        $salvar->livro_id = $livroid;

        // dd($salvar);
        $salvar->save();
            
        return $salvar;
    }

}
