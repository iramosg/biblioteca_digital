<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;

class CategoriasController extends Controller
{
    //Retorna a lista de categorias no painel administrativo
    public function index()
    {
        $categorias = Categorias::lista();
        return view('admin.categorias.index', compact('categorias'));
    }
}
