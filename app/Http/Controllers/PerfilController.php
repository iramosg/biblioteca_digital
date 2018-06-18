<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Seguidores;
use App\Publicacao;
use App\Livros;
use App\FavoritarLivro;
use Auth;
use Session;
use Illuminate\Support\Facades\URL;

class PerfilController extends Controller
{
    //View que retorna o perfil do usuário
    
    public function index($url_amigavel)
    {
        $perfil = Usuarios::perfilUrl($url_amigavel);        
        $seguidores = Seguidores::seguidoresUsuario($perfil->id);        
        $seguindo = Seguidores::seguindoUsuario($perfil->id);    
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/public/';    
        $livros = Livros::livrosUsuario($perfil->id);
        $publicacao = Publicacao::lista($perfil->id);
        $favoritos = FavoritarLivro::lista($perfil->id);
        
        $seguidor = Seguidores::seguindoUsuarioPerfil(Auth::id(), $perfil->id); 
        //dd(count($seguidor));       
        $totalSeguidores = count($seguidores);
        $totalSeguindo = count($seguindo);
        
        $classpage = 'perfil';

        if($perfil->id == Auth::id()) {
            $botao = 'editar';
        } else if(count($seguidor) > 0) {
            $botao = 'deixar_seguir';
        } else {
            $botao = 'seguir';
        }

        // foreach ($seguindo as $dado) {
        //     dd($dado->amigo);
        // }
        return view('perfil.index', compact(['classpage', 'perfil', 'livros', 'seguidores', 'seguindo', 'totalSeguidores', 'totalSeguindo', 'botao', 'url', 'publicacao', 'favoritos']));
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
