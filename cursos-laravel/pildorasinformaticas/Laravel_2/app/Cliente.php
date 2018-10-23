<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        "Nombre",
        "Apellidos"
    ];

    public function articulo(){
        return $this->hasOne("App\Articulo");
    }
}
