<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemporadaController extends Controller
{
    //
    public static function obtenerTemporadaSerie($serie) {
        /* $coleccionIdTemporadas = DB::table('temporada')
            ->select('id_temporada')
            ->where('id_serie', $serie)
            ->pluck('id_temporada');

        // dd($coleccionIdTemporadas);

        foreach ($coleccionIdTemporadas as $index => $id) {
            // dd($id);
            $arrayIdTemporadas[$index] = $id;
        }

        return $arrayIdTemporadas; */

        $temporadas = Temporada::where('id_serie', '=', $serie)->get();
        // dd($temporadas);
        return $temporadas;

    }

}
