<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model {

    protected $table = 'peliculas';

    protected $fillable = ['titulo', 'descripcion', 'anio'];

    protected $hidden = ['cineasta_id','created_at', 'updated_at'];

}

