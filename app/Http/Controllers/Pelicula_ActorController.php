<?php

namespace App\Http\Controllers;

use App\Pelicula_Actor;
use Illuminate\Http\Request;

class Pelicula_ActorController extends Controller
{
    //
    public static function obtenerActoresPeli($peli) {
        return $actores = Pelicula_Actor::find($peli);
    }
}
