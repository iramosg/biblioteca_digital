<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Seguidores;
use App\Livros;
use App\RedesSociaisUsuarios;

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

        return view('perfil.index', compact(['perfil', 'livros', 'seguidores', 'totalSeguidores', 'totalSeguindo']));
    }

    public function editar($url_amigavel)
    {
        $usuario = Usuarios::perfilUrl($url_amigavel);
        $redes_sociais = RedesSociaisUsuarios::carregar($usuario->id);

        return view('perfil.editar', compact(['usuario', 'redes_sociais']));
    }
}
