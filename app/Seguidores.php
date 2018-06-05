<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Seguidores extends Model
{
    protected $table = 'seguidores';
    
    protected $fillable = [
        
        'id',
        'usuario_id',
        'amigo_id',         
        
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    public function usuario(){
        return $this->hasOne('App\Usuarios', 'id', 'amigo_id');
    }
    
    public static function seguidoresUsuario($id)
    {
        return Seguidores::where('usuario_id', $id)->get();
    }

    public static function seguidoresUsuarioCount($id)
    {
        return Seguidores::where('usuario_id', $id)->count();
    }

    public static function seguindoUsuarioCount($id)
    {
        return Seguidores::where('amigo_id', $id)->count();
    }


    public static function salvar($idUsuario, $idAmigo)
    {
        
        $salvar->usuario_id = $idUsuario;
        $salvar->amigo_id = $idAmigo;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }
}
