<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Livros;
use App\FavoritarLivro;

class FavoritarLivroController extends Controller
{
    public function favoritar($url_amigavel)
    {
        try{
            $user = Auth::user();
            // dd($user);
            if($user){
                $userid = $user->id;
                $livro = Livros::where('url_amigavel','=',$url_amigavel)
                    ->where('activated', '=', true)
                    ->first();
                // dd($livro);
                if($livro){
                    $livroid = $livro->id;
                    $cFav = FavoritarLivro::where('usuario_id','=',$userid)
                        ->where('livro_id','=',$livroid)
                        ->first();
                    // dd(is_null($cFav));
                    if(is_null($cFav) == true){
                        $sFav = FavoritarLivro::salvar($userid,$livroid);
                        Session::put("sucesso", true); 
                        return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                    }else{
                        Session::put("erro", true);
                        return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                    }
                }else{
                    Session::put("erro", true);
                    return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
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
    public function desfavoritar($url_amigavel)
    {
        try{
            $user = Auth::user();
            if($user){
                $userid = $user->id;
                $livro = Livros::where('url_amigavel','=',$url_amigavel)
                    ->where('activated', '=', true)
                    ->first();
                // dd($livro);
                if($livro){
                    $livroid = $livro->id;
                    $cFav = FavoritarLivro::where('usuario_id','=',$userid)
                            ->where('livro_id','=',$livroid)
                            ->first()
                            ->delete();
                    if($cFav){
                        Session::put("sucesso", true); 
                        return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                    }else{
                        Session::put("erro", true);
                        return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
                    }
                }else{
                    Session::put("erro", true);
                    return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
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
