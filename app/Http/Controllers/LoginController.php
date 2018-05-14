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
use Socialite;

use App\Mail\EsqueciMinhaSenha;

class LoginController extends Controller
{
    /**
    * Redirect the user to the Facebook authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    /**
    * Obtain the user information from Facebook.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        
        dd($user);
    }
    
    //Views
    public function index()
    {
        return view('login.login');
    }

    public function esqueciminhasenha()
    {
        return view('login.esqueciminhasenha');
    }
    //End Views
    
    //Posts
    public function entrar(Request $request)
    {
        //dd($request);
        try {
            
            $user = Usuarios::where('email', '=', $request->get('email'))
            ->where('activated', '=', true)
            ->first();
            //dd($user);
            
            if($user)
            {
                $user_ok = Hash::check($request->get('senha'), $user->senha);
                
                //dd($user_ok);
            } else
            {
                Session::put("error", true);
                return redirect()->route('login.index');
            }
            
            if($user_ok)
            {
                //Auth::loginUsingId($user->id);
                Auth::login($user);
                Session::put("success", true);
                //dd('agora vai :D');          
                return redirect()->route('index');
            }
            
            Session::put("error", true);
            return redirect()->route('login.index');
            
        } catch(\Exception $ex)
        {
            //dd($ex);
            Session::put("error", true);
            return redirect()->route('login.index');
            
        }
    }
    //End Posts
    
}
