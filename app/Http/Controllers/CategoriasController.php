<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Categorias;
use App\Livros;

class CategoriasController extends Controller
{
    public function index($id)
    {
        $categoria = Categorias::carregar($id);
        $livros = Livros::livrosCategoria($id);

        return view('categorias.categoria', compact(['categoria', 'livros']));
    }
}
