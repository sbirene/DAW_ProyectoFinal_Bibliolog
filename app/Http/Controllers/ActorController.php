<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    //
    public static function obtenerActores() {
        return $actores = Actor::all();
    }

    public static function obtenerUnActor($id) {
        $actor = Actor::find($id);
        return $actor->nombre;
    }
}
