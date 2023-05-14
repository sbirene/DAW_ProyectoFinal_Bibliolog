<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    //
    public static function obtenerActores() {
        return $autores = Actor::all();
    }
}
