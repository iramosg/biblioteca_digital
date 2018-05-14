<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Validator;

class Administradores extends SuperModel implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'administradores';
    
    use Authenticatable, CanResetPassword;
    
    protected $fillable = [
        
        'nome',
        'sobrenome',
        'senha',
        'email',        
        
        'activated',
        'userIdCreated',
        'userIdUpdated'
    ];
    
    public static function lista()
    {
        return Administradores::all();
    }
    
    public static function carregar($id)
    {
        return Administradores::find($id);
    }
    
    //Cria um usuário administrador no banco de dados
    public static function salvar(Request $request, $userId)
    {
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => 'required|email|unique:administradores|max:255',
            
        ],
        [
            'nome.required' => 'Nome tem que ser preenchido.',
            'sobrenome.required' => 'Sobrenome tem que ser preenchido.',
            'email.required' => 'E-mail tem que ser preenchido.',
            'email.unique' => 'E-mail já cadastrado no banco de dados',
            ]);
            
            if ($validator->fails())
            {
                return redirect()->route('admin.usuarios.cadastrar')
                ->withErrors($validator)
                ->withInput();
            }
            
            $salvar = new Administradores();
            $salvar->userIdCreated = $userId;
            $salvar->senha = Hash::make(str_random(10));
            $salvar->nome = $request->nome;
            $salvar->sobrenome = $request->sobrenome;
            $salvar->email = $request->email;
            
            $salvar->activated = true;
            
            $salvar->save();
            
            return $salvar;
        }
        
        //Edita um usuário administrador no banco de dados
        public static function editar(Request $request, $userId, $id = null)
        {
            
            $validator = Validator::make($request->all(), [
                'nome' => 'required|max:255',
                'sobrenome' => 'required|max:255',
                'email' => 'required|email|max:255',
                
            ],
            [
                'nome.required' => 'Nome tem que ser preenchido.',
                'sobrenome.required' => 'Sobrenome tem que ser preenchido.',
                'email.required' => 'E-mail tem que ser preenchido.',
                //'email.unique' => 'E-mail já cadastrado no banco de dados',
                ]);
                
                if ($validator->fails())
                {
                    return redirect()->route('admin.usuarios.editar', $id)
                    ->withErrors($validator)
                    ->withInput();
                }
                
                
                $salvar = Administradores::carregar($id);
                //dd($salvar);
                $salvar->userIdUpdated = $userId;            
                $salvar->nome = $request->nome;
                $salvar->sobrenome = $request->sobrenome;
                $salvar->email = $request->email;
                
                $salvar->activated = true;
                
                $salvar->save();
                
                return $salvar;
            }
        }
        