<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'autor';

    // Clave primaria
    protected $primaryKey = 'id_autor';

    //
    public $timestamps = false;
}
