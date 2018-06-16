<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administradores;
use App\Usuarios;
use Auth;
use Session;

class UsuariosController extends Controller
{
    
    //Retorna os usuários administradores do banco de dados
    public function admin()
    {
        $administradores = Administradores::lista();
        return view('admin.usuarios.admin', compact('administradores'));
    }
    
    //Retorna os usuários comuns do banco de dados
    public function usuarios()
    {
        $usuarios = Usuarios::lista();
        return view('admin.usuarios.usuarios', compact('usuarios'));
    }

    //Retorna a view responsável por cadastrar um novo usuário no banco de dados
    public function create()
    {
        return view('admin.usuarios.cadastrar');
    }
    
    //Retorna a view responsável por editar o usuário no banco de dados
    public function editar($id)
    {
        $administrador = Administradores::carregar($id);
        return view('admin.usuarios.editar', compact('administrador'));
    }
    
    //View para editar uma categoria
    public function edit($id)
    {
        $categoria = Categorias::carregar($id);
        return view('admin.categorias.editar', compact('categoria'));
    }
    
    
    //Função para cadastrar um novo usuário administrador no banco de dados
    public function store(Request $request)
    {
        try
        {
            $administrador = Administradores::salvar($request, Auth::guard('admin')->id());
            
            if($administrador->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('admin.usuarios.admin');
            }
            
            Session::put("erro", true); 
            return redirect()->route('admin.usuarios.cadastrar')->withInput();   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('admin.usuarios.cadastrar');  
        }
    }
    
    //Função para editar um usuário no banco de dados
    public function update(Request $request)
    {
        try{
            //dd($request->id);
            $administrador = Administradores::editar($request, Auth::guard('admin')->id(), $request->id);
            //dd($administrador);
            if($administrador->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('admin.usuarios.admin');
            }
            
            Session::put("erro", true); 
            return redirect()->route('admin.usuarios.editar', $request->id);   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('admin.usuarios.editar', $request->id);
        }
    }
    
   
}
