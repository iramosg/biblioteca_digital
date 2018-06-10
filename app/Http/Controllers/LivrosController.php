<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;
use App\Admin\Categorias;
use Auth;
use Session;

class LivrosController extends Controller
{

    //View que retorna todos os livros
    public function index()
    {
        $livros = Livros::listaPaginada();
        return view('livros.index', compact('livros'));
    }
    
    //View que retorna a visualização do livro (página interna)
    public function livro($url_amigavel)
    {
        $livro = Livros::carregarLivroUrl($url_amigavel);
        return view('livros.livro', compact('livro'));
    }

    public function livroBusca(Request $request)
    {
        $busca = $request->busca;
        //dd($request);
        $livros = Livros::buscar($request->busca);
        //dd($livros);
        return view('livros.buscar', compact(['livros', 'busca']));
    }

    //View para salvar livro
    public function create()
    {
        $categorias = Categorias::lista();
        return view('livros.cadastrar', compact('categorias'));
    }
    
    //Função para cadastrar livro no banco de dados
    public function store(Request $request)
    {
        //dd($request);
        try
        {
            $livro = Livros::salvar($request, Auth::id());
            //dd($livro);
            if($livro->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('livros.index');
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
    public function edit(Livros $livro)
    {
        $livro = Livro::carregar($livro->id);
        return view('livros.editar', compact('livros'));
    }
    
    //Função para editar o livro no banco de dados
    public function update(Request $request, Livros $livro)
    {
        try{
            
            $livro = Livros::salvar($request. Auth::id(), $request->id);
            
            if($livro->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('livros.index');
            }
            
            Session::put("erro", true); 
            return redirect()->route('livros.editar', $request->id);   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('anunciantes.editar', $request->id);
        }
    }
    
    //Função para deletar o livro no banco de dados
    public function destroy(Livros $livros)
    {
        //Falta fazer a função
    }
}
