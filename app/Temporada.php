<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'temporada';

    // Clave primaria
    protected $primaryKey = 'id_temporada';

    //
    public $timestamps = false;
}
