<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Libro_Pendiente extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_libro_pendiente';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_libro');

    //
    public $timestamps = false;

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_libro'];
}
