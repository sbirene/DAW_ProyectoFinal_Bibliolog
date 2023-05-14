<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    //
    public static function obtenerAutores() {
        return $autores = Autor::all();
    }
}
