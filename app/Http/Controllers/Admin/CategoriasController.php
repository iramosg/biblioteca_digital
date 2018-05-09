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

    //View que lista as categorias
    public function index()
    {
        $categorias = Categorias::lista();
        return view('admin.categorias.index', compact('categorias'));
    }
    
    //View para salvar categoria
    public function create()
    {
        return view('admin.categorias.cadastrar');
    }
    
    //Função para cadastrar categoria no banco de dados
    public function store(Request $request)
    {
        try
        {
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
    
    //View para editar uma categoria
    public function edit($id)
    {
        $categoria = Categorias::carregar($id);
        return view('admin.categorias.editar', compact('categoria'));
    }
    
    //Função para editar uma categoria no banco de dados
    public function update(Request $request)
    {
        try{
            //dd($request->id);
            $categoria = Categorias::salvar($request, Auth::guard('admin')->id(), $request->id);
            //dd($categoria);
            if($categoria->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('admin.categorias.index');
            }
            
            Session::put("erro", true); 
            return redirect()->route('admin.categorias.editar', $request->id);   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('admin.categorias.editar', $request->id);
        }
    }
    
    //Função para deletar uma categoria no banco de dados
    public function destroy(Categorias $categoria)
    {
        //Falta fazer a função
    }

}