<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administradores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    //Retorna a view de login do painel admin
    public function index()
    {
        return view('admin.login.login');
    }

    public function logout()
    {
        //dd('foi');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.index');
    }

     public function auth(Request $request)
    {
        try {

            $user = Administradores::where('email', '=', $request->get('email'))
                            ->where('activated', '=', true)
                            ->first();
            //dd($user);

            if($user){
                $user_ok = Hash::check($request->get('password'), $user->senha);
                //dd($user_ok);
            }
            else{
                Session::put("error_login", true);
                return redirect()->route('admin.login.index');
            }
            
            if($user_ok){
                //Auth::login($user);
                Auth::guard('admin')->login($user);
                //Auth::guard($this->getGuard())->attempt($user);
                //Auth::guard('admin')->user();
                //dd(Auth::user());
                return redirect()->route('admin.index');
            }

            Session::put("error_login", true);
            return redirect()->route('admin.login.index');

        } catch (\Exception $e) {
            dd($e);
            //salva no banco de dados os erros
            $this->saveErros($e);
            Session::put("error_login", true);
            return redirect()->route('admin.login.index');
        }
    }
}
