<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class Usuarios extends SuperModel implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'usuarios';
    
    use Authenticatable, CanResetPassword;
    
    protected $fillable = [
        
        'nome',
        'sobrenome',
        'senha',
        'email',
        'tipo',            
        'foto',
        'capa',
        'assinatura',
        'url_amigavel',           
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    public static function lista()
    {
        return Usuarios::all();
    }
    
    public static function carregar($id)
    {
        return Usuarios::find($id);
    }
    
    public static function perfilUrl($url_amigavel)
    {
        return Usuarios::where('url_amigavel', $url_amigavel)->first();
    }
    
    public static function salvar(Request $request,$userId,$id = null){

        if($id == null){
            $salvar = new Usuarios();
            $salvar->userIdCreated = 1;
        }

        $salvar->redes_sociais_id = 0;
        $salvar->nome = $request->nome;
        $salvar->sobrenome = $request->sobrenome;
        $salvar->sobre = $request->sobre;
        $salvar->email = $request->email;
        $salvar->data_nascimento = $request->data_nascimento;
        $salvar->telefone = $request->telefone;
        $salvar->senha = Hash::make($request->senha);
        $salvar->foto = "http://lorempixel.com/256/256";
        $salvar->capa = "http://lorempixel.com/1920/1080/";
        $salvar->url_amigavel = $request->$url_amigavel;
        $salvar->remember_token = str_random(20);  
        $salvar->save();
        return $salvar;
    }
}
