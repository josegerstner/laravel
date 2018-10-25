<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['Nombre'];

    public function clientes(){
        return $this->belongsToMany("App\Cliente");
    }
}
