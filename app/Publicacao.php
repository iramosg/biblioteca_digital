<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Publicacao extends SuperModel
{
    protected $table = 'publicacoes';
    
    protected $fillable = [
        
        'id',
        'usuario_id',
        'perfil_id',         
        
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }

    public function perfil(){
        return $this->belongsTo('App\Usuarios');
    }

    public static function lista($id)
    {
        return Publicacao::where('perfil_id', $id)->get();
    }

    public static function salvar(Request $request)
    {
        $salvar = new Publicacao();
        $salvar->perfil_id = $request->idPerfil;
        $salvar->usuario_id = $request->idUsuario;
        $salvar->post = $request->content;
        $salvar->userIdCreated = $request->idUsuario;
        
        $salvar->save();
        
        return $salvar;
    }

    public static function remover($idPostagem)
    {
        return Publicacao::where('id', $idPostagem)
        ->delete();
    }
}
