<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class PerfilController extends Controller
{
    //View que retorna o perfil do usuário

    public function index($url_amigavel)
    {
        $perfil = Usuarios::perfilUrl($url_amigavel);
        return view('perfil.index', compact('perfil'));
    }
}
