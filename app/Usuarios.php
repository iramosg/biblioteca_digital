<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class Usuarios extends SuperModel implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'usuarios';
    
    use Authenticatable, CanResetPassword;
    
    protected $fillable = [
        
        'redes_sociais_id',
        'nome',
        'sobrenome',
        'sobre',
        'data_nascimento',
        'telefone',
        'senha',
        'email',         
        'foto',
        'capa',
        'url_amigavel',           
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    public static function lista()
    {
        return Usuarios::where('activated', 1)->get();
    }
    
    public static function carregar($id)
    {
        return Usuarios::find($id);
    }
    
    public static function perfilUrl($url_amigavel)
    {
        return Usuarios::where('url_amigavel', $url_amigavel)->first();
    }
    
    
    public static function salvar(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'nome' => 'required|max:255',
        //     'sobrenome' => 'required|max:255',
        //     'sobre' => 'required',
        //     'data_nascimento' => 'required|max:10',
        //     'email' => 'required|max:255',      
        //     'url_amigavel' => 'required|max:50|unique:usuarios',                  
        //     'telefone' => 'required|max:20',
        //     'foto' => 'required',
        //     'capa' => 'required',
        //     'url_amigavel' => 'required|max:255',            
            
        // ],
        // [
        //     'nome.required' => 'Nome tem que ser preenchido.',
        //     'nome.max' => 'Nome tem que ter no máximo 255 caracteres.',
        //     'sobrenome.required' => 'Nome tem que ser preenchido.',
        //     'sobrenome.max' => 'Sobrenome tem que ter no máximo 255 caracteres.',            
        //     'sobre.required' => 'Sobre tem que ser preenchido.',
        //     'data_nascimento.required' => 'Data de Nascimento tem que ser preenchida.',
        //     'data_nascimento.max' => 'Data de Nascimento tem que ter no máximo 20 caracteres.',            
        //     'email.required' => 'E-mail tem que ser preenchida.',
        //     'url_amigavel.required' => 'URL tem que ser preenchida.',
        //     'url_amigavel.max' => 'URL tem que ter no máximo 50 caracteres.',
        //     'telefone.required' => 'Telefone tem que ser preenchido.',
        //     'telefone.max' => 'Telefone tem que ter no máximo 20 caracteres.',
        //     'foto.required' => 'Ícone tem que ser preenchido.',
        //     'foto.dimensions' => 'Seu ícone deve ter no máximo 500 x 500px.',
        //     'capa.required' => 'Banner tem que ser preenchido.',
        //     'capa.dimensions' => 'Seu banner deve ter no máximo 1980 x 300px.',
        //     ]);
            
        //     if ($validator->fails())
        //     {
        //         return redirect()->route('login.index')
        //         ->withErrors($validator)
        //         ->withInput();
        //     }
            
            
            $salvar = new Usuarios();
            $salvar->userIdCreated = 1;
            
            if($request->foto != null)
            {
                $foto = $request->file('foto');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($foto->isValid() && in_array($foto->extension(), $ext))
                {
                    //$icone = Storage::putFile('categorias/icones', $request->file('icone'));
                    $foto = $foto->store('perfil/fotos');
                    $salvar->foto = $foto;
                    //dd($icone);
                }
                
                //dd($icone);
            }
            
            if($request->capa != null)
            {
                $capa = $request->file('capa');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($capa->isValid() && in_array($capa->extension(), $ext))
                {
                    $capa = $capa->store('perfil/capas');
                    $salvar->capa = $capa;
                }
            }
            
            $salvar->nome = $request->nome;
            $salvar->sobrenome = $request->sobrenome;
            $salvar->sobre = $request->sobre;
            $salvar->email = $request->email;
            $salvar->data_nascimento = $request->data_nascimento;
            $salvar->telefone = $request->telefone;
            $salvar->senha = Hash::make($request->senha);
            $salvar->url_amigavel = $request->url_amigavel;
            $salvar->save();
            
            return $salvar;
        }
        
        public static function editar(Request $request, $id)
        {
            
            $salvar = Usuarios::carregar($id);
            $salvar->userIdUpdated = $id; 
            
            if($request->foto != null)
            {
                $foto = $request->file('foto');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($foto->isValid() && in_array($foto->extension(), $ext))
                {
                    //$icone = Storage::putFile('categorias/icones', $request->file('icone'));
                    $foto = $foto->store('perfil/fotos');
                    $salvar->foto = $foto;
                    //dd($icone);
                }
                
                //dd($icone);
            }
            
            if($request->capa != null)
            {
                $capa = $request->file('capa');
                $ext = ['jpg', 'png', 'jpeg', 'gif'];
                
                if($capa->isValid() && in_array($capa->extension(), $ext))
                {
                    $capa = $capa->store('perfil/capas');
                    $salvar->capa = $capa;
                }
            }
            
            $salvar->nome = $request->nome;
            $salvar->sobrenome = $request->sobrenome;
            $salvar->sobre = $request->sobre;
            $salvar->email = $request->email;
            $salvar->data_nascimento = $request->data_nascimento;
            $salvar->telefone = $request->telefone;
            $salvar->facebook = $request->facebook;
            $salvar->instagram = $request->instagram;
            $salvar->youtube = $request->youtube;
            $salvar->senha = Hash::make($request->senha);
            $salvar->url_amigavel = $request->url_amigavel;
            $salvar->remember_token = str_random(50);
            $salvar->save();
            
            return $salvar;
        }
        public static function salvarfb($user)
        {
            $salvar = new Usuarios();
            $salvar->userIdCreated = 1;
            $salvar->nome = $user->name;//ou utilizar $user->getName();
            $salvar->email = $user->email;//ou utilizar $user->getEmail();
            $salvar->senha = '';
            $salvar->save();
            return $salvar;
        }



    }