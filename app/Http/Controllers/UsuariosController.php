<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuarios;
use Session;
use Auth;
use Mail;
use App\Mail\BemVindo;

class UsuariosController extends Controller
{
    //Views
    public function cadastrar()
    {
        $classpage = 'cadastro';
        return view('login.cadastrar', compact('classpage'));
    }
    //End Views
    
    //Salvar Usuario
    public function store(Request $request)
    {  
        try{
            
            $usuarios = Usuarios::salvar($request, Auth::id());
            
            if($usuarios->id > 0){

                Mail::to($usuarios->email)
                ->send(new BemVindo($usuarios->nome, $usuarios->email));

                Session::put("sucesso", true);
                Auth::login($usuarios);
                return redirect()->route('perfil.editar');
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