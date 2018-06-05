<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Seguidores;

class PerfilController extends Controller
{
    //View que retorna o perfil do usuário

    public function index($url_amigavel)
    {
        $perfil = Usuarios::perfilUrl($url_amigavel);
        $seguidores = Seguidores::seguidoresUsuario($perfil->id);
        $livros = Livros::livrosUsuario($perfil->id);

        $totalSeguidores = Seguidores::seguidoresUsuarioCount($perfil->id);
        $totalSeguindo = Seguidores::seguindoUsuarioCount($perfil->id);

        return view('perfil.index', compact(['perfil', 'seguidores', 'totalSeguidores', 'totalSeguindo']));
    }
}
