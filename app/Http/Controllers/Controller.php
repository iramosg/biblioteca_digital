<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public static function saveErros($pError, $pUsuario = null)
    {
        $model = Erros::Create(array(
            'logErro' => $pError->getMessage(), 
            'pagina' => $pError->getFile(), 
            'numero_linha' => $pError->getLine(), 
            'userIdUpdated' => $pUsuario));
            
            Session::put("error", true); 
            Session::put("errorNumber", $model->id); 
            //return $model->id;
        }
    }
    