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
        // dd($categoria->url_amigavel);

        $livros = Livros::livrosCategoria($categoria->id);
        //dd($livros);
        return view('categorias.categoria', compact(['categoria', 'livros']));
    }

    public function buscarLivro(Request $request)
    {
        $categoria  = $request->id;
        $like = $request->busca;
        $livros = Livros::buscarLivroCategoria($like, $categoria);
        return view('categorias.busca', compact(['livros', 'categoria', 'like']));
    }
}
