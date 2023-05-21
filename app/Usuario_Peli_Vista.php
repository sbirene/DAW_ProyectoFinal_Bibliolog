<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Peli_Vista extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_peli_vista';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_peli');

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_peli'];
}
