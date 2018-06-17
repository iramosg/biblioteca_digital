<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacao;
use Auth;
use Session;

class PublicacaoController extends Controller
{
    public function save(Request $request)
    {
        //dd($request);
        
        try{
            
            $publicacao = Publicacao::salvar($request);
            
            if($publicacao->id > 0){
                Session::put("sucesso", true); 
                return redirect()->route('perfil.index', ['url_amigavel' => $request->url_amigavel]);
            }
            
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => $request->url_amigavel]);
            
        }catch(\Exception $e){ 
            
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => $request->url_amigavel]);
        }
    }
}
