<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    //Views
    public function cadastrar()
    {
        return view('login.cadastrar');
    }
    //End Views
}
