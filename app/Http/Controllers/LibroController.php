<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    //
    public static function obtenerLibros()
    {
        return $autores = Libro::all();
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

    // Para ver los detalles de una peli
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    // Obtener autor de un libro
    public static function obtenerAutorLibro($autor) {
        $aut = Autor::find($autor, array('nombre'));
        // dd($aut->nombre);
        return $aut->nombre;
    }
}
