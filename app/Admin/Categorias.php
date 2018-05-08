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
    
    public static function salvar(Request $request, $userId, $id = null)
    {
        
        $validator = Validator::make($request->all(), [
            'categoria' => 'required|unique:categorias|max:255',
            'icone' => 'required|dimensions: max_width=30,max_height=30',
            
        ],
        [
            'categoria.required' => 'Categoria tem que ser preenchido.',
            'icone.required' => 'Ícone tem que ser preenchido.',
            'icone.dimensions' => 'Seu ícone deve ter no máximo 30 x 30px.',
            ]);
            
            if ($validator->fails()) {
                return redirect('categorias/cadastrar')
                ->withErrors($validator)
                ->withInput();
            }
            
            
            if($id == null){
                $salvar = new Categorias();
                $salvar->userIdCreated = $userId;
            } else {
                $salvar = Categorias::carregar($id);
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
            
            
            $salvar->categoria = $request->nome;
            $salvar->bid = $request->bid;
            
            $salvar->activated = true;
            //Falta salvar os arquivos
            
            $salvar->save();
            
            return $salvar;
        }
    }
    