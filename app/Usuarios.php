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
}
