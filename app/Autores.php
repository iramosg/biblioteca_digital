<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $table = 'autores';
    
    protected $fillable = [
        
        'id_livro',
        'id_usuario',
        'nome',
        'sobrenome',
        'descricao',            
        
        'actived',
        'userIdCreated',
        'userIdUpdated'
    ];
    
}
