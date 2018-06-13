<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Seguidores;
use App\Livros;
use Auth;
use Session;

class PerfilController extends Controller
{
    //View que retorna o perfil do usuário
    
    public function index($url_amigavel)
    {
        $perfil = Usuarios::perfilUrl($url_amigavel);
        $seguidores = Seguidores::seguidoresUsuario($perfil->id);
        $seguindo = Seguidores::seguindoUsuario($perfil->id);
        $livros = Livros::livrosUsuario($perfil->id);
        
        $totalSeguidores = Seguidores::seguidoresUsuarioCount($perfil->id);
        $totalSeguindo = Seguidores::seguindoUsuarioCount($perfil->id);
        
        $classpage = 'perfil';
        
        return view('perfil.index', compact(['classpage', 'perfil', 'livros', 'seguidores', 'seguindo', 'totalSeguidores', 'totalSeguindo']));
    }
    
    public function editar($id = null)
    {
        $perfil = Usuarios::carregar(Auth::id());
        $classpage = 'editar-perfil';
        return view('perfil.editar', compact(['perfil', 'classpage']));
    }
    
    public function edit(Request $request)
    {
        //dd($request);
        
        try{
            
            $perfil = Usuarios::editar($request, Auth::id());
            
            if($perfil->id > 0){
                Session::put("sucesso", true); 
                return redirect()->route('perfil.index', ['url_amigavel' => $request->url_amigavel]);
            }
            
            Session::put("erro", true); 
            return redirect()->route('perfil.editar')->withInput();
            
        }catch(\Exception $e){ 
            
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('perfil.editar')->withInput();  
        }
    }
}
