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
        
        // dd($user);
        
        try{
            $userfb = Usuarios::where('email', '=', $user->getEmail())
            ->where('activated', '=', true)
            ->first();

            if($userfb){
                    Auth::login($userfb);
                    Session::put("success", true);       
                    return redirect()->route('index');
            }else{
                $fbcad = Usuarios::salvarfb($user, Auth::id());
                if($fbcad->id > 0){
                    Session::put("sucesso", true); 
                    return redirect()->route('index');
                }
            }
            Session::put("error", true);
            return redirect()->route('login.index');
        }catch(\Exception $ex){
            Session::put("error", true);
            return redirect()->route('login.index'); 
        }
    }
    
    //Views
    public function index()
    {
        $classpage = 'login';
        return view('login.login', compact('classpage'));
    }
    public function esqueciminhasenha()
    {
        $classpage = 'esqueci-senha';
        return view('login.esqueciminhasenha', compact('classpage'));
    }
    //End Views
    
    public function logout()
    {  
		Auth::logout();
        Session::flush();
        return Redirect::to('/login');
    }

    //Posts
    public function entrar(Request $request)
    {
        //dd($request->senha);
        try {
            
            $user = Usuarios::where('email', '=', $request->get('email'))
            ->where('activated', '=', true)
            ->first();
            //dd(Hash::check($request->get('senha'), $user->senha));
            
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
    
    //Esqueci minha senha
    //Rota View Esqueci minha senha
    public function esquecisenha(){
        return view('login.esqueciminhasenha');
    }
    //Medoto Esqueci minha senha
    public function resetarsenha(Request $request){
        // dd($request->all());
            $reset = Usuarios::resetar($request);
    }
    //End Método Esqueci minha senha
    //End Esqueci minha senha
}