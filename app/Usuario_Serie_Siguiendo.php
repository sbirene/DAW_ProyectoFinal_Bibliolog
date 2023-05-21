<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Serie_Siguiendo extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_serie_siguiendo';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_serie');

    //
    public $timestamps = false;

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_serie'];
}
