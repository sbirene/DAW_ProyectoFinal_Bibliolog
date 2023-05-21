<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Serie_Vista extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_serie_vista';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_serie');

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_serie'];
}
