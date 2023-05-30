<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    //
    public function index()
    {
        $libros = Libro::all();
        return view("libros", ["libros" => $libros]);
    }

    /* public static function obtenerLibros()
    {
        return $libros = Libro::all();
    } */

    public function buscar()
    {
        // Recibir input del formulario
        $termino = $_POST["valor_buscar"];
        // dd($termino);

        if ($termino === "") {
            $libros = Libro::all();
            return view("libros", ["libros" => $libros]);
        }

        // Buscar las pelis
        $resultados = DB::table('libro')
            ->where('titulo', 'LIKE', '%' . $termino . '%')
            ->get();
        // dd($resultados);

        // Devolver resultados
        return view("libros", ["resultados" => $resultados]);
    }

    public static function obtenerNovedadesLibros($numLibros, $year)
    {
        $libros = Libro::where('year', '>', $year)->get();

        // Ordenar Collection / array de libros por el año
        $ordenados = $libros->sortByDesc('year');
        foreach ($ordenados as $index => $libro) {
            $array_libros[$index] = $ordenados[$index];
        }
        foreach ($array_libros as $key => $row) {
            $aux[$key] = $row['year'];
        }
        array_multisort($aux, SORT_DESC, $array_libros);

        for ($contador = 0; $contador < $numLibros; $contador++) {
            $devolver[$contador] = $array_libros[$contador];
        }

        return $devolver;
    }

    // Para ver los detalles de un libro
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    // Obtener autor de un libro
    public static function obtenerAutorLibro($autor)
    {
        $aut = Autor::find($autor, array('nombre'));
        // dd($aut->nombre);
        return $aut->nombre;
    }

    // Para sacar estadísticas
    // Número total de páginas leídas
    public static function totalPagsLeidas($u)
    {
        $currentYear = date('Y');

        $totalPags = Libro::whereIn('id_libro', function ($query) use ($u, $currentYear) {
            $query->select('id_libro')
                ->from('usuario_libro_leido')
                ->whereYear('created_at', $currentYear)
                ->where('id_usuario', $u);
        })
            ->sum('num_pag');
        // dd($totalPags);

        return $totalPags;
    }
}
