<?php

namespace App\Http\Controllers;

use App\Pelicula_Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pelicula_ActorController extends Controller
{
    //
    public static function obtenerActoresPeli($peli)
    {
        $coleccionIdActores = DB::table('pelicula_actor')
            ->select('id_actor')
            ->where('id_peli', $peli)
            ->pluck('id_actor');

        // dd($coleccionIdActores);

        foreach($coleccionIdActores as $index => $id) {
            // dd($id);
            $arrayIdActores[$index] = $id;
        }
        // dd($arrayIdActores);

        foreach($arrayIdActores as $index => $id) {
            $arrayNombres[$index] = ActorController::obtenerUnActor($id);
        }
        // dd($arrayNombres);

        return $string = implode(', ', $arrayNombres);

    }
}
