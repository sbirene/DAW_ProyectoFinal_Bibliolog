<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'pelicula';

    // Clave primaria
    protected $primaryKey = 'id_peli';

    //
    public $timestamps = false;
}
