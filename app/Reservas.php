<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';

    //protected $fillable = ['usuario_id','row','column'];

    public function usuario()
    {
        return $this->belongsTo('App\usuarios');
    }

}
