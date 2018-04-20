<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;


use App\Mail\EsqueciMinhaSenha;

class LoginController extends Controller
{
    public function Index()
    {
        return view('login.login');
    }
    
    
    
    public function Entrar(Request $request)
    {
        try {
            
            $user = Usuarios::where('email', '=', $request->get('email'))
            ->where('actived', '=', true)
            ->first();
            
            if($user)
            {
                $user_ok = Hash::check($request->get('senha'), $user->senha);

                //dd($user_ok);
            } else
            {
                Session::put("error", true);
                return redirect('/');
            }
            
            if($user_ok)
            {
                //Auth::loginUsingId($user->id);
                Auth::login($user);
                Session::put("success", true);
                //dd('agora vai :D');          
                return redirect('/');
            }
            
            Session::put("error", true);
            return redirect('/');
            
        } catch(\Exception $ex)
        {
            //dd($ex);
            Session::put("error", true);
            return redirect('/');
            
        }
    }
    
}
