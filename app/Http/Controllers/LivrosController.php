<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivrosController extends Controller
{
    
    //View para salvar livro
    public function create()
    {
        return view('livros.cadastrar');
    }
    
    //Função para cadastrar livro no banco de dados
    public function store(Request $request)
    {
        try
        {
            $livro = Livro::salvar($request, Auth::id());
            
            if($livro->id > 0)
            {
                Session::put("sucesso", true); 
                return redirect()->route('livros.index');
            }
            
            Session::put("erro", true); 
            return redirect()->route('livros.cadastrar');   
            
        } catch(\Exception $e)
        {
            $this->saveErros($e, Auth::id());
            Session::put("erro", true); 
            return redirect()->route('livros.cadastrar');  
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
