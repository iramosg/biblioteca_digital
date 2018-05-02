<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livros extends SuperModel
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
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }
    
    public static function lista()
    {
        return Livros::all();
    }
    
    public static function carregar($id)
    {
        return Livros::find($id);
    }
    
    public static function salvar(Request $request, $userId, $id = null)
    {
        
        if($id == null){
            $salvar = new Livros();
            $salvar->userIdCreated = $userId;
        } else {
            $salvar = Livros::carregar($id);
            $salvar->userIdUpdated = $userId;            
        }
        
        $salvar->autor_id = $userId;
        $salvar->titulo = $titulo;
        $salvar->ano = $request->ano;
        $salvar->descricao = $request->descricao;
        $salvar->preco = $request->preco;
        $salvar->isbn = $request->isbn;
        $salvar->activated = $request->activated;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }
    
}
