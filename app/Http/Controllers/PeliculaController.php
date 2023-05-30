<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Director;
use App\Pelicula;
use App\Pelicula_Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class PeliculaController extends Controller
{
    //
    public function index()
    {
        $pelis = Pelicula::all();
        return view("peliculas", ["pelis" => $pelis]);
    }

    public function buscar()
    {
        // Recibir input del formulario
        $termino = $_POST["valor_buscar"];
        // dd($termino);

        if ($termino === "") {
            $pelis = Pelicula::all();
            return view("peliculas", ["pelis" => $pelis]);
        }

        // Buscar las pelis
        $resultados = DB::table('pelicula')
            ->where('titulo', 'LIKE', '%' . $termino . '%')
            ->get();
        // dd($resultados);

        // Devolver resultados
        return view("peliculas", ["resultados" => $resultados]);
    }

    /* public static function obtenerPelis()
    {
        return $pelis = Pelicula::all();
    } */

    /* public static function obtenerNumeroPelis($num)
    {
        return $pelis = Pelicula::paginate($num);
    } */

    // Buscar películas por genero
    public function buscarPorGenero()
    {
        // Recibir input del formulario
        // dd($_POST);
        $termino = $_POST["valor_buscar"];
        // dd($termino);

        if ($termino === "") {
            $pelis = Pelicula::all();
            return view("peliculas", ["pelis" => $pelis]);
        }

        // Buscar las pelis
        $resultados = DB::table('pelicula')
            ->where('genero', 'LIKE', '%' . $termino . '%')
            ->get();
        // dd($resultados);

        // Devolver resultados
        return view("peliculas", ["resultados" => $resultados]);
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

    // Para ver los detalles de una peli
    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        // dd($pelicula);
        return view('pelicula.show', ['pelicula' => $pelicula]);
    }

    // Obtener director de una peli
    public static function obtenerDirectorPeli($director)
    {
        $dir = Director::find($director, array('nombre'));
        // dd($dir->nombre);
        return $dir->nombre;
    }


    // Para sacar estadísticas
    // Duración de todas las pelis vistas
    public static function totalMinutosVistos($u)
    {
        $currentYear = date('Y');

        $totalMin = Pelicula::whereIn('id_peli', function ($query) use ($u, $currentYear) {
            $query->select('id_peli')
                ->from('usuario_peli_vista')
                ->whereYear('created_at', $currentYear)
                ->where('id_usuario', $u);
        })
            ->sum('duracion');
        // dd($totalMin);

        return $totalMin;
    }
}
