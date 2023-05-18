<?php

namespace App\Http\Controllers;

use App\Capitulo;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    //
    public static function obtenerCapituloTemporada($temporada) {
        return $capitulos = Capitulo::where('id_temporada', '=', $temporada)->get();
    }
}
