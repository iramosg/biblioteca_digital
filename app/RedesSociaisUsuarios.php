<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedesSociaisUsuarios extends Model
{
    protected $table = 'redes_sociais_usuarios';
    
    protected $fillable = [
        
        'id_usuario',
        'facebook',
        'twitter',
        'google_plus',
        'instagram',            
        'tumblr',
        'blog',
        'site',
        'linkedin',
        'vk',            
        
        'userIdCreated',
        'userIdUpdated'
    ];
    
    //Chaves
    
    public function usuario(){
        return $this->belongsTo('App\Usuarios');
    }

    public static function salvar(Request $request, $userId, $id = null)
    {
        
        if($id == null){
            $salvar = new RedesSociaisUsuarios();
            $salvar->userIdCreated = $userId;
        } else {
            $salvar = RedesSociaisUsuarios::carregar($id);
            $salvar->userIdUpdated = $userId;            
        }
        
        $salvar->usuario_id = $userId;
        $salvar->facebook = $request->$facebook;
        $salvar->twitter = $request->twiiter;
        $salvar->google_plus = $request->google_plus;
        $salvar->instagram = $request->instagram;
        $salvar->tumblr = $request->tumblr;
        $salvar->blog = $request->blog;
        $salvar->site = $request->site;
        $salvar->linkedin = $request->linkedin;
        $salvar->vk = $request->vk;
        //Falta salvar os arquivos
        
        $salvar->save();
        
        return $salvar;
    }

}
