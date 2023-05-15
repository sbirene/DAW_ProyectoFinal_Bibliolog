<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    //
    public static function obtenerSeries()
    {
        return $autores = Serie::all();
    }

    public static function obtenerNovedadesSeries($numSeries, $year)
    {
        $series = Serie::where('year', '>', $year)->get();

        // Ordenar Collection / array de series por el año
        $ordenadas = $series->sortByDesc('year');
        foreach ($ordenadas as $index => $serie) {
            $array_series[$index] = $ordenadas[$index];
        }
        foreach ($array_series as $key => $row) {
            $aux[$key] = $row['year'];
        }
        array_multisort($aux, SORT_DESC, $array_series);

        for ($contador = 0; $contador < $numSeries; $contador++) {
            $devolver[$contador] = $array_series[$contador];
        }

        return $devolver;
    }

    // Para ver los detalles de una serie
    public function show($id)
    {
        $serie = Serie::findOrFail($id);
        // dd($serie);
        // dd($serie->id_serie);
        return view('serie.show', ['serie' => $serie], ['id' => $serie->id_serie]);
    }
}
