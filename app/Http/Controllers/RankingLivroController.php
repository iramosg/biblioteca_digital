<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Livros;
use App\RankingLivro;

class RankingLivroController extends Controller
{
    //Função para cadastrar ranking do livro
    public function ranking(Request $request,$url_amigavel)
    {
        
        // dd($request);
        
        try{
            $user = Auth::user();
            if($user){
                // dd($url_amigavel);
               
                $livro = Livros::where('url_amigavel','=',$url_amigavel)
                ->where('activated', '=', true)
                ->first();
                //dd($livro);
                if($livro){
                    if($request->rank == "r1"){
                        $rank = 1;
                    }elseif ($request->rank == "r2") {
                        $rank = 2;
                    }elseif ($request->rank == "r3") {
                        $rank = 3;
                    }elseif ($request->rank == "r4") {
                        $rank = 4;
                    }elseif ($request->rank == "r5") {
                        $rank = 5;
                    }
                    // dd($rank);
                    $userid = $user->id;
                    $livroid = $livro->id;
                    $cRank = RankingLivro::where('usuario_id','=',$userid)
                        ->where('livro_id','=',$livroid)
                        ->first();
                    if(is_null($cRank) == true){
                        $ranking = RankingLivro::salvar($rank,$userid,$livroid);
                        Session::put("sucesso", true); 
                        return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                    }
                }
            }else{
                Session::put("erro", true);
                return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
            }
            
        }catch(\Exception $e){
            $this->saveErros($e, Auth::id());
            Session::put("erro", true);
            return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
        }
    }

    public function reranking(Request $request,$url_amigavel)
    {
        
        // dd($request);
        
        try{
            $user = Auth::user();
            if($user){
                // dd($url_amigavel);
               
                $livro = Livros::where('url_amigavel','=',$url_amigavel)
                ->where('activated', '=', true)
                ->first();
                // dd($livro);
                if($livro){
                    if($request->rank == "r1"){
                        $rank = 1;
                    }elseif ($request->rank == "r2") {
                        $rank = 2;
                    }elseif ($request->rank == "r3") {
                        $rank = 3;
                    }elseif ($request->rank == "r4") {
                        $rank = 4;
                    }elseif ($request->rank == "r5") {
                        $rank = 5;
                    }
                    // dd($rank);
                    $userid = $user->id;
                    $livroid = $livro->id;
                    $cRank = RankingLivro::where('usuario_id','=',$userid)
                        ->where('livro_id','=',$livroid)
                        ->first();
                        // dd($cRank);
                    if(!is_null($cRank) == true){
                        $ranking = RankingLivro::where('usuario_id','=',$userid)
                        ->where('livro_id','=',$livroid)
                        ->update(['ranking' => $rank]);
                        if($ranking){
                            // dd($ranking);
                            Session::put("sucesso", true); 
                            return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                        }
                    }
                }
            }else{
                Session::put("erro", true);
                return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
            }
            
        }catch(\Exception $e){
            $this->saveErros($e, Auth::id());
            Session::put("erro", true);
            return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
        }
    }
}
