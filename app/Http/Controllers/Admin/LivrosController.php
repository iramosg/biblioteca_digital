<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Livros;

class LivrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Retorna a lista de livros no painel administrativo
    public function index()
    {
        $livros = Livros::lista();
        return view('admin.livros.index', compact('livros'));
    }

    public function cadastrar()
    {
        return view('admin.livros.cadastrar');
    }
}
