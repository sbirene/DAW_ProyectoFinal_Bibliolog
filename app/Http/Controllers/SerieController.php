<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    //
    public function index()
    {
        $series = Serie::all();
        return view("series", ["series" => $series]);
    }

    /* public static function obtenerSeries()
    {
        return $series = Serie::all();
    } */

    public function buscar()
    {
        // Recibir input del formulario
        $termino = $_POST["valor_buscar"];
        // dd($termino);

        if ($termino === "") {
            $series = Serie::all();
            return view("series", ["series" => $series]);
        }

        // Buscar las series
        $resultados = DB::table('serie')
            ->where('titulo', 'LIKE', '%' . $termino . '%')
            ->get();
        // dd($resultados);

        // Devolver resultados
        return view("series", ["resultados" => $resultados]);
    }

    // Buscar series por genero
    public function buscarPorGenero()
    {
        // Recibir input del formulario
        // dd($_POST);
        $termino = $_POST["valor_buscar"];
        // dd($termino);

        if ($termino === "") {
            $series = Serie::all();
            return view("series", ["series" => $series]);
        }

        // Buscar las series
        $resultados = DB::table('serie')
            ->where('genero', 'LIKE', '%' . $termino . '%')
            ->get();
        // dd($resultados);

        // Devolver resultados
        return view("series", ["resultados" => $resultados]);
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
