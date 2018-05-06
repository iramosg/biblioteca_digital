<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\SuperModel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
        $ext = ['jpg', 'png', 'jpeg', 'gif'];

        if($icone->isValid() && in_array($icone->extension(), $ext))
        {
            //$icone = Storage::putFile('categorias/icones', $request->file('icone'));
            $icone = $icone->store('categorias/icones');
            //dd($icone);
        }
        
        //dd($icone);

        $salvar->categoria = $request->nome;
        $salvar->bid = $request->bid;
        $salvar->icone = $icone;
        $salvar->activated = true;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }
}
