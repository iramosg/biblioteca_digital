<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends SuperModel
{
    protected $table = 'categorias';
    
    protected $fillable = [
        
        'categoria',
        'bid',            
        'icone',            
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    
    
    public static function lista()
    {
        return Categorias::all();
    }
    
    public static function carregar($id)
    {
        return Categorias::find($id);
    }

    public static function salvar(Request $request, $userId, $id = null)
    {

        if($id == null){
            $salvar = new Categorias();
            $salvar->userIdCreated = $userId;
        } else {
            $salvar = Categorias::carregar($id);
            $salvar->userIdUpdated = $userId;            
        }

        $icone = $request->file('icone');
        $ext = ['docx', 'jpg', 'png', 'jpeg'];

        if($icone->isValid() && in_array($icone->extension(), $ext))
        {
            $icone->store('categorias/icones');
        }
        
        $salvar->nome = $request->nome;
        $salvar->bid = $request->bid;
        $salvar->icone = $icone;
        $salvar->activated = $request->activated;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }

}
