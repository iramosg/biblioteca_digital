<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Categorias;
use Illuminate\Support\Facades\Storage;
use Auth;
use Session;

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
    
    //Função para cadastrar categoria no banco de dados
    public function store(Request $request)
    {
        try
        {
            //dd();
            $categoria = Categorias::salvar($request, Auth::guard('admin')->id());
            
            if($categoria->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('admin.categorias.index');
            }
            
            Session::put("erro", true); 
            return redirect()->route('admin.categorias.cadastrar');   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('admin.categorias.cadastrar');  
        }
    }
    
    //End Posts
}
