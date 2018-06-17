<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Seguidores;

class SeguidoresController extends Controller
{
    //Adicionar amigo
    public function adicionar(Request $request)
    {
        //dd($request);
        try{
            
            $adicionar = Seguidores::salvar($request);
            //dd($adicionar);
            if($adicionar){
                Session::put("sucesso", true); 
                return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]);
            }
            
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]);
            
        }catch(\Exception $e){ 
            
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]); 
        }
    }
    
    //Remover Amigo
    
    public function remover(Request $request)
    {
        //dd($request);
        try{
            
            $remover = Seguidores::remover(Auth::id(), $request->id);
            //dd($remover);
            if($remover){
                Session::put("sucesso", true); 
                return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]);
            }
            
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]);
            
        }catch(\Exception $e){ 
            
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel]);  
        }
    }
}
