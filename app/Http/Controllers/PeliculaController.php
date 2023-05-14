<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    //
    public static function obtenerPelis()
    {
        return $pelis = Pelicula::all();
    }

    public static function obtenerNumeroPelis($num)
    {
        return $pelis = Pelicula::paginate($num);
    }

    public static function obtenerNovedadesPelis($numPelis, $year)
    {
        $pelis = Pelicula::where('year', '>', $year)->get();
        // dd($pelis);

        // Ordenar Collection / array de pelis por el año
        $ordenadas = $pelis->sortByDesc('year');
        // $ordenadas->values()->all();
        // dd($ordenadas);
        foreach ($ordenadas as $index => $peli) {
            $array_pelis[$index] = $ordenadas[$index];
            // echo($devolver[$index]->titulo);
        }
        // dd($array_pelis);
        // Ordenar array
        foreach ($array_pelis as $key => $row) {
            $aux[$key] = $row['year'];
        }
        array_multisort($aux, SORT_DESC, $array_pelis);
        // dd($array_pelis);

        for ($contador = 0; $contador < $numPelis; $contador++) {
            $devolver[$contador] = $array_pelis[$contador];
        }

        return $devolver;
    }
}
