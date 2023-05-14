<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    //
    public static function obtenerTemporadaSerie($serie) {
        return $temporadas = Temporada::where('id_serie', '=', $serie)->get();
    }

}
