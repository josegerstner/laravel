<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    public function calificacion(){
        $this->morphTo();
    }
}
