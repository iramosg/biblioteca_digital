<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Categorias;
use App\Livros;

class CategoriasController extends Controller
{
    public function index($url_amigavel)
    {
        $categoria = Categorias::carregarUrl($url_amigavel);
        $maisRecentes = Livros::ultimosLivrosCategoria($categoria->id);
        $livros = Livros::livrosCategoria($categoria->id);
        $classpage = 'categoria';
        return view('categorias.categoria', compact(['classpage', 'maisRecentes', 'categoria', 'livros', 'classpage']));
    }

    public function buscarLivro(Request $request)
    {
        $categoria  = $request->id;
        $like = $request->busca;
        $livros = Livros::buscarLivroCategoria($like, $categoria);
        $classpage = 'resultado-busca';        
        return view('categorias.busca', compact(['classpage', 'livros', 'categoria', 'like']));
    }
}
