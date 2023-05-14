<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula_Actor extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'pelicula_actor';

    // Clave primaria
    protected $primaryKey = array('id_peli', 'id_actor');

    //
    public $timestamps = false;
}
