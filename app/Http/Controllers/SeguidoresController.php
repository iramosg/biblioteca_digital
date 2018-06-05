<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeguidoresController extends Controller
{
     //Adicionar amigo
     public function adicionar($id)
     {
         try{
             
             $adicionar = Seguidores::salvar(Auth::id(), $id);
             
             if($adicionar){
                 Session::put("sucesso", true); 
                 return redirect()->route('index');
             }
             
             Session::put("erro", true); 
             return redirect()->route('login.cadastrar');
             
         }catch(\Exception $e){ 
             
             $this->saveErros($e, Auth::id());
             Session::put("erro", true); 
             return redirect()->route('login.cadastrar');  
         }
     }
     
     //Adicionar amigo
}
