<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;
use App\Admin\Categorias;
use Auth;
use Session;
use Mail;
use App\Mail\NovoLivro;
use App\RankingLivro;
use App\FavoritarLivro;

class LivrosController extends Controller
{
    
    //View que retorna todos os livros
    public function index()
    {
        $livros = Livros::listaPaginada();
        $maisRecentes = Livros::ultimosLivros();
        $classpage = 'livros';
        return view('livros.index', compact(['livros', 'classpage', 'maisRecentes']));
    }
    
    //View que retorna a visualização do livro (página interna)
    public function livro($url_amigavel)
    {
        $user = Auth::user();
        $userid = 0; //id ficticio
        $livro = Livros::carregarLivroUrl($url_amigavel);
        $livrosUsuario = Livros::livrosUsuarioInterna($livro->autor_id);
        $classpage = 'pagina-livro';
        $livroid = $livro->id;
        
        $avgrank = RankingLivro::where('livro_id','=',$livroid)
            ->avg('ranking');
        $avgrank = number_format($avgrank, 1, '.', '');

        $livro_url = Livros::where('url_amigavel','=',$url_amigavel)
                ->where('activated', '=', true)
                ->first();

        $cFav = FavoritarLivro::where('usuario_id','=',$userid)
            ->where('livro_id','=',$livroid)
            ->first();

    $cRank = RankingLivro::where('usuario_id','=',$userid)
        ->where('livro_id','=',$livroid)
        ->first();
        
    $nRank = RankingLivro::select('ranking')
        ->where('usuario_id','=',$userid)
        ->where('livro_id','=',$livroid)
        ->first();
       

    // $rank = $nRank->ranking;
        if($user){
            $userid = $user->id;

            $cFav = FavoritarLivro::where('usuario_id','=',$userid)
                ->where('livro_id','=',$livroid)
                ->first();

            $cRank = RankingLivro::where('usuario_id','=',$userid)
                ->where('livro_id','=',$livroid)
                ->first();

            $nRank = RankingLivro::select('ranking')
                ->where('usuario_id','=',$userid)
                ->where('livro_id','=',$livroid)
                ->first();
        }
        return view('livros.livro', compact(['livrosUsuario','classpage', 'livro','avgrank','cFav','cRank','nRank']));
    }
    
    public function livroBusca(Request $request)
    {
        $like = $request->busca;
        //dd($request);
        $livros = Livros::buscar($request->busca);
        $classpage = 'resultado-busca';
        //dd($livros);
        return view('livros.buscar', compact(['classpage', 'livros', 'like']));
    }
    
    //View para salvar livro
    public function create()
    {
        $classpage = 'cadastrar-livro';
        $categorias = Categorias::lista();
        return view('livros.cadastrar', compact(['classpage', 'categorias']));
    }
    
    //Função para cadastrar livro no banco de dados
    public function store(Request $request)
    {
        //dd($request);
        try
        {
            $livro = Livros::salvar($request, Auth::id());
            //dd($livro->autor->nome);
            if($livro->id > 0)
            {
                
                Mail::to($livro->autor->email)
                ->send(new NovoLivro($livro->autor->nome, $livro->titulo, $livro->categoria->categoria, $livro->sinopse, $livro->url_amigavel));
                
                Session::put("sucesso", true); 
                return redirect()->route('livros.livro',  ['url_amigavel' => $livro->url_amigavel]);
            }
            
            
            Session::put("erro", true); 
            return redirect()->route('livros.cadastrar')->withInput();   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('livros.cadastrar')->withInput();  
        }
    }
    
    //View para editar o livro
    public function editar(Request $request)
    {
        $livro = Livros::carregar($request->id);
        $categorias = Categorias::lista();
        $classpage = 'editar-livro';
        return view('livros.editar', compact(['livro', 'classpage', 'categorias']));
    }
    
    //Função para editar o livro no banco de dados
    public function update(Request $request)
    {
        //dd($request);
        try{
            
            $livro = Livros::editar($request, Auth::id());
            
            if($livro->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('livros.index');
            }
            
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel])->withInput();   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel])->withInput();
        }
    }
    
    //Função para deletar o livro no banco de dados
    public function destroy(Livros $livros)
    {
        //Falta fazer a função
    }

    // public function carregar_ranking($url_amigavel){
    //     $livro_url = Livros::where('url_amigavel','=',$url_amigavel)
    //             ->where('activated', '=', true)
    //             ->first();
    //     $livroid = $livro->id;
    //     $avg_rank = RankingLivro::where('livro_id','=',$livroid)
    //             ->avg('ranking');
    //     // dd($avg_rank);
    //     return view('livros.livro', compact('avg_rank'));
    // }
}
