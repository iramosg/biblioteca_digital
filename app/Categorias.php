<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends SuperModel
{
    protected $table = 'categorias';
    
    protected $fillable = [
        
        'categoria',
        'bid',            
        
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


}
