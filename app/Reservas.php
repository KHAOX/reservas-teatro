<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';

    public function usuario()
    {
        return $this->belongsTo('App\usuarios');
    }

}
