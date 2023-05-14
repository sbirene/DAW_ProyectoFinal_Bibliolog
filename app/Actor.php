<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'actor';

    // Clave primaria
    protected $primaryKey = 'id_actor';

    //
    public $timestamps = false;
}
