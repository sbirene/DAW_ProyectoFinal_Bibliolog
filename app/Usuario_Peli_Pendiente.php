<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Peli_Pendiente extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_peli_pendiente';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_peli');

    //
    public $timestamps = false;

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_peli'];
}
