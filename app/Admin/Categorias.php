<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\SuperModel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class Categorias extends SuperModel
{
    protected $table = 'categorias';
    
    protected $fillable = [
        
        'categoria',      
        'icone',       
        'banner',
        'url_amigavel',     
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    
    
    public static function lista()
    {
        return Categorias::all();
    }
    
    public static function carregar($id)
    {
        return Categorias::find($id);
    }

    public static function buscar($like)
    {
        return Categorias::where('categoria', 'LIKE', "%{$like}%")->get();
    }
    
    public static function carregarUrl($url)
    {
        return Categorias::where('url_amigavel', $url)->first();
    }
    
    public static function salvar(Request $request, $userId, $id = null)
    {
        
        $validator = Validator::make($request->all(), [
            'categoria' => 'required|unique:categorias|max:255',
            'icone' => 'required|dimensions:max_width=47,max_height=47',
            'banner' => 'required|dimensions:max_width=1680,max_height=300',
            'url_amigavel' => 'required|unique:categorias|max:255',            
            
        ],
        [
            'categoria.required' => 'Categoria tem que ser preenchido.',
            'icone.required' => 'Ícone tem que ser preenchido.',
            'icone.dimensions' => 'Seu ícone deve ter no máximo 47 x 47px.',
            'banner.required' => 'Banner tem que ser preenchido.',
            'banner.dimensions' => 'Seu banner deve ter no máximo 1680 x 300px.',
            ]);
            
            if ($validator->fails())
            {
                return redirect()->route('admin.categorias.index')
                ->withErrors($validator)
                ->withInput();
            }
            
            
            if($id == null){
                $salvar = new Categorias();
                $salvar->userIdCreated = $userId;
            } else {
                $salvar = Categorias::carregar($id);
                //dd($salvar);
                $salvar->userIdUpdated = $userId;            
            }
            
            if($request->icone != null)
            {
                $icone = $request->file('icone');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($icone->isValid() && in_array($icone->extension(), $ext))
                {
                    //$icone = Storage::putFile('categorias/icones', $request->file('icone'));
                    $icone = $icone->store('categorias/icones');
                    $salvar->icone = $icone;
                    //dd($icone);
                }
                
                //dd($icone);
            }
            
            if($request->banner != null)
            {
                $banner = $request->file('banner');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($banner->isValid() && in_array($icone->extension(), $ext))
                {
                    $banner = $banner->store('categorias/banners');
                    $salvar->banner = $banner;
                }
            }
            
            $salvar->categoria = $request->categoria;
            $salvar->activated = 1;
            $salvar->$request->url_amigavel;
            
            $salvar->save();
            
            return $salvar;
        }
        
        public static function editar(Request $request, $userId, $id = null)
        {
            
            $salvar = Categorias::carregar($id);
            //dd($salvar);
            $salvar->userIdUpdated = $userId;            
            
            if($request->icone != null)
            {
                $icone = $request->file('icone');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($icone->isValid() && in_array($icone->extension(), $ext))
                {
                    $icone = $icone->store('categorias/icones');
                    $salvar->icone = $icone;
                }
            }
            
            if($request->banner != null)
            {
                $banner = $request->file('banner');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($banner->isValid() && in_array($banner->extension(), $ext))
                {
                    $banner = $banner->store('categorias/banners');
                    $salvar->banner = $banner;
                }
            }
            
            
            $salvar->categoria = $request->categoria;
            
            //$salvar->activated = $request->activated;
            $salvar->url_amigavel = $request->url_amigavel;
            
            $salvar->save();
            
            return $salvar;
        }
    }
    