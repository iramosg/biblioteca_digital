<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{

    //Views

    //Retorna a lista de categorias no painel administrativo
    public function index()
    {
        $categorias = Categorias::lista();
        return view('admin.categorias.index', compact('categorias'));
    }

    //Função que chama a página de cadastrar categoria
    public function cadastrar()
    {
        return view('admin.categorias.cadastrar');
    }

    //Função que chama a página de editar categoria
    public function editar()
    {
        return view('admin.categorias.editar');
    }

    //End Views


    //Posts

    //Função que salva uma categoria no banco de dados
    public function save(Request $request)
    {

        $salvar = Categoria::salvar();

        // $arquivo = $request->file('icone');
        // $input['nome'] = time() . '.' . $arquivo->getClientOriginalExtension();
        // $destinationPath = public_path('/icones');
        // $arquivo->move($destinationPath, $input['nome']);
        // dd($arquivo->path());
    }

    //End Posts
}
