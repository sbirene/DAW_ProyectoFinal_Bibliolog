<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'director';

    // Clave primaria
    protected $primaryKey = 'id_director';

    //
    public $timestamps = false;
}
