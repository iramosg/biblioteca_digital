<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Erros extends Model
{
    const CREATED_AT = 'created';

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'erros';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'logErro', 
                            'pagina', 
                            'metodo', 
                            'userIdCreated'
                            ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios', 'id', 'userIdCreated');
    }                          
}
