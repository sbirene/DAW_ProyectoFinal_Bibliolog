<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Usuario_Libro_Leido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Usuario_Libro_LeidoController extends Controller
{
    public function store()
    {
        //dd($_POST);

        $id_l = $_POST['libro'];
        $id_u = $_POST['user'];
        // dd($id_l, $id_u);

        DB::table('usuario_libro_leido')->insert([
            'id_usuario' => $id_u,
            'id_libro' => $id_l,
            'created_at' => Carbon::now()
        ]);

        // Volver a la vista del libro
        $libro = Libro::findOrFail($id_l);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    public function borrar()
    {
        // dd($_POST);

        $id_l = $_POST['libro'];
        $id_u = $_POST['user'];
        // dd($id_l, $id_u);

        DB::table('usuario_libro_leido')
            ->where('id_usuario', $id_u)
            ->where('id_libro', $id_l)
            ->delete();

        // Volver a la vista del libro
        $libro = Libro::findOrFail($id_l);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    public static function comprobarLeido($u, $l)
    {
        $resultado = DB::table('usuario_libro_leido')
            ->select('id_usuario')
            ->where('id_libro', '=', $l)
            ->get();

        // dd($resultado);

        if (empty($resultado[0])) {
            // dd("no está libro leído");
            return false;
        } else {
            // dd("está el libro leído");
            return true;
        }
    }

    public static function librosLeidos($u)
    {
        $libros = Libro::whereIn('id_libro', function ($query) use ($u) {
            $query->select('id_libro')
                ->from('usuario_libro_leido')
                ->where('id_usuario', $u);
        })
            ->get();

        // dd($libros);

        return $libros;
    }

    // Para estadísticas
    // Contar todas los libros leídos
    public static function totalLibrosLeidos($u)
    {
        $currentYear = date('Y');

        $count = Usuario_Libro_Leido::whereYear('created_at', $currentYear)
            ->where('id_usuario', $u)
            ->count();
        // dd($count);

        return $count;
    }
}
