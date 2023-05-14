<?php

namespace App\Http\Controllers;

use App\Serie_Actor;
use Illuminate\Http\Request;

class Serie_ActorController extends Controller
{
    //
    public static function obtenerActoresSerie($serie) {
        return $actores = Serie_Actor::find($serie);
    }
}
