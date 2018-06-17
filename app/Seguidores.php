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
        
        'created_at',
        'updated_at'
    ];
    
    //Chaves
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }

    public function amigo(){
        return $this->belongsTo('App\Usuarios');
    }

    public static function seguidoresUsuario($id)
    {
        return Seguidores::where('amigo_id', $id)->get();
    }

    public static function seguindoUsuario($id)
    {
        return Seguidores::where('usuario_id', $id)->get();
    }

    public static function seguindoUsuarioPerfil($idUsuario, $idAmigo)
    {
        return Seguidores::where('usuario_id', $idUsuario)
        ->where('amigo_id', $idAmigo)
        ->get();
    }

    public static function seguidoresUsuarioCount($id)
    {
        return Seguidores::where('amigo_id', $id)->count();
    }

    //nao precisa pois vc já tem esse dado na funcao seguindoUsuario kkkkk
    public static function seguindoUsuarioCount($id)
    {
        return Seguidores::where('usuario_id', $id)->count();
    }


    public static function salvar(Request $request)
    {
        $salvar = new Seguidores();
        $salvar->usuario_id = $request->usuario;
        $salvar->amigo_id = $request->id;
        $salvar->amigo_id = $request->id;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }

    public static function remover($idUsuario, $idAmigo)
    {
        return Seguidores::where('usuario_id', $idUsuario)
        ->where('amigo_id', $idAmigo)
        ->delete();
    }
}
