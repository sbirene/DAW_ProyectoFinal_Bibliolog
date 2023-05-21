<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Libro_Leido extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_libro_leido';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_libro');

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_libro'];
}
