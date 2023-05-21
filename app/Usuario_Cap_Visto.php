<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Cap_Visto extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_cap_visto';

    // Clave primaria
    protected $primaryKey = array('id_usuario', 'id_cap');

    // Para poder rellenar
    protected $fillable = ['id_usuario', 'id_cap'];
}
