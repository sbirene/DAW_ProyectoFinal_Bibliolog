<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'serie';

    // Clave primaria
    protected $primaryKey = 'id_serie';

    //
    public $timestamps = false;
}
