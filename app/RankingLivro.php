<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingLivro extends SuperModel
{
    protected $table = 'ranking_livros';

    public $timestamps = false;
    
    protected $fillable = [
        
        'id_usuario',
        'id_livro',
        'ranking',            
        
        'activated',
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

    public static function salvar($rank,$userid,$livroid)
    {  

        
        //"INSERT INTO ranking_livros (usuario_id, livro_id, ranking) VALUES ('$userid', '$livroid', '$rank')";
        $salvar = new RankingLivro();
        $salvar->usuario_id = $userid;
        $salvar->livro_id = $livroid;
        $salvar->ranking = $rank;

        // dd($salvar);
        $salvar->save();
            
        return $salvar;
    }
}
