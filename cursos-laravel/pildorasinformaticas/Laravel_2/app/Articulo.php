<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "Nombre_Articulo",
        "Precio",
        "pais_origen",
        "observaciones",
        "seccion"
    ];


}
