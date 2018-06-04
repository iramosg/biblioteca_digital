<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuarios;
use Session;
use Auth;

class UsuariosController extends Controller
{
    //Views
    public function cadastrar()
    {
        return view('login.cadastrar');
    }
    //End Views
    
    //Salvar Usuario
    public function store(Request $request)
    {  
        try{

            $usuarios = Usuarios::salvar($request, Auth::id());

            if($usuarios->id > 0){
                Session::put("sucesso", true); 
                return redirect()->route('login.index');
            }

            Session::put("erro", true); 
            return redirect()->route('login.cadastrar');

        }catch (\Illuminate\Database\QueryException $e){

            Session::put("erro", true); 
            return redirect()->route('login.cadastrar');
            
        }catch(\Exception $e){ 

            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('login.cadastrar');  
        }
    }
    //End Salvar Usuarios
}