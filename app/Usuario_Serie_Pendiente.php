<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Serie_Pendiente extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_serie_pendiente';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_serie');

    //
    public $timestamps = false;

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_serie'];
}
