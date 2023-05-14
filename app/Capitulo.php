<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'capitulo';

    // Clave primaria
    protected $primaryKey = 'id_cap';

    //
    public $timestamps = false;
}
