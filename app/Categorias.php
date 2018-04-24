<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends SuperModel
{
    protected $table = 'categorias';
    
    protected $fillable = [
        
        'categoria',
        'bid',            
        
        'actived',
        'userIdCreated',
        'userIdUpdated'
    ];
}
