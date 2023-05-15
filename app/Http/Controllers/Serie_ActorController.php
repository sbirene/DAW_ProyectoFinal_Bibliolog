<?php

namespace App\Http\Controllers;

use App\Serie_Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Serie_ActorController extends Controller
{
    //
    public static function obtenerActoresSerie($serie)
    {
        $coleccionIdActores = DB::table('serie_actor')
            ->select('id_actor')
            ->where('id_serie', $serie)
            ->pluck('id_actor');

        // dd($coleccionIdActores);

        foreach ($coleccionIdActores as $index => $id) {
            // dd($id);
            $arrayIdActores[$index] = $id;
        }
        // dd($arrayIdActores);

        foreach ($arrayIdActores as $index => $id) {
            $arrayNombres[$index] = ActorController::obtenerUnActor($id);
        }
        // dd($arrayNombres);

        return $string = implode(', ', $arrayNombres);
    }
}
