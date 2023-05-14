<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    //
    public static function obtenerDirectores() {
        return $autores = Director::all();
    }
}
