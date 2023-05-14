<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'libro';

    // Clave primaria
    protected $primaryKey = 'id_libro';

    //
    public $timestamps = false;
}
