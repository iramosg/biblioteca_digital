<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Categorias;
use App\Livros;
use App\Usuarios;

class HomeController extends Controller
{
    
    //Views
    public function index()
    {
        $categorias = Categorias::lista();
        $classpage = 'index';
        return view('welcome', compact(['categorias', 'classpage']));
    }
    
    public function escritor()
    {
        $classpage = 'escritor';
        return view('escritor', compact('classpage'));
    }
    
    public function leitor()
    {
        $classpage = 'leitor';
        return view('leitor', compact('classpage'));
    }
    
    public function sobre()
    {
        $classpage = 'sobre';
        return view('sobre', compact('classpage'));
    }
    
    //End Views
    
    //Posts
    
    public function buscar(Request $request)
    {

        $objeto = null;
        //dd($request);
        switch ($request->tipo) {
            case 'categoria':
            $objeto = Categorias::buscar($request->busca);
            break;
            
            case 'livro':
            $objeto = Livros::buscar($request->busca);
            break;
            
            case 'usuario':
            $objeto = Usuarios::buscar($request->busca);
            break;
        }
        //dd($objeto);
        $tipo = $request->tipo;
        $like = $request->busca;
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/public/';  
        $classpage = 'resultado-busca';
        return view('buscar', compact(['classpage', 'objeto', 'like', 'tipo', 'url']));
    }
    
    //End Posts
}
