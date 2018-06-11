<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Usuarios;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\EsqueciMinhaSenha;

class MailController extends Controller {

    public function resetarsenha(Request $request){
        try{
            $user = Usuarios::where('email', '=', $request->email)
            ->where('activated', '=', true)
            ->first();
            
            if($user){

                $senha = str_random(10);
                $senhaSemHash = $senha;
                $data = array('name'=>$user->nome,'senha'=>$senha);
                $senha =  Hash::make($senha);
                $senha = Usuarios::where('email', '=', $request->email)->update(['senha' => $senha]);

                Mail::to($user->email)
                ->send(new EsqueciMinhaSenha($user->nome, $user->email, $senhaSemHash));
                
                
                // Mail::send('mail', $data, function($message) use ($user) {
                //     $message->to($user->email, $user->nome)->subject
                //     ('');
                //     $message->from();
                // });

                //echo "Email com sua nova senha enviado. Cheque sua caixa de mensagens.";
                Session::put("success", true);
                return redirect()->route('login.index');
            }
            
        }catch(Exception $e){
            Session::put("error", true);
            return redirect()->route('login.index');
        }
    }
}