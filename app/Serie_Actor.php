<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie_Actor extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'serie_actor';

    // Clave primaria
    protected $primaryKey = array('id_serie', 'id_actor');

    //
    public $timestamps = false;
}
