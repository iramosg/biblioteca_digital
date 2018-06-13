<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class Livros extends SuperModel
{
    protected $table = 'livros';
    
    protected $fillable = [
        
        'autor_id',
        'categoria_id',
        'titulo',
        'capa',
        'ano',
        'descricao',
        'preco',
        'download_previo',
        'download',
        'isbn',  
        'url_amigavel',          
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function autor(){
        return $this->belongsTo('App\Usuarios', 'autor_id', 'id');
    }
    
    public function categoria(){
        return $this->belongsTo('App\Admin\Categorias');
    }
    
    public static function lista()
    {
        return Livros::where('activated', 1)->get();
    }
    
    public static function listaPaginada()
    {
        return Livros::where('activated', 1)->paginate(15);
    }
    
    public static function carregar($id)
    {
        return Livros::find($id);
    }
    
    public static function carregarLivroUrl($url_amigavel)
    {
        return Livros::where('url_amigavel', $url_amigavel)->first();
    }
    
    public static function livrosCategoria($id)
    {
        return Livros::where('categoria_id', $id)->paginate(15);
    }
    
    public static function livrosUsuario($id)
    {
        return Livros::where('autor_id', $id)->get();
    }
    
    public static function buscar($like)
    {
        return Livros::where('titulo', 'LIKE', "%{$like}%")->get();
    }
    
    public static function buscarLivroCategoria($like, $categoria)
    {
        return Livros::where('titulo', 'LIKE', "%{$like}%")
        ->where('categoria_id', $categoria)
        ->get();
    }
    
    public static function salvar(Request $request, $userId)
    {
        
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:100',
            'ano' => 'required|max:4',
            'sinopse' => 'required|max:140',
            'descricao' => 'required',
            'preco' => 'required|max:6',
            'categoria' => 'required',
            'download_previo' => 'required',
            'download' => 'required',
            'capa' => 'required',
            'url_amigavel' => 'required|max:50',            
            
        ],
        [
            'titulo.required' => 'Título tem que ser preenchido.',
            'titulo.max' => 'Título pode ter até 100 caracteres',
            'ano.required' => 'Ano tem que ser preenchido.',
            'ano.max' => 'Ano pode ter até 4 caracteres',
            'sinopse.required' => 'Sinopse tem que ser preenchido.',
            'sinopse.max' => 'Sinopse pode ter até 140 caracteres.',
            'descricao.required' => 'Descrição tem que ser preenchido.',
            'preco.required' => 'Preço tem que ser preenchido.',
            'preco.max' => 'Preço pode ter até 6 caracteres.',
            'categoria.required' => 'Categoria tem que ser preenchido.',
            'download_previo.required' => 'Download Prévio tem que ser preenchido.',
            'download.required' => 'Download tem que ser preenchido.',
            'capa.required' => 'Capa tem que ser preenchido.',
            'url_amigavel.required' => 'URL Amigável tem que ser preenchido.',
            ]);
            
            if ($validator->fails())
            {
                return redirect()->route('livros.cadastrar')
                ->withErrors($validator)
                ->withInput();
            }
            
            $salvar = new Livros();
            $salvar->userIdCreated = $userId;
            
            if($request->download_previo != null)
            {
                $download_previo = $request->file('download_previo');
                $ext = ['pdf'];
                
                if($download_previo->isValid() && in_array($download_previo->extension(), $ext))
                {
                    $download_previo = $download_previo->store('livros/previa');
                    $salvar->download_previo = $download_previo;
                }
            }
            
            if($request->download != null)
            {
                $download = $request->file('download');
                $ext = ['pdf'];
                
                if($download->isValid() && in_array($download->extension(), $ext))
                {
                    $download = $download->store('livros/download');
                    $salvar->download = $download;
                }
            }
            
            if($request->capa != null)
            {
                $capa = $request->file('capa');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($capa->isValid() && in_array($capa->extension(), $ext))
                {
                    $capa = $capa->store('livros/capas');
                    $salvar->capa = $capa;
                }
            }
            
            $salvar->autor_id = $userId;
            $salvar->categoria_id = $request->categoria;
            $salvar->titulo = $request->titulo;
            $salvar->ano = $request->ano;
            $salvar->descricao = $request->descricao;
            $salvar->sinopse = $request->sinopse;
            $salvar->preco = $request->preco;
            $salvar->isbn = $request->isbn;
            $salvar->url_amigavel = $request->url_amigavel;
            
            $salvar->save();
            
            return $salvar;
        }
        
    }
    